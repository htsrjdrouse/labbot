import paho.mqtt.client as mqtt 
import subprocess,re
import serial,usb
import time,datetime,os
import numpy as np
import json
import struct
import sys
import psutil


def killproc(script):
 process = subprocess.Popen("ps aux | grep "+script,shell=True,stdout=subprocess.PIPE)
 stdout_list = process.communicate()[0].decode()
 aa =(stdout_list.split('\n'))
 for i in aa:
  try: 
   pid = int(re.split("\s+", i)[1])
   process = psutil.Process(int(pid))
   process.kill()
  except:
   pass



#Establish a connection to MQTT
def establishconnection():
      ### mqtt ###
      broker_address="localhost" 
      print("creating new instance")
      client = mqtt.Client("P2") #create new instance
      client.on_message=on_message #attach function to callback
      print("connecting to broker")
      client.connect(broker_address) #connect to broker
      print("Subscribing to topic","controllabbot")
      client.subscribe("controllabbot")
      print("ok its subscribed")
      # Continue the network loop
      client.loop_forever()
      return client



## mqtt message handler ##
def on_message(client, userdata, message):
    print("message received")
    cmd = str(message.payload.decode("utf-8"))
    if cmd == "turnon":
      print("turning on ... ")
      subprocess.Popen(["sudo","python3", "subscriber.py"]).pid
      time.sleep(1)
      subprocess.Popen(["sudo","python3", "positiondisplay.py"]).pid
      time.sleep(1)
      subprocess.Popen(["sudo","python3", "leveldisplay.py"]).pid
    if re.match("^turnoff.*", cmd):
      killproc('subscriber.py')
      print("turning off ... ")
      time.sleep(1)
      killproc('positiondisplay.py')
      time.sleep(1)
      killproc('leveldisplay.py')
    if cmd == "kill positiondisplay":
      killproc('positiondisplay.py')
    if cmd == "run positiondisplay":
      subprocess.Popen(["sudo","python3", "positiondisplay.py"]).pid
    if cmd == "kill leveldisplay":
      killproc('leveldisplay.py')
    if cmd == "run leveldisplay":
      subprocess.Popen(["sudo","python3", "leveldisplay.py"]).pid




client = establishconnection()



