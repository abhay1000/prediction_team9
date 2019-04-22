from textblob import TextBlob
import sys, tweepy
import matplotlib.pyplot as plt
import mysql.connector

#db connection
mydb = mysql.connector.connect(
 host="localhost",
 user="root",
 passwd="",
 database="prediction"
 )

mycursor = mydb.cursor()

mycursor.execute("SELECT player FROM tweets ORDER BY rating DESC")
#top 50 player with ref rating
tprr = mycursor.fetchall()

#Making list of top 50 player
list_of_tprr = []
for x in range(50):
 list_of_tprr.append(tprr[x])
 
#print(len(list_of_tprr))
#to ensure top 50 player

#convert tuple to list
print("-----------------------------------------------------------------------------------------")
 
#print(list_of_tprr[0][0]) #Cheteshwar Pujara

def percentage(part, whole):
    return 100*float(part)/float(whole)

#api consumer and access key
consumerKey="ZeGyqaUBzYExcO4MHCldFBaMI"
consumerSecret="edb3zFTHtjOLNzuaR3HUlsTyBR05M01UMaxkqJhuGQsF1fVn55"
accessToken="1098235662753398784-2177Cg9fViEcJduSVTxEaxeoKdGZYv"
accessTokenSecret="bqXBx4LiiviNy5euaNel8nFPlbrbQwottD8DXcBtKQ8Cx"

#Authentication
auth = tweepy.OAuthHandler(consumerKey, consumerSecret)
auth.set_access_token(accessToken, accessTokenSecret)
#add wait list 
api = tweepy.API(auth,wait_on_rate_limit=True)

for st in range(len(list_of_tprr)):
	#searchTerm = input("enter keyword/hashtag to search: ")
	searchTerm = st
	#noOfSearchTerms = int(input("how many tweets to analyze: "))
	noOfSearchTerms = 50
	tweets = tweepy.Cursor(api.search, q=searchTerm, lang="en").items(noOfSearchTerms)
    #sentiment count
	positive = 0
	negative = 0
	neutral = 0
	polarity = 0

	for tweet in tweets:
		print(tweet.text)
		analysis = TextBlob(tweet.text)
		polarity += analysis.sentiment.polarity
		
		if(analysis.sentiment.polarity == 0):
			neutral += 1
		
		elif(analysis.sentiment.polarity < 0):
			negative += 1
			
		elif(analysis.sentiment.polarity > 0):
			positive += 1

	positive = percentage(positive, noOfSearchTerms)
	neutral = percentage(neutral, noOfSearchTerms)
	negative = percentage(negative, noOfSearchTerms)

	positive = format(positive, '.2f')
	neutral = format(neutral, '.2f')
	negative = format(negative, '.2f')
	ps = ""	
	print("positive:",positive,"negative:",negative,"neutral",neutral,"polarity:",polarity)
	
	if(neutral > positive and neutral > negative):
		ps = "Neutral"
	elif(negative > positive and negative > neutral):
		ps = "negative"
	elif(positive > negative and positive > neutral):
		ps = "positive"
		
		print("-----------------")
		print(ps)
		positive = int(float(positive))
		sql_tprr = "UPDATE tweets SET positive_sentiment = %s ,overall_sentiment = %s WHERE player = %s"
		val_sql_tprr = (positive,ps,list_of_tprr[st][0])
		mycursor.execute(sql_tprr,val_sql_tprr)
		mydb.commit()	
		print("-------------------------------------------------------------")
print("--------------------------------------------------------------------")