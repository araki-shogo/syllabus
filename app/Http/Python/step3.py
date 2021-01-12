from PIL import Image
import sys
#sys.path.append('jikanwari_syllabus01.jpg')

import pyocr
import pyocr.builders

tools = pyocr.get_available_tools()
if len(tools) == 0:
    print("No OCR tool found")
    sys.exit(1)
tool = tools[0]
print("Will use tool '%s'" % (tool.get_name()))

langs = tool.get_available_languages()
print("Available languages: %s" % ", ".join(langs))

txt = tool.image_to_string(
    Image.open('./step2out/out_sample_0001_2_4.jpg'),
    lang='jpn',
    builder=pyocr.builders.TextBuilder()
)

RemSpace = True
txt = txt.replace("⓪", "0")
txt = txt.replace("①", "1")
txt = txt.replace("②", "2")
txt = txt.replace("③", "3")
txt = txt.replace("④", "4")
txt = txt.replace("⑤", "5")
txt = txt.replace("⑥", "6")
txt = txt.replace("⑦", "7")
txt = txt.replace("⑧", "8")
txt = txt.replace("⑨", "9")
txt = txt.replace("　", " ")
while "  " in txt:
    txt = txt.replace("  ", " ")
    pass
if RemSpace:
    txt = txt.replace(" ", "")
    pass

print(txt)
