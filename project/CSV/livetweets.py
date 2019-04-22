#LIVE TWEETS
from textblob import TextBlob
import pandas as pd
import numpy as np
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

#Get sentiment 
mycursor.execute("SELECT positive_sentiment FROM tweets ORDER BY RATING DESC")
#get positive sentiment of 50 player
gpsp = mycursor.fetchall()


#Making list of top 50 player
ltprr = []
for x in range(50):
 ltprr.append(tprr[x][0])
 
 
#making list of 50 player sentiment
lgpsp = []
for x in range(50):
 lgpsp.append(gpsp[x][0])
 
print(lgpsp)
 
print(ltprr)

def percentage(part, whole):
    return 100*float(part)/float(whole)
	
consumerKey="ZeGyqaUBzYExcO4MHCldFBaMI"
consumerSecret="edb3zFTHtjOLNzuaR3HUlsTyBR05M01UMaxkqJhuGQsF1fVn55"
accessToken="1098235662753398784-2177Cg9fViEcJduSVTxEaxeoKdGZYv"
accessTokenSecret="bqXBx4LiiviNy5euaNel8nFPlbrbQwottD8DXcBtKQ8Cx"

auth = tweepy.OAuthHandler(consumerKey, consumerSecret)
auth.set_access_token(accessToken, accessTokenSecret)
api = tweepy.API(auth,wait_on_rate_limit=True)

for xy in range(50):
	searchTerm = ltprr[xy]
	#noOfSearchTerms = int(input("how many tweets to analyze: "))
	noOfSearchTerms = 50

	tweets = tweepy.Cursor(api.search, q=searchTerm, lang="en").items(noOfSearchTerms)

	positive = 0
	negative = 0
	neutral = 0
	polarity = 0

	for tweet in tweets:
		#print(tweet.text)
		analysis = TextBlob(tweet.text)
		polarity += analysis.sentiment.polarity
		
		if(analysis.sentiment.polarity == 0):
			neutral += 1
		
		elif(analysis.sentiment.polarity < 0):
			negative += 1
			
		elif(analysis.sentiment.polarity > 0):
			positive += 1

	#print("previous positive:",positive)
	#print("previous negative:",negative)
	#print("previous neutral:",neutral)

	positive = percentage(positive, noOfSearchTerms)
	neutral = percentage(neutral, noOfSearchTerms)
	negative = percentage(negative, noOfSearchTerms)

	positive = int(positive)
	negative = int(negative)
	neutral = int(neutral)
		
	print("Player Name:",ltprr[xy])	
	if(positive == 0):
		print("empty value positive")
	else:
		positive = positive*10
		update_positive = int((positive+lgpsp[xy])/2)
		print("current positive:",positive)
		print("update_positive:",update_positive)
		#query to update positive sentiment
		usql = "UPDATE tweets SET positive_sentiment = %s WHERE player = %s"
		uval = (update_positive,ltprr[xy])
		mycursor.execute(usql, uval)
		print("done")
		mydb.commit()
"""	
	print("positive:",positive,"negative:",negative,"neutral",neutral,"polarity:",polarity)
"""