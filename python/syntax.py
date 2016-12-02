#https://docs.python.org/3/tutorial/datastructures.html
#Comments
"""Multiline 
Comments"""

#Strings
stringVar = " This is a string " + " connected String"

#Boolean
booleanVarOldTrue = 1
booleanVarOldFalse = 0
booleanVarNewTrue = True
booleanVarNewFalse = False

#Number
numberVar = 1 #int
numberVarNeg = -1 #int
numberVarFloat = 1.0 #float
numberVarLong = 12345678901 #long

#Time https://www.tutorialspoint.com/python/python_date_time.htm
import time
timeTickVar = time.time()
timeLocalTimeVar = time.localtime(time.time())
timeLocalTimeFormattedVar = time.asctime( time.localtime(time.time()) )

#Calendar https://www.tutorialspoint.com/python/python_date_time.htm
import calendar
calVar = calendar.month(2008, 1)
print calVar

#List or Array
#Array can have array values, number, strings, or tuples
arrayVar =  [1 ,3 ,4 ,1 ,6]

#Set - normally used for comparison between sets
#no duplicates, cannot be sorted
setVar = {1}

#Tuples
#tuples can have array values, number, strings, or tuples
tuplesVar = (1 ,3 ,2)

#Dictionaries
dictionariesVar = {'jack': 4098, 'sape': 4139}


#https://docs.python.org/3/tutorial/controlflow.html
#For Loop 
for item in arrayVar:
    if item > 1:
        print   (item)

for i, v in enumerate(arrayVar):
    print(i, v)

#While Loop 
i = len(arrayVar) - 1
while i >= 0:
    print arrayVar[i]
    i -= 1

#For Loop using Dictionaries
knights = {'gallahad': 'the pure', 'robin': 'the brave'}
for k, v in knights.items():
    print(k, v)

#Multiple Variable Assignment
a = b = c = 1
a, b, c = 1, 2, "john"

#Else if
"""
if expression : 
   suite
elif expression : 
   suite 
else : 
   suite
"""

#Function
def functionName(parameter):
    return parameter

functionNameVar = functionName('parameter test')
print functionNameVar
pass
