import serial
import time
import mysql.connector
# connect to mysql
mydb = mysql.connector.connect(host = "localhost", user = "root" , passwd = "", database = "po_data")

# setup cursor and sql command for insert
mycursor = mydb.cursor()
sqlform = "INSERT INTO data (Date, Time, PulseRate, BloodOxygenLevel, Remarks) VALUES (CURRENT_DATE(), CURRENT_TIME(), %s, %s, %s)"
remark = ""

arduino = serial.Serial(port='COM5', baudrate=115200, timeout=.1)

# change to while true since the program only sends data if it contains a value
while (True):
    # get the data from arduino and find a way to extract the heart rate and the blood oxygen level from the string
    hrate = arduino.readline()
    #decode arduino serial output to utf8 charset
    hrate = hrate.decode('utf-8')
    #get a part of the output and ignore endline+spaces
    hrate = hrate[:5]
    
    spo = arduino.readline()
    spo = spo.decode('utf-8')
    spo = spo[:2]
    

    if hrate !="" and spo !="":
        print("Heart Rate is equal to %s bpm" % hrate)
        print("Blood Oxygen level is equal to %s " % spo)
        #change datatypes of arduino outputs
        heartrate = float(hrate)
        spoxy =  int(spo)
        #basic assessment of heartrate and blood oxygen findings
        if spoxy>90 and heartrate>60 and heartrate<100:
            remark = "'Normal'"
        elif (spoxy<90 and spoxy>70) or (heartrate>100 or heartrate<60):
            remark = "'Needs immediate attention'"
        elif spoxy<70:
            remark = "'Patient in Critical Condition'"
        else:
            remark = "'Insufficient data'"
        #conditions for export to database to ignore pulse oximeter calibration
        if heartrate>40 and spoxy>30:
            mycursor.execute(sqlform % (heartrate, spoxy, remark))
            mydb.commit()
        print("")
    #delay to prevent overloading
    time.sleep(10)