#include <Wire.h>
#include "Adafruit_SI1145.h"
#include <SPI.h>
#include <Ethernet.h>

//leds
//#include <Adafruit_NeoPixel.h>
#ifdef __AVR__
  #include <avr/power.h>
#endif

/*arduino pin usado + leds nr pins usados
#define PIN            6
#define NUMPIXELS      4
*/

Adafruit_SI1145 uv = Adafruit_SI1145();
//Adafruit_NeoPixel pixels = Adafruit_NeoPixel(NUMPIXELS, PIN, NEO_GRB + NEO_KHZ800);

//delay leds
int delayval = 500; // delay for half a second


byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
 
// Enter the IP address for Arduino, as mentioned we will use 192.168.0.16
// Be careful to use , insetead of . when you enter the address here
IPAddress ip(192,168,137,11);
 


char server[] = "192.168.137.1"; // IMPORTANT: If you are using XAMPP you will have to find out the IP address of your computer and put it here (it is explained in previous article). If you have a web page, enter its address (ie. "www.yourwebpage.com")
//char server[] = "localhost";

// Initialize the Ethernet server library
EthernetClient client;

void setup() {
 
  // Serial.begin starts the serial connection between computer and Arduino
  Serial.begin(9600);
   // pixels.begin();

  
  //start UV sensor
  if (! uv.begin()) {
    Serial.println("UV desligado");
  }

  Serial.println ("UV ligado");
 
  // start the Ethernet connection
  Ethernet.begin(mac, ip);
    
}

void loop() {

   // get data from sensor
   float UVindex = uv.readUV();
   UVindex /= 100.0;
   Serial.print("UV BEFORE LEDS/DB");Serial.println(UVindex);
/*

     if(UVindex==0.00){
   Serial.print("UV: ");  Serial.println(UVindex);
   
     for(int i=0;i<NUMPIXELS;i++){
      pixels.setPixelColor(i, pixels.Color(150,0,0)); // Moderately bright green color.
      pixels.show(); // This sends the updated pixel color to the hardware.
       delay(delayval); // Delay for a period of time (in milliseconds)
         }
         
  }
  else if(UVindex == 0.01){
    Serial.print("UV: ");  Serial.println(UVindex);
   
     for(int i=0;i<NUMPIXELS;i++){
      pixels.setPixelColor(i, pixels.Color(0,150,0)); // Moderately bright green color.
      pixels.show(); // This sends the updated pixel color to the hardware.
       delay(delayval); // Delay for a period of time (in milliseconds)
       
         }
  }
         
   else if(UVindex == 0.02){
    Serial.print("UV: ");  Serial.println(UVindex);
   
     for(int i=0;i<NUMPIXELS;i++){
      pixels.setPixelColor(i, pixels.Color(0,0,150)); // Moderately bright green color.
      pixels.show(); // This sends the updated pixel color to the hardware.
       delay(delayval); // Delay for a period of time (in milliseconds)
       
         }
  }
    */
  
  // Connect to the server (your computer or web page)  
 if (client.connect(server,80)) {

     while(client.connected()) {

      // Header start
     Serial.println("connected");
     client.print("GET /arduino_client_UV_VALUES/pap/getUV.php?");
     client.print("UVindex=");
     client.print(UVindex);
     client.println(" HTTP/1.1");
     client.println("Host: 192.168.137.1");
     //client.println("Connection: close");
     client.println();
     // Header finish

     delay(500);
      
    }
  
    
     
Serial.println();

//while(client.connected()){
  //while(client.available()){
    //Serial.write(client.read());
  //}
//}

     
  } else {
    Serial.println(server);
    Serial.println("connection failed");
  }

 
  // Give the server some time to recieve the data and store it. I used 10 seconds here. Be advised when delaying. If u use a short delay, the server might not capture data because of Arduino transmitting new data too soon.
  delay(1000);
}
