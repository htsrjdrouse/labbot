# labbot
labbot repo

This is a PHP based GUI that can work with multiple types of controllers. Just in case the demand for LabBots exceed our capacity to source materials and that perhaps the limited reagent is the position controller. So in short, how this system works is that there can be 1 or more multiple computers (RaspberryPis) that run the system and they send messages to each other using the Mosquitto/MQTT, pub/sub messaging system. This is a browser based user interface where you can  create, edit, run and monitor programs using any computer on the shared network accessing the webserver that hosts this user interface. This interface is designed to be very modular, easy to maintain and customizable. 

In order for this to run you need the following files in your webroot:
  bootstrap.min.js  
  processing.min.js
  jquery.min.js     
  mqttws31.js   

The system works with a Duet3D WIFI (XYZ and E) stepper motor driven position controller, Raspberry Pi and matching Adafruit 16-Channel PWM / Servo HAT for Raspberry Pi - Mini Kit, Raspberry Pi Zero and Raspberry Pi camera. 

The system runs on a standard Apache/PHP install on a RaspberryPi and Mosquitto install and MQTT install for python3. To set up Javascript to work with mosquitto, you need to follow this recipe:

This needs to be added for path for mqtt to work in javascript. 

/etc/mosquitto/conf.d/

add this file name: mosquitto.conf

and in it put the following lines:

listener 1883
protocol mqtt

listener 8080
protocol websockets


Here is the sudoers info

sudo chown -R www-data:www-data /var/www

and then I ran sudo visudo and added the following line:

www-data ALL=NOPASSWD: ALL

