import cv2
import sys
import os
import shutil
sys.path.append('C:\\Python38\\lib\\site-packages')

this_path = os.getcwd() + "\\app\\Http\\Python\\"

# 存在確認
this_path2 = os.getcwd() + '\\app\\Http\\Python\\step2out'
exists = os.path.exists(this_path2)
if (exists == True):
    shutil.rmtree(this_path2)
    os.mkdir(this_path)
else:
    os.mkdir(this_path2)

# 画像読み込み
img = cv2.imread(this_path + "step1out\\jikanwari_syllabus_01.jpeg")

# img[top : bottom, left : right]
# サンプル1の切り出し、保存
# for i in range(0,10):
#    for j in range(0,10):
#        img1 = img[i*700:(i+1)*700, j*700:(j+1)*700]
#        cv2.imwrite("out_sample_" + str(i) + "_" + str(j) + ".jpg", img1)


debug1 = False
debug2 = False
debug3 = True
num = 1
intvl = 83
pos = 0

def trim_in(s, top, height, left, width):
    img_in1 = img[top:height, left + 0:left + 0 + 111]
    img_in2 = img[top:height, left+125:left + 0 + 653]
    img_in3 = img[top:height, left+668:left + 0 + 890]
    img_in4 = img[top:height, left+902:left + 0 + 1023]
    cv2.imwrite(s + "_1.jpg", img_in1)
    cv2.imwrite(s + "_2.jpg", img_in2)
    cv2.imwrite(s + "_3.jpg", img_in3)
    cv2.imwrite(s + "_4.jpg", img_in4)
    pass


def trim():
    global pos, intvl, num, debug1, debug2
    top = pos
    if debug1:
        img1 = img[top:(top+intvl+3), 516:6780]
        cv2.imwrite(this_path+"step2out\\out_sample_" +
                    str(num).zfill(4)+".jpg", img1)
        pass
    lef = 516
    wid = 1035
    if debug2:
        img1_1 = img[top:(top+intvl+3), lef+wid*0 + 0:lef+wid*1 + 0-10]
        img1_2 = img[top:(top+intvl+3), lef+wid*1+12:lef+wid*2+12-10]
        img1_3 = img[top:(top+intvl+3), lef+wid*2+24:lef+wid*3+24-10]
        img1_4 = img[top:(top+intvl+3), lef+wid*3+36:lef+wid*4+36-10]
        img1_5 = img[top:(top+intvl+3), lef+wid*4+48:lef+wid*5+48-10]
        img1_6 = img[top:(top+intvl+3), lef+wid*5+60:lef+wid*6+60-10]
        cv2.imwrite(this_path+"step2out\\out_sample_" +
                    str(num).zfill(4)+"_1"+".jpg", img1_1)
        cv2.imwrite(this_path+"step2out\\out_sample_" +
                    str(num).zfill(4)+"_2"+".jpg", img1_2)
        cv2.imwrite(this_path+"step2out\\out_sample_" +
                    str(num).zfill(4)+"_3"+".jpg", img1_3)
        cv2.imwrite(this_path+"step2out\\out_sample_" +
                    str(num).zfill(4)+"_4"+".jpg", img1_4)
        cv2.imwrite(this_path+"step2out\\out_sample_" +
                    str(num).zfill(4)+"_5"+".jpg", img1_5)
        cv2.imwrite(this_path+"step2out\\out_sample_" +
                    str(num).zfill(4)+"_6"+".jpg", img1_6)
        pass
    if debug3:
        s = this_path+"step2out\\out_sample_"+str(num).zfill(4)
        trim_in(s+"_1", top, (top+intvl+3), lef+wid*0 + 0, lef+wid*1 + 0-10)
        trim_in(s+"_2", top, (top+intvl+3), lef+wid*1+12, lef+wid*2+12-10)
        trim_in(s+"_3", top, (top+intvl+3), lef+wid*2+24, lef+wid*3+24-10)
        trim_in(s+"_4", top, (top+intvl+3), lef+wid*3+36, lef+wid*4+36-10)
        trim_in(s+"_5", top, (top+intvl+3), lef+wid*4+48, lef+wid*5+48-10)
        trim_in(s+"_6", top, (top+intvl+3), lef+wid*5+60, lef+wid*6+10-10)
        pass
    pos = pos+intvl
    num = num+1
    pass

################################################################################
# image1


#
pos = 1140
trim()
trim()
trim()
trim()
trim()
#
trim()
trim()
trim()
trim()
trim()
#
trim()
trim()
trim()
trim()
pos = pos+15
trim()
#
trim()
trim()
trim()
trim()
trim()
trim()
#
