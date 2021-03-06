//PAP BUILD #1.01

//sensor
#include <Wire.h>
#include "Adafruit_SI1145.h"

//leds
#include <Adafruit_NeoPixel.h>
#ifdef __AVR__
  #include <avr/power.h>
#endif

//arduino pin usado + leds nr pins usados
#define PIN            6
#define NUMPIXELS      4

//sensor + led 
Adafruit_SI1145 uv = Adafruit_SI1145();
Adafruit_NeoPixel pixels = Adafruit_NeoPixel(NUMPIXELS, PIN, NEO_GRB + NEO_KHZ800);

//delay leds
int delayval = 500; // delay for half a second


void setup() {
  //arduino
  Serial.begin(9600);
  pixels.begin();
  
  Serial.println("Teste");
  
  if (! uv.begin()) {
    Serial.println("Uv desligado");
    while (1);
  }

  Serial.println("Uv ligado");
  
}

void loop() {
  float UVindex = uv.readUV();
  UVindex /= 100.0;  
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
  
  

}
