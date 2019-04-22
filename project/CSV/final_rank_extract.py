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

mycursor.execute("SELECT * FROM final_rank ORDER BY rating DESC")
#final_all_rank_row
farr = mycursor.fetchall()

#tweets feeder
for x in range(len(farr)):
 sql = "INSERT INTO tweets(player_id,player,rating,country) VALUES(%s, %s, %s, %s)"
 val = (farr[x][0],farr[x][1],farr[x][2],farr[x][3])
 mycursor.execute(sql,val)

mydb.commit()
 
#generating final all rank csv which can be used for another table
with open('final_all_rank','w',newline='') as csv_final:
 fieldnames = ['Player_id','Player','Rating','Country']
 writer = csv.DictWriter(csv_final,fieldnames=fieldnames)
 writer.writeheader()
 for i in range(len(farr)):
  writer.writerow({'Player_id':farr[i][0],'Player':farr[i][1],'Rating':farr[i][2],'Country':farr[i][3],})
csv_final.close();
 