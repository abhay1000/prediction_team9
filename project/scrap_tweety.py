import tweepy

#authentication
consumer_key = 'aijIcvMvaqjndRiHm6ox6Tmo4'
consumer_secret = 'fk2WrMsyfCspEcJcNaZVyLDxO61HWVNWO4XmrtsLIzQ2kGjXh1'
access_token = '948794164241551361-ETpxXwD9gUgTmrdkZOCyD9Qjdts0ioe'
access_token_secret = 'vyCUTiLYoKLwz3U2M2CLmzTHVHkE5nvnA2m0UpEyQzRvs'
auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)
api = tweepy.API(auth)

tweet_list = []

#Search Given Player Name
SearchTerm = input("Enter keyword/hashtag to Search:")
no_of_search_term = int(input("Enter No of Tweets to Fetch:"))

tweets = tweepy.Cursor(api.search, q=SearchTerm, lang="en").items(no_of_search_term)

for tweet in tweets:
  #tweet_list.append(tweet.text)
  print(tweet.text)

tweet_list_str = str(tweet_list)

for read_tweet_list_str in tweet_list_str:
 with open("dataset.txt","a") as write_tweet_list_str:
   write_tweet_list_str.write(read_tweet_list_str)
 
