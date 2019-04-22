import requests
import re
from bs4 import BeautifulSoup
import csv
#import pandas as pd
#import numpy
req = requests.get("https://www.cricbuzz.com/cricket-stats/icc-rankings/men/bowling")
soup = BeautifulSoup(req.text,'lxml')

lp = list();
lplayer = list();
lrating = list();
lcountry = list();
final_scrap = list();
position = soup.find_all("div",class_="cb-col cb-col-16 cb-rank-tbl cb-font-16")
player = soup.find_all("a",class_="text-hvr-underline text-bold cb-font-16")
rating = soup.find_all("div",class_="cb-col cb-col-17 cb-rank-tbl pull-right")
country = soup.find_all("div",class_="cb-font-12 text-gray")
for pos in position:
 lp.append(pos.text)
for pla in player:
 lplayer.append(pla.text)
for rate in rating:
 lrating.append(rate.text)
for countr in country:
 lcountry.append(countr.text)
print(len(lp))
print(lp)
print(len(lplayer))
print(lplayer)
print(len(lrating))
print(lrating)

#fetch bowling all
with open('bowling_all.csv','w') as csv_file:
 fieldnames = ['sn','Position','Player','Rating']
 writer = csv.DictWriter(csv_file,fieldnames=fieldnames)
 writer.writeheader()
 for i in range(0,300):
  writer.writerow({'sn':i,'Position':lp[i],'Player':lplayer[i],'Rating':lrating[i]})
 csv_file.close();

#fetch bowling test 
with open('bowling_test.csv','w') as csv_file:
 fieldnames = ['Position','Player','Rating','Type','Country']
 writer = csv.DictWriter(csv_file,fieldnames=fieldnames)
 type = 'batting_test'
 writer.writeheader()
 for i in range(0,100):
  writer.writerow({'Position':lp[i],'Player':lplayer[i],'Rating':lrating[i],'Type':type,'Country':lcountry[i]})
 csv_file.close();

#Fetch bowling odi 
with open('bowling_odi.csv','w') as csv_file:
 fieldnames = ['Position','Player','Rating','Type','Country']
 writer = csv.DictWriter(csv_file,fieldnames=fieldnames)
 type = 'batting_odi'
 writer.writeheader()
 for i in range(100,200):
  writer.writerow({'Position':lp[i],'Player':lplayer[i],'Rating':lrating[i],'Type':type,'Country':lcountry[i]})
 csv_file.close();
 
#Fetch bowling t20
with open('bowling_t20.csv','w') as csv_file:
 fieldnames = ['Position','Player','Rating','Type','Country']
 writer = csv.DictWriter(csv_file,fieldnames=fieldnames)
 type = 'batting_t20'
 writer.writeheader()
 for i in range(200,300):
  writer.writerow({'Position':lp[i],'Player':lplayer[i],'Rating':lrating[i],'Type':type,'Country':lcountry[i]})
 csv_file.close();
 

