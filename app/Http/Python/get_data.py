import os
import glob

def get_data():
    # テキストファイル取得
    this_path = os.getcwd() + '\\text'
    files = glob.glob('text/*.txt')
    data_list = []

    # データ取得
    for file in files:
        with open(file, 'r', encoding="utf-8") as f:
            line = f.readlines()
            teacher = line[6].replace('\n', '')
            subject = line[10].replace('\n', '')
            semester = line[12].replace('\n', '')
            credit = line[16].replace('\n', '')
            data = [teacher, subject, semester[-2:], credit]
            data_list.append(data)
            
    return data_list
    # out: [['先生の名前', '科目名', '前期OR後期', '単位数'], ~~]の多次元リスト

print(get_data())