import sys
sys.path.append('C:\\Python38\\lib\\site-packages')
import os
import openpyxl

def timetable(dayOfTheWeek, num):
    this_path = os.getcwd() + '\\app\\Http\\Python\\'
    wb = openpyxl.load_workbook(this_path + 'excel\\' + dayOfTheWeek + '.xlsx') # excel開く
    ws = wb["Sheet1"]
    arr = []
    for x, y, z, a, b in zip(list(ws.columns)[num], list(ws.columns)[num+1], list(ws.columns)[num+2], list(ws.columns)[num+3], list(ws.columns)[num+4]): # データの場所を指定
        l = list((x.value, y.value, z.value, a.value, b.value))
        arr.append(l)
    newarr = [i for i in arr if i!=[None, None, None, None, None]]
    return newarr

# 判別用関数　データがちゃんとはいっていないとはじかれる
def execute(dayOfTheWeek, num):
    try: return timetable(dayOfTheWeek, num)
    except IndexError as e: return None

def get_time_data():
    dic = {
        'Mon_1': execute('Monday', 0),
        'Mon_2': execute('Monday', 5),
        'Mon_3': execute('Monday', 10),
        'Mon_4': execute('Monday', 15),
        'Mon_5': execute('Monday', 20),
        'Mon_6': execute('Monday', 25),

        'Tue_1': execute('Tuesday', 0),
        'Tue_2': execute('Tuesday', 5),
        'Tue_3': execute('Tuesday', 10),
        'Tue_4': execute('Tuesday', 15),
        'Tue_5': execute('Tuesday', 20),
        'Tue_6': execute('Tuesday', 25),

        'Wed_1': execute('Wednesday', 0),
        'Wed_2': execute('Wednesday', 5),
        'Wed_3': execute('Wednesday', 10),
        'Wed_4': execute('Wednesday', 15),
        'Wed_5': execute('Wednesday', 20),
        'Wed_6': execute('Wednesday', 25),

        'Thu_1': execute('Thursday', 0),
        'Thu_2': execute('Thursday', 5),
        'Thu_3': execute('Thursday', 10),
        'Thu_4': execute('Thursday', 15),
        'Thu_5': execute('Thursday', 20),
        'Thu_6': execute('Thursday', 25),

        'Fri_1': execute('Friday', 0),
        'Fri_2': execute('Friday', 5),
        'Fri_3': execute('Friday', 10),
        'Fri_4': execute('Friday', 15),
        'Fri_5': execute('Friday', 20),
        'Fri_6': execute('Friday', 25),
    }
    
    return dic
