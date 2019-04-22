import os

#Initial Sentiment Keyword
positive_keyword = "positive_sentiment_keyword.txt"
negative_keyword = "negative_sentiment_keyword.txt"
neutral_keyword = "neutral_sentiment_keyword.txt"

#Importing Positive Keyword
with open(positive_keyword,'r') as positive: 
 positive_line = positive.read()
positive_line = positive_line.split()
#Sort Positive Sentiment
positive_line.sort()
print("{--Positive Sentiment--}")
print(positive_line)
#no of positive lexicon
print("<--Number of Positive lexicon--->:",len(positive_line))
"""for i in range(0,11):
 print(positive_line[i],positive_line.count(i))"""
print(" ")

#Importing Negative Keyword
with open(negative_keyword,'r') as negative:
 negative_line = negative.read()
negative_line = negative_line.split()
#Sort Negative Sentiment
negative_line.sort()
print("{--Negative Sentiment-}")
print(negative_line)
#no of negative lexicon
print("<---Number of Negative lexicon--",len(negative_line))
print(" ")

if(positive_line[1] == 'best'):
 print("word is best")
else:
 print("word is not best")
def sentiment_analysis():
 print("Sentiment Analysis")