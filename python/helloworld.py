#! /usr/bin/python

print "Content-type: text/html"
print ""


import cgi
import random
form = cgi.FieldStorage()

reds = 0
whites = 0

if "answer" in form:
    answer = form.getvalue("answer")
else:
    answer = ""
    for i in range(4):
        answer += str(random.randint(0, 9))

if "guess" in form:
    guess = form.getvalue("guess")
    for key, digit in enumerate(guess):
        if digit == answer[key]:
            reds += 1
        else:
            for answerDigit in answer:
                if answerDigit == digit:
                    whites += 1
                    break
else:
    guess = ""

if "numOfGuesses" in form:
    numOfGuesses = int(form.getvalue("numOfGuesses")) + 1
else:
    numOfGuesses = 0

if numOfGuesses == 0:
    message = "I've chosen a 4 digit number. Can you guess it?"
elif reds == 4:
    message = "you won"
else:
    message = "you have "+ str(reds)+" correct digits in right place, and "+ str(whites) + " digits in wrong place. Number of Guesses: "+str(numOfGuesses)
print "<h1>Mastermind</h1>"
print "<p>"+message+"</p>"
print "<form method='post'>"
print "<input type=text name=guess value=" + guess + ">"
print "<input type=hidden name=answer value="+answer +">"
print "<input type=hidden name=numOfGuesses value=" + str(numOfGuesses) + ">"
print "<input type=submit value=Guess>"
print "</form>"