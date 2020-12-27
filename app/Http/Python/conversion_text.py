import sys
sys.path.append('C:\\Python38\\lib\\site-packages')
import os
import shutil
from os import path

from pdfminer.converter import TextConverter
from pdfminer.layout import LAParams
from pdfminer.pdfinterp import PDFPageInterpreter, PDFResourceManager
from pdfminer.pdfpage import PDFPage

def convert_text():
    # textディレクトリ作成、既に存在すれば全削除＆再作成
    this_path = os.getcwd() + '\\app\\Http\\Python\\text'
    exists = os.path.exists(this_path)
    if (exists == True):
        shutil.rmtree(this_path)
        os.mkdir(this_path)
    else:
        os.mkdir(this_path)

    # pdfディレクトリのファイル全取得
    this_path = os.getcwd() + '\\app\\Http\\Python\\pdf'
    files = []
    for file in os.listdir(this_path):
        if os.path.isfile(os.path.join(this_path, file)): # ファイルのみ
            files.append(file)

    for file in files:
        # pdfフォルダからファイル取得, 拡張子を.txtに変換
        this_path = os.getcwd() + '\\app\\Http\\Python\\pdf\\'
        input_path = this_path + file
        this_path = os.getcwd() + '\\app\\Http\\Python\\text\\'
        output_path = this_path + file.replace('.pdf', '.txt')

        # コンバート
        manager = PDFResourceManager()
        with open(output_path, "wb") as output:
            with open(input_path, 'rb') as input:
                with TextConverter(manager, output, codec='utf-8', laparams=LAParams()) as conv:
                    interpreter = PDFPageInterpreter(manager, conv)
                    for page in PDFPage.get_pages(input):
                        interpreter.process_page(page)