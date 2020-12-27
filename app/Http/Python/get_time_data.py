import sys
sys.path.append('C:\\Python38\\lib\\site-packages')
import os
import openpyxl

def timetable(dayOfTheWeek, num):
    this_path = os.getcwd() + '\\app\\Http\\Python\\'
    wb = openpyxl.load_workbook(this_path + 'excel\\' + dayOfTheWeek + '.xlsx')
    ws = wb["Sheet1"]
    arr = []
    for x, y, z in zip(list(ws.columns)[num], list(ws.columns)[num+1], list(ws.columns)[num+2]):
        l = list((x.value, y.value, z.value))
        arr.append(l)
    newarr = [i for i in arr if i!=[None, None, None]]
    return newarr

def execute(dayOfTheWeek, num):
    try: return timetable(dayOfTheWeek, num)
    except IndexError as e: return None

def get_time_data():
    dic = {
        'Mon_1': execute('Monday', 0),
        'Mon_2': execute('Monday', 3),
        'Mon_3': execute('Monday', 6),
        'Mon_4': execute('Monday', 9),
        'Mon_5': execute('Monday', 12),
        'Mon_6': execute('Monday', 15),

        'Tue_1': execute('Tuesday', 0),
        'Tue_2': execute('Tuesday', 3),
        'Tue_3': execute('Tuesday', 6),
        'Tue_4': execute('Tuesday', 9),
        'Tue_5': execute('Tuesday', 12),
        'Tue_6': execute('Tuesday', 15),

        'Wed_1': execute('Wednesday', 0),
        'Wed_2': execute('Wednesday', 3),
        'Wed_3': execute('Wednesday', 6),
        'Wed_4': execute('Wednesday', 9),
        'Wed_5': execute('Wednesday', 12),
        'Wed_6': execute('Wednesday', 15),

        'Thu_1': execute('Thursday', 0),
        'Thu_2': execute('Thursday', 3),
        'Thu_3': execute('Thursday', 6),
        'Thu_4': execute('Thursday', 9),
        'Thu_5': execute('Thursday', 12),
        'Thu_6': execute('Thursday', 15),

        'Fri_1': execute('Friday', 0),
        'Fri_2': execute('Friday', 3),
        'Fri_3': execute('Friday', 6),
        'Fri_4': execute('Friday', 9),
        'Fri_5': execute('Friday', 12),
        'Fri_6': execute('Friday', 15),
    }
    
    return dic

print(get_time_data())