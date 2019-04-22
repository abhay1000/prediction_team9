import mysql.connector

#mysql connection 
mydb = mysql.connector.connect(
 host="localhost",
 user="root",
 passwd="",
 database="prediction"
 )
 
all_rank = []
 
mycursor = mydb.cursor()
#batting_test
mycursor.execute("SELECT player,rating,country FROM batting_test")
bat = mycursor.fetchall()
#batting odi
mycursor.execute("SELECT player,rating,country FROM batting_odi")
bao = mycursor.fetchall()
#batting_t20
mycursor.execute("SELECT player,rating,country FROM batting_t20")
bat20 = mycursor.fetchall()
#bowling_test
mycursor.execute("SELECT player,rating,country FROM bowling_test")
bot = mycursor.fetchall()
#bowling odi
mycursor.execute("SELECT plaYer,rating,country FROM bowling_odi")
boo = mycursor.fetchall()
#bowling t20
mycursor.execute("SELECT player,rating,country FROM bowling_t20")
bot20 = mycursor.fetchall()
""""
print(bat[0][2])

print(bao[0][2])

print(int((bat[0][2]+bao[0][2])/2))
"""

for t in bat:
 all_rank.append(t)
 
for u in bao:
 all_rank.append(u)
 
for v in bat20:
 all_rank.append(v)
 
for w in bot:
 all_rank.append(w)

for x in boo:
 all_rank.append(x)
 
for y in bot20:
 all_rank.append(y)
 
all_rank.sort()
#all_rank is a list
print(len(all_rank))
#print(all_rank[1][0])

for x in range(len(all_rank)):
 sql = "INSERT INTO test(player_id,player,rating,country) VALUES(%s, %s, %s, %s)"
 val = (x,all_rank[x][0],all_rank[x][1],all_rank[x][2])
 mycursor.execute(sql,val)
 print("q:",x)
mydb.commit()