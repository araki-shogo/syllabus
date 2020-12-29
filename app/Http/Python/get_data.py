import os
import glob
import sys

def get_data():
    # テキストファイル取得
    this_path = os.getcwd() + '\\app\\Http\\Python\\text'
    files = glob.glob(this_path + '\\*.txt')    

    # データ取得
    data_list = []
    for file in files:
        with open(file, 'r', encoding="utf-8") as f:
            line = f.readlines()
        
        for i, text in enumerate(line):
            text = text.replace('\n', '')
            if text == '教員名':
                teacher = i
            elif text[:4] == '開講年度':
                semester = i
            elif text == '単位数':
                credit = i
        
        data = [
            line[teacher+2].replace('\n', ''), 
            line[semester][-3:].replace('\n', ''), 
            line[credit+2].replace('\n', '')
        ]
        data_list.append(data)
        
    return data_list
    # # out: [['先生の名前', '科目名', '前期OR後期', '単位数'], ~~]の多次元リスト
