import mysql.connector

#connect db
mydb = mysql.connector.connect(
 host="localhost",
 user="root",
 passwd="",
 database="prediction"
 )
 
#get positive sentiment from tweets table
#tweets positive sentiment

mycursor = mydb.cursor()


mycursor.execute("SELECT player,positive_sentiment FROM tweets ORDER BY rating DESC")
tps = mycursor.fetchall()

#list of tweets positive sentiment


ltps = []
for x in range(50):
 ltps.append(tps[x][0])


ltps = []
lplayer = []
for x in range(50):
 ltps.append(tps[x][1])
 lplayer.append(tps[x][0])

#print(ltps)
#print(lplayer)
"""
for x in lplayer:
 print(x)
 sql = "SELECT * FROM popular_face_list WHERE player='"
 q = "x'"
 final=sql+x
 print(final)
 mycursor.execute(final)
 gr = mycursor.fetchall()

print(gr)
"""

"""
srx = []
for x in range(50):	
	sql = "SELECT %s FROM popular_face_list WHERE player = %s"
	val = ("positive_sentiment",lplayer[x])
	x = mycursor.execute(sql,val)
	print(x)
	
#print(srx)
"""
ltp = []
for x in range(50):
	sql = "SELECT * FROM popular_face_list WHERE player = %s"
	val = (lplayer[x],)
	mycursor.execute(sql, val)
	ltp.append(mycursor.fetchone())

for x in ltp:
 print(x[0])

