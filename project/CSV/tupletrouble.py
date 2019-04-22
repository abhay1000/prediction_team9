"""
In python,fetchall function return list of tuple

Result => [('Cheteshwar Pujara',)]
result[0] //('Cheteshwar Pujara',)
result[0][0] Cheteshwar Pujara
rc
row change column remain constant



"""

import mysql.connector

#db connection
mydb = mysql.connector.connect(
 host="localhost",
 user="root",
 passwd="",
 database="prediction"
 )
 
mycursor = mydb.cursor()

mycursor.execute("SELECT player FROM TWEETS ORDER BY rating DESC")
#top 50 player
tprr = mycursor.fetchall()

"""
for x in range(50):
 print(tprr[x][x])
 """
print(tprr)
#perfect popular face list
ppfl = []
for x in range(50):
 ppfl.append(tprr[x][0])
 
print(ppfl)