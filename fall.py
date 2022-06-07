#!/usr/bin/env python3
import serial
import MySQLdb as mdb

if __name__ == '__main__':
    con = mdb.connect('localhost','henna','123456','smarthome');

    ser = serial.Serial('/dev/ttyACM1', 9600, timeout=1)
    ser.reset_input_buffer()
    while True:
        if ser.in_waiting > 0:
            line = ser.readline().decode('utf-8').rstrip()
            if(line == "0"):
                with con:
                    cursor = con.cursor()
                    query = "UPDATE Detect SET Fall = 'fall' WHERE ID = 1"
                    cursor.execute(query)
                    con.commit()
                    cursor.close()
                print("fall")

            if(line == "1"):
                with con:
                    cursor = con.cursor()
                    query = "UPDATE Detect SET Fall = 'Stand' WHERE ID = 1"
                    cursor.execute(query)
                    con.commit()
                    cursor.close() 
                print("-")

            if(line == "2"):
                cursor = con.cursor()
                    query = "UPDATE Detect SET Danger = 'Need assistance' WHERE ID = 1"
                    cursor.execute(query)
                    con.commit()
                    cursor.close()
                print("emergency needed")
            else:
                cursor = con.cursor()
                    query = "UPDATE Detect SET Danger = 'No assistance needed' WHERE ID = 1"
                    cursor.execute(query)
                    con.commit()
                    cursor.close()
                print("no emergency needed")


