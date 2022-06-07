int led = 5;
int tilt = 4;
int ledState = 0;
int helpBtn = 6;
int count = 0;
int btnState = 0;
int buzzer = 8;
  
void setup() {
  pinMode(led, OUTPUT);
  pinMode(tilt,INPUT);
  pinMode(helpBtn, INPUT);
  pinMode(buzzer, OUTPUT);

  Serial.begin(9600);
}

void cancel() {
  alarm(0);
  delay(10000); //waiting for the person to stand up
}

int alarm(int x) {
  if(x == 1){
    tone(buzzer, 1000);
  } else {
    noTone(buzzer);
  }
}

void emergency() {
  btnState = digitalRead(helpBtn);
  count = 0;
  
  while(btnState == 1) {
    count += 1;
    Serial.println("");
    while (count > 500) {
      Serial.println(2);
      alarm(1);
      delay(3000);
      alarm(0);
      count = 0;
    }
    alarm(0);
    btnState = digitalRead(helpBtn);
  }
}

void loop() {
  while(digitalRead(tilt) == 0){
      digitalWrite(led,HIGH);
      delay(500);
      digitalWrite(led,LOW);
      delay(500);
      Serial.println(digitalRead(tilt));

      if (digitalRead(helpBtn) == 1) {
        cancel();
      }
      
      emergency();
      alarm(1);
  } 
  
  if (digitalRead(tilt) == 1){
    digitalWrite(led,LOW);
    alarm(0);
  }

  emergency();
  
  delay(100);
  Serial.println(digitalRead(tilt));
}
