import os
import sys
sys.path.append('C:\\Python38\\lib\\site-packages')
from pathlib import Path
from pdf2image import convert_from_path

# poppler/binを環境変数PATHに追加する
#poppler_dir = Path(__file__).parent.absolute() / "poppler/bin"
poppler_dir = "C:\\Program Files\\poppler-0.67.0\\bin"
os.environ["PATH"] += os.pathsep + str(poppler_dir)

# PDFファイルのパス
#pdf_path = Path("./pdf_file/pdf3009p.pdf")
this_path = os.getcwd() + "\\app\\Http\\Python\\"
pdf_path = Path(this_path + "jikanwari_syllabus.pdf")

# PDF -> Image に変換（600dpi）
pages = convert_from_path(str(pdf_path), 600)

# 画像ファイルを１ページずつ保存
image_dir = Path(this_path + "step1out")  # 事前にstep1outという保存フォルダが必要 *
for i, page in enumerate(pages):
    file_name = pdf_path.stem + "_{:02d}".format(i + 1) + ".jpeg"
    image_path = image_dir / file_name
    # JPEGで保存
    page.save(str(image_path), "JPEG")
