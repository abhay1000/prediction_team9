import mysql.connector
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

#for batting test
for x in batting_test:
 mycursor = mydb.cursor()
 y = x.split(",")
 sql = "INSERT INTO batting_test(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
print("Batting test table insert")

#for batting odi 
for x in batting_odi:
 mycursor = mydb.cursor()
 y = x.split(",")
 sql = "INSERT INTO batting_odi(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit() 
print("Batting odi table insert")

#for batting t20
for x in batting_t20:
 mycursor = mydb.cursor()
 y = x.split(",")
 sql = "INSERT INTO batting_t20(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit() 
print("Batting t20 table insert")

#for bowling test
for x in bowling_test:
 mycursor = mydb.cursor()
 y = x.split(",")
 sql = "INSERT INTO bowling_test(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
print("Bowling test table insert")

#for bowling odi 
for x in bowling_odi:
 mycursor = mydb.cursor()
 y = x.split(",")
 sql = "INSERT INTO bowling_odi(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
print("Bowling odi table insert")

#for bowling t20
for x in bowling_t20:
 mycursor = mydb.cursor()
 y = x.split(",")
 sql = "INSERT INTO bowling_t20(position,player,rating,type_of_match,country) VALUES(%s, %s, %s, %s, %s)"
 val = (y[0],y[1],y[2],y[3],y[4])
 mycursor.execute(sql,val)
 mydb.commit()
print("Bowling t20 table insert")