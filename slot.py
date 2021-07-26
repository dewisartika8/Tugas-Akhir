import cv2
import numpy as np
import requests
from urllib import request, parse
#import logging

cap = cv2.VideoCapture(0)

while True :
    k = cv2.waitKey(10)
    if k%256 == 27:
        # ESC pressed
        print("Escape hit, closing...")
        break
              
    ret, frame = cap.read()
    cv2.imshow('frame',frame)
    cv2.imwrite('cap.jpg', frame)
    cv2.waitKey(1500)
    #cv2.destroyAllWindows()

    img_bgr = cv2.imread('cap.jpg')
    img_gray = cv2.cvtColor(img_bgr, cv2.COLOR_BGR2GRAY)
    template = cv2.imread('template.jpg',0)
    w, h = template.shape[::-1]
    
    res = cv2.matchTemplate(img_gray,template,cv2.TM_CCOEFF_NORMED)
    #print(res)
    threshold = 0.81
    loc = np.where( res >= threshold)
    print(loc)
    data = [1,1,1]
    
    for pt in zip(*loc[::-1]):
        cv2.rectangle(img_bgr, pt, (pt[0] + w, pt[1] + h), (0,255,255), 2)
        x = pt[0] + (w/2)
        #print (x)
        
        if x < 213 :
            data[0]=0 #kosong
        elif x > 213 and x < 427 :
            data[1]=0
        else :
            data[2]=0
    slot_parkir=""
    for i in range (0,3):
        slot_parkir=slot_parkir + "#" + str(data[i])
        if data[i]==1 :
            print ("slot %d isi"%(i))
        else :
            print ("slot %d kosong"%(i))
    print(slot_parkir)
    
    
    url = "http://192.168.43.152:8080/nuek/myqrcode/submit_slot_parkir/"
    data = {'slot_parkir': slot_parkir}
            
    encodeddata = parse.urlencode(data).encode('UTF-8')
    req = request.Request(url, encodeddata)
    response = request.urlopen(req)
    html = response.read()
    print(html)

   
cv2.destroyAllWindows()