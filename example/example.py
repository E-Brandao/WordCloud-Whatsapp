import pandas as pd
import re
import string
from sklearn.feature_extraction.text import CountVectorizer
from wordcloud import WordCloud
import matplotlib.pyplot as plt
from collections import Counter
import json

with open('../txt/tmp.txt', 'r') as f:
  next(f)
  data = f.readlines()

Name1 = "Eduardo"
Name2 = "Caio"

with open('stopwords_example.txt', 'r') as f:
  stopwords = f.readlines()

for i in range(len(stopwords)):
  stopwords[i] = stopwords[i].strip()
 
dictionary = {Name1:[""],Name2:[""]}

for i in range(len(data)):
  data[i] = (" ".join(data[i].split("-")[1:])).strip()

  pre_name = (data[i].split(":")[0]).strip()
  pre_name = pre_name.split(" ")[0]

  if pre_name == Name1 or pre_name == Name2:
    name = pre_name

  message = " ".join(data[i].split(":")[1:])
  
  dictionary[name][0] = (dictionary[name][0] + message)


pd.set_option('max_colwidth',150)

data_df = pd.DataFrame.from_dict(dictionary).transpose()
data_df.columns = ['transcript']
data_df = data_df.sort_index()

def clean_text_round1(text):
    text = text.lower()
    text = text.strip()
    text = re.sub('\[.*?\]', '', text)
    text = re.sub('[%s]' % re.escape(string.punctuation), '', text)
    text = re.sub('\w*\d\w*', '', text)
    text = re.sub('   ', ' ', text)
    text = re.sub('  ', ' ', text)
    return text

round1 = lambda x: clean_text_round1(x)

data_clean = pd.DataFrame(data_df.transcript.apply(round1))

def clean_text_round2(text):
    text = re.sub('[‘’“”…]', '', text)
    text = re.sub('\n', '', text)
    return text

round2 = lambda x: clean_text_round2(x)

data_clean = pd.DataFrame(data_clean.transcript.apply(round2))

cv = CountVectorizer(stop_words=stopwords)
data_cv = cv.fit_transform(data_clean.transcript)
data_dtm = pd.DataFrame(data_cv.toarray(), columns=cv.get_feature_names())
data_dtm.index = data_clean.index 

data = data_dtm.transpose()

top_dict = {}

for c in data.columns:
    top = data[c].sort_values(ascending=False).head(30)
    top_dict[c]= list(zip(top.index, top.values))

for i in data.index.values:
    if len(i)<=2:
      stopwords.append(i)

wc = WordCloud(stopwords=stopwords, background_color="white", colormap="Dark2",
max_font_size=150, random_state=42)

plt.rcParams['figure.figsize'] = [16, 6]

if Name1<Name2:
  Name1_shown = Name1
  Name2_shown = Name2
else:
  Name1_shown = Name2
  Name2_shown = Name1
  
full_names = [Name1_shown, Name2_shown]

# Create subplots for each comedian
for index, person in enumerate(data.columns):
  wc.generate(data_clean.transcript[person])
  plt.subplot(1, 2, index+1)
  plt.imshow(wc, interpolation="bilinear")
  plt.axis("off")
  plt.title(full_names[index], fontsize=20)
    
plt.savefig('plot.png')