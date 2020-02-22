#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
 
const char* ssid = "Indrasish";              //my wifi connection name
const char* password = "Indra117";           //my wifi password
int p1=5, p2=4, p3=2;

void setup () {
  Serial.begin(115200);
  pinMode(p1, OUTPUT);
  pinMode(p2, OUTPUT);
  pinMode(p3, OUTPUT);
  pinMode(A0, INPUT);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print("Connecting..");
  }
}
 
void loop() {
 
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin("http://indrasish-ghosh.000webhostapp.com/project_api.php?read=1");
    int httpCode = http.GET();
    String response = "";
 
    if (httpCode > 0) {
      // start of fetching get process
      response = http.getString();
      Serial.println(response);

      digitalWrite(p1, 0);
      digitalWrite(p2, 0);
      digitalWrite(p3, 0);
    
      if(response=="1")
        digitalWrite(p1, 1);
      else if(response=="2")
        digitalWrite(p2, 1);
      else if(response=="3")
        digitalWrite(p3, 1);
      }      
    else
      Serial.println(httpCode);

    String api = "http://indrasish-ghosh.000webhostapp.com/project_api.php?value=";
    int x = analogRead(A0);
    api += String(x, DEC);
    http.begin(api);
    httpCode = http.GET();
    response = "";
 
    if (httpCode > 0) {
      // start of fetching get process
      response = http.getString();
      Serial.println(response);

    }
    else
      Serial.println(httpCode);
      
    http.end();
    // end of fetching get process

    delay(100);
  }
}
