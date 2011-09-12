/**
 * 3D London Twits View
 * by Roberto Torella
 */

String data[];

void setup() {
  size(640, 360, P3D);
  fill(204);
  data = loadStrings("../data.csv");
}

void draw() {
  lights();
  background(0);
  
  // Change height of the camera with mouseY
  camera(mouseX-(width/2), mouseY-(height/2), 220.0, // eyeX, eyeY, eyeZ
         0.0, 0.0, 0.0, // centerX, centerY, centerZ
         0.0, 1.0, 0.0); // upX, upY, upZ
  
  noStroke();
  for (int i=0; i<data.length; i++) {
    String[] pieces=split(data[i]," ");
    float x=float(pieces[0])+50;
    float y=float(pieces[0]);
    pix(x,y,0,1);
  }
}

void pix(float x,float y,float z,float r) {
    translate(x,y,z);
    sphere(r);
    translate(-x,-y,-z);
}
