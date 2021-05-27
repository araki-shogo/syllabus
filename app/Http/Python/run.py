import sys
sys.path.append('C:\\Python38\\lib\\site-packages')
import get_pdf
import conversion_text
import get_data
import get_time_data
import pprint
import os
import json
import codecs

def run():
    if __name__ == '__main__':
        datalist1 = get_pdf.get_pdf() # 絶対パス・科目名のリスト取得＆PDFダウンロード
        conversion_text.convert_text() # pdfファイルをtxtファイルにコンバート
        datalist2 = get_data.get_data() # 科目データ取得
        datalist4 = get_time_data.get_time_data() # タイムテーブル取得
        
        datalist3 = []
        for i, j in zip(datalist1, datalist2):
            i.extend(j)
            datalist3.append(i)
            # out: [['科目名', 'URL', '教員名", '期間', '単位数'],~~]
        
        # json書き出し
        this_path = os.getcwd() + '\\app\\Http\\Python\\'
        datalistpath = this_path + '\\datalist.json'
        timedatapath = this_path + '\\time_data.json'
        
        with codecs.open(datalistpath, 'w', 'utf-8') as f:
            json.dump(datalist3, f, ensure_ascii=False, indent=4)

        with codecs.open(timedatapath, 'w', 'utf-8') as f:
            json.dump(datalist4, f, ensure_ascii=False, indent=4)
        

run()
