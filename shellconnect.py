import serial
import subprocess,re
import serial,usb
import time,datetime,os
import numpy as np
import json




def whatstheports():
 output = str(subprocess.check_output("python3 -m serial.tools.list_ports -v", shell=True))
 oo = re.split('/dev', output)
 ports = {}
 for i in oo:
    if re.match('^.*Duet.*', i):
        port = re.match('^.*tty(.*) .*', i)
        ports['duet'] = re.split(' ', port.group(1))[0]
    if re.match('^.*Arduino Micro.*', i):
        port = re.match('^.*tty(.*) .*', i)
        ports['microfluidics'] = re.split(' ',port.group(1))[0]
 return ports



def openport(prt):
  try:
   ser = serial.Serial("/dev/tty"+prt, 115200, timeout=0.2)
   time.sleep(2)
  except:
   print("its not connecting")
  return ser

ports = whatstheports()
dser = openport(ports['duet'])



