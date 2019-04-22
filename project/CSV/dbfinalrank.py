import mysql.connector
import csv

#mysql connection 
mydb = mysql.connector.connect(
 host="localhost",
 user="root",
 passwd="",
 database="prediction"
 )
 
mycursor = mydb.cursor()

mycursor.execute("SELECT player_id,player,AVG(rating),country FROM test GROUP BY player")
final_all_rank = mycursor.fetchall();


#print(final_all_rank[0][2])
"""
#final all rank csv will be used for reference table
with open(final_all_rank.csv,'w') as csv_final:
 fieldnames = ['Player_id','Player','Rating','Country']
 writer = csv.DictWriter(csv_final,fieldnames=fieldnames)
 writer.writeheader()
 for x in range(len(final_all_rank)):
  writer.writerow({'Player_id':x,'Player':final,'Rating':lrating[i],'Country':lcountry[i]})

""" 
#final rank upload
for x in range(len(final_all_rank)):
 sql = "INSERT INTO final_rank(player_id,player,rating,country) VALUES(%s, %s, %s, %s)" 
 val = (final_all_rank[x][0],final_all_rank[x][1],final_all_rank[x][2],final_all_rank[x][3])
 mycursor.execute(sql,val)
print("FINAL RANK UPLOADED")

mydb.commit()
