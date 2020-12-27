import sys
sys.path.append('C:\\Python38\\lib\\site-packages')
import datetime
import os
import shutil
import time
import urllib
import urllib.request as req
from itertools import zip_longest
from os import path
from urllib.parse import urljoin

from bs4 import BeautifulSoup

def get_pdf():
    # 一番上の階層であいうえお~のそれぞれのURLを抽出
    url = "http://sy.kyoai.ac.jp/"
    res = req.urlopen(url)
    soup = BeautifulSoup(res, "html.parser")
    result = soup.select("a[href]") 

    # URLからhref=を抽出
    link_list1 = []
    for link in result:
        href = link.get("href")
        link_list1.append(href)

    # 一階層下のそれぞれのURLを抽出
    link_list2 = []
    for data in link_list1:
        link_child = url + data
        link_list2.append(link_child)

    # 一階層下のURLにアクセスしてURLを抽出, 2次元配列にすべてのaタグを出力
    link_list3 = []
    for data in link_list2:
        res = req.urlopen(data)
        soup = BeautifulSoup(res, 'html.parser')
        result = soup.select("a[href]")
        link_list3.append(result)

    # 1次元配列に変換
    link_list4 = []
    text_list = []
    for i in link_list3:
        for j in i:
            link_list4.append(j)
            text_list.append(j.text)
    
    # もどると文字を全削除
    while 'もどる' in text_list:
        text_list.remove('もどる')

    # URLからhrefを除いてURLだけ抽出
    link_list5 = []
    for link in link_list4:
        href = link.get("href")
        link_list5.append(href)

    # pdfのリスト作成 & .pdfで終わらないものは除外
    pdf_list = [temp for temp in link_list5 if temp.endswith('pdf')]

    # 1-3月の間は年を-1
    year = datetime.date.today().year
    this = datetime.datetime.today()
    jan = datetime.datetime(year, 1, 1)
    mar = datetime.datetime(year, 3, 31)
    if jan <= this <= mar:
        year -= 1

    # pdfを絶対パスにする
    link_list6 = []
    url = "http://sy.kyoai.ac.jp/" + str(year) + '/'
    for relative in pdf_list:
        temp_url = urljoin(url, relative)
        link_list6.append(temp_url)

    # pdfディレクトリ存在確認
    this_path = os.getcwd() + '\\app\\Http\\Python\\pdf'
    exists = os.path.exists(this_path)
    if (exists == True):
        shutil.rmtree(this_path)
        os.mkdir(this_path)
    else:
        os.mkdir(this_path)
    

    # 絶対パス作成 & 保存先リスト作成
    # カレントディレクトリ取得　& pdfディレクトリ結合
    savepath_list = []
    for file_name in pdf_list:
        savepath_list.append(os.path.join(this_path, file_name))

    # zipでpdfリンクと保存先を指定してpdfファイルダウンロード
    for (pdflink, savepath) in zip(link_list6, savepath_list):
        urllib.request.urlretrieve(pdflink, savepath)
        time.sleep(2) # 負荷対策 

    # listにする
    res = []
    for text, pdf in zip_longest(text_list, link_list6):
        res.append([text, pdf])

    return res