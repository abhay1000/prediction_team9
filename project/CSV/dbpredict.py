#THIS SCRIPT TAKES TIME TO COMMIT ON DATABSE(BATTING_TEST/ODO/T20 N OWLING TEST/ODI/T20)
import mysql.connector

#mysql connection 
mydb = mysql.connector.connect(
 host="localhost",
 user="root",
 passwd="",
 database="prediction"
 )
 
#reading batting n bowling of all type of match
batting_test = open("batting_test.csv",'r')
batting_odi = open("batting_odi.csv","r")
batting_t20 = open("batting_t20.csv","r")
bowling_test = open("bowling_test.csv","r")
bowling_odi = open("bowling_odi.csv","r")
bowling_t20 = open("bowling_t20.csv","r")
#read batting test file
"""
for x in batting_test:
 x = x.split(",")
 print(x[3])
 """
 
 
#for batting test
for x in batting_test:
#connection pointer
 mycursor = mydb.cursor()
#as we have 100 entries of batting test so we will loop batting_test line 
#as it is csv which is comma seperate values every iteration will be split with reference by comma 
#so spilt makes list of an file pointer string 
#x[0] = POSITION
#x[1] = PLAYER
#x[2] = RATING
#x[3] = TYPE_OF_MATCH
 y = x.split(",")
 sql = "INSERT INTO batting_test(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
#print("processing table:",x)
 
print("------------------------")
 
print("Batting test table insert")

print("------------------------")

#for batting odi 
for x in batting_odi:
#connection pointer
 mycursor = mydb.cursor()
#as we have 100 entries of batting test so we will loop batting_test line 
#as it is csv which is comma seperate values every iteration will be split with reference by comma 
#so spilt makes list of an file pointer string 
#x[0] = POSITION
#x[1] = PLAYER
#x[2] = RATING
#x[3] = TYPE_OF_MATCH
 y = x.split(",")
 sql = "INSERT INTO batting_odi(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
#print("processing table:",x)

print("------------------------")
 
print("Batting odi table insert")

print("----------------------")

#for batting t20
for x in batting_t20:
#connection pointer
 mycursor = mydb.cursor()
#as we have 100 entries of batting test so we will loop batting_test line 
#as it is csv which is comma seperate values every iteration will be split with reference by comma 
#so spilt makes list of an file pointer string 
#x[0] = POSITION
#x[1] = PLAYER
#x[2] = RATING
#x[3] = TYPE_OF_MATCH
 y = x.split(",")
 sql = "INSERT INTO batting_t20(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
#print("processing table:",x)
 
print("------------------------")
 
print("Batting t20 table insert")

print("-----------------------")

#------------------------------------------------------------------------------------------
#Bowling


#for bowling test
for x in bowling_test:
#connection pointer
 mycursor = mydb.cursor()
#as we have 100 entries of batting test so we will loop batting_test line 
#as it is csv which is comma seperate values every iteration will be split with reference by comma 
#so spilt makes list of an file pointer string 
#x[0] = POSITION
#x[1] = PLAYER
#x[2] = RATING
#x[3] = TYPE_OF_MATCH
 y = x.split(",")
 sql = "INSERT INTO bowling_test(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
#print("processing table:",x)
 
print("------------------------")
 
print("Bowling test table insert")

print("------------------------")

#for bowling odi 
for x in bowling_odi:
#connection pointer
 mycursor = mydb.cursor()
#as we have 100 entries of batting test so we will loop batting_test line 
#as it is csv which is comma seperate values every iteration will be split with reference by comma 
#so spilt makes list of an file pointer string 
#x[0] = POSITION
#x[1] = PLAYER
#x[2] = RATING
#x[3] = TYPE_OF_MATCH
 y = x.split(",")
 sql = "INSERT INTO bowling_odi(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
#print("processing table:",x)

print("------------------------")
 
print("Bowling odi table insert")

print("----------------------")

#for bowling t20
for x in bowling_t20:
#connection pointer
 mycursor = mydb.cursor()
#as we have 100 entries of batting test so we will loop batting_test line 
#as it is csv which is comma seperate values every iteration will be split with reference by comma 
#so spilt makes list of an file pointer string 
#x[0] = POSITION
#x[1] = PLAYER
#x[2] = RATING
#x[3] = TYPE_OF_MATCH
 y = x.split(",")
 sql = "INSERT INTO bowling_t20(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
#print("processing table:",x)
 
print("------------------------")
 
print("Bowling t20 table insert")

print("-----------------------")




#print(mycursor.rowcount,"record inserted")

#looping the datbase item to display
"""
for x in mycursor:
 print(x)

print(mydb)
"""