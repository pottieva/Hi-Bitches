'''
Created  on 2015-11-27
Modify  on  2015-11-30
@author:lianshifeng
'''
import win32com 
import os 
import sys
import string 
from win32com.client import Dispatch,constants

reload(sys)
sys.setdefaultencoding('utf-8')


def word2html(filename):
    word = win32com.client.DispatchEx('Word.Application')
    word.Visible = 0   
    doc = word.Documents.Open(filename)
    filename = filename.split(".")
    if (filename[-1] == "doc" or filename[-1] == "docx"):
        filename[-1]="html"
        htmlname=string.join(filename,".")
    doc.SaveAs(htmlname,10)
    doc.Close() 
    word.Quit()  

if __name__ =='__main__':
    filename = sys.argv[1]
    if filename: 
        word2html(filename)
