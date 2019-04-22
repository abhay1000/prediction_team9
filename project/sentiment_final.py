import re
import pandas as pd

#-----------------------------------#
#Loading Sector

#load positive sentiment keyword
psk = "positive_sentiment_keyword.txt"


#load negative sentiment keyword
nsk = "negative_sentiment_keyword.txt"

#load neutral sentiment keyword
nesk = "neutral_sentiment_keyword.txt"

review1 = "virat_kohli_set.txt"

#rpsk = psk.read(1)
#print(rpsk)


#-----------------------------------#
#Sentiment Init

positive = 0
negative = 0
neutral = 0
#-----------------------------------#
#Reading File

#read load file i.e positive sentiment keyword
with open(psk,'r') as raw_psk:
 rpsk = raw_psk.read()
 
rpsk = rpsk.split()

#read load file i.e negative sentiment keyword
with open(nsk,'r') as raw_nsk:
 rnsk = raw_nsk.read()
 
rnsk = rnsk.split()


#read load file i.e neutral sentiment keyword
with open(nesk,'r') as raw_nesk:
 rnesk = raw_nesk.read()
 
rnesk = rnesk.split()

#read review 
with open(review1,'r') as raw_review:
 rreview = raw_review.read()

#rreview = rreview.split()

#------------------------------------#

#print("positive sentiment----------------------------:",rpsk)
#print("negative sentiment----------------------------:",rnsk)
#print("neutral sentiment-----------------------------:",rnesk)

#rvpsk - review positive sentiment keyword
#re_rvpsk - regular expression positive sentiment keyword
#re_rnsk - regular expression negative sentiment keyword
#re_rnesk - regular expression neutral sentiment keyword

""""
re_rvpsk = []
lre_rvpsk = []
for rvpsk in rpsk:
 re_rvpsk = re.search(rvpsk,rreview)
 if bool(re_rvpsk.group()):
  lre_rvpsk.append(re_rvpsk)
 
print(lre_rvpsk)

"""


re_rvpsk = []
re_rvnsk = []
re_rvnesk = []
lre_rvpsk = []
"""
for rvpsk in rpsk:
 re_rvpsk = re.findall(rvpsk,rreview)
 if bool(re_rvpsk):
  #re_rvpsk.append(re_rvpsk)
  positive += 1
"""

"""
for rvnsk in rnsk:
 re_rvnsk = re.search(rvnsk,rreview)
 if bool(re_rvnsk):
  negative += 1
 """
drreview = rreview.split()
print(len(drreview))

#for rnsk in rnsk:
for rvnsk in rnsk:
 if drreview[1:] == 'rvnsk':
  print("yes")

 
 
 
print("positive Sentiment:",positive,"words")
print("Negative Sentiment:",negative,"words")

