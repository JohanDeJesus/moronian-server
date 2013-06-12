import urllib.request
import json
import random

playerFirstName = 'Leonard'
playerLastName = 'Leonel'
score = random.randint(1,100000)

urlRet = 'http://localhost:8080/hackathon/addScore.php?firstname=' + playerFirstName + '&lastname=' + playerLastName + '&score=' + str(score)

print(urlRet)

serverResponse = urllib.request.urlopen(urlRet)
result = serverResponse.read()
result = result.decode('utf8')
json_data = json.JSONDecoder().decode(result)
print (json_data['Result'])

