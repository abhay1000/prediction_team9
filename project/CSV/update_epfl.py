#update exist popular face list
#pending: using player name to scratch the data
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

"""
first get player,rating,positive_sentiment from tweets table
update acc to player name in popular_face_list
an also generate pflp i.e popular face list points
"""

#get all tweets details
mycursor.execute("SELECT player,rating,positive_sentiment FROM tweets ORDER BY rating DESC")
#fetchall (player,rating,positive_sentiment prps) 
prps = mycursor.fetchall()

#print(prps)
#list of player,rating,positive_sentiment tweets
lpt = []
lrt = []
lpst = []
for x in range(50):
 lpt.append(prps[x][0])
 lrt.append(prps[x][1])
 lpst.append(prps[x][2])
 
print(lpt)
print(lrt)
print(lpst)

#update positive_sentiment from tweets to popular_face_list table
"""
for x in range(50):
	ups = "UPDATE popular_face_list SET positive_sentiment = %s WHERE player = %s"
	uval = (lpst[x],lpt[x])
	mycursor.execute(ups,uval)
	mydb.commit()
"""
#update positive_sentiment done

#get update positive_sentiment with rating from popular_face_list
mycursor.execute("SELECT player,rating,positive_sentiment FROM popular_face_list")
#fetchall update player rating positive_sentiment
uprps = mycursor.fetchall()

#update list of player,rating,popular_face_list 
ulp = []
ulr = []
ulpfl = []
for x in range(50):
 ulp.append(uprps[x][0])
 ulr.append(uprps[x][1])
 ulpfl.append(uprps[x][2])
 
#update pfl points
for x in range(50):
 update_pflp = int((ulr[x]+ulpfl[x])/2)
 upflp = "UPDATE popular_face_list SET pflp = %s WHERE player = %s"
 upflp_val = (update_pflp,ulp[x])
 mycursor.execute(upflp,upflp_val)
 mydb.commit()
 