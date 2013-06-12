import urllib.request
import json


urlRet = 'http://localhost:8080/hackathon/viewScores.php'


serverResponse = urllib.request.urlopen(urlRet)
result = serverResponse.read()
result = result.decode('utf8')
json_data = json.JSONDecoder().decode(result)

for key in json_data:
    if key != "Result":
        print(json_data[key])
