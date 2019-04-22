import requests
from bs4 import BeautifulSoup
import csv
import pandas as pd
import numpy
req = requests.get("https://www.cricbuzz.com/cricket-stats/icc-rankings/men/batting")
#print(req.text)
#content = dir(BeautifulSoup)
#print(content)
soup = BeautifulSoup(req.text,'lxml')
#print(soup.prettify())
lp = list();
lplayer = list();
lrating = list();
final_scrap = list();
position = soup.find_all("div",class_="cb-col cb-col-16 cb-rank-tbl cb-font-16")
player = soup.find_all("a",class_="text-hvr-underline text-bold cb-font-16")
rating = soup.find_all("div",class_="cb-col cb-col-17 cb-rank-tbl pull-right")
for pos in position:
 lp.append(pos.text)
for pla in player:
 lplayer.append(pla.text)
for rate in rating:
 lrating.append(rate.text)
print(len(lp))
print(lp)
print(len(lplayer))
print(lplayer)
print(len(lrating))
print(lrating)

for i in range(0,281):
 final_scrap.append(lp[i])
 final_scrap.append(lplayer[i])
 final_scrap.append(lrating[i])
 
print(final_scrap)

#fetch all
with open('batting_all.csv','w') as csv_file:
 fieldnames = ['sn','Position','Player','Rating']
 writer = csv.DictWriter(csv_file,fieldnames=fieldnames)
 writer.writeheader()
 for i in range(0,281):
  writer.writerow({'sn':i,'Position':lp[i],'Player':lplayer[i],'Rating':lrating[i]})
 csv_file.close();

#Fetch batting test
with open('batting_test.csv','w') as csv_file:
 fieldnames = ['Position','Player','Rating','Type']
 writer = csv.DictWriter(csv_file,fieldnames=fieldnames)
 type = 'batting_test'
 writer.writeheader()
 for i in range(0,100):
  writer.writerow({'Position':lp[i],'Player':lplayer[i],'Rating':lrating[i],'Type':type})
 csv_file.close();

#Fetch batting odi 
with open('batting_odi.csv','w') as csv_file:
 fieldnames = ['Position','Player','Rating','Type']
 writer = csv.DictWriter(csv_file,fieldnames=fieldnames)
 type = 'batting_odi'
 writer.writeheader()
 for i in range(100,200):
  writer.writerow({'Position':lp[i],'Player':lplayer[i],'Rating':lrating[i],'Type':type})
 csv_file.close();
 
#Fetch batting t20
with open('batting_t20.csv','w') as csv_file:
 fieldnames = ['Position','Player','Rating','Type']
 writer = csv.DictWriter(csv_file,fieldnames=fieldnames)
 type = 'batting_t20'
 writer.writeheader()
 for i in range(200,300):
  writer.writerow({'Position':lp[i],'Player':lplayer[i],'Rating':lrating[i],'Type':type})
 csv_file.close();
 

