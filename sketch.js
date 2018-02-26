function setup(){
	var canvas=createCanvas(400,400);
	 canvas.parent('sketch');
	angleMode(DEGREES);
}
function draw(){
	background(255);
	rotate(-90);
	translate(-200,0);


	let hr = hour();
	let mn= minute();
	let sc = second();
	
	let end1=map(sc,0,59,0,360);
	let end2=map(mn,0,59,0,360);
	let end3=map(hr%12,0,12,0,360);

	stroke(200,25,25);
	push();
	rotate(end1);
	line(0,0,100,0)
	pop();


	stroke(12,108,150);
	push();
	rotate(end2);
	line(0,0,100,0)
	pop();
	
	stroke(40,200,50);
	push();
	rotate(end3);
	line(0,0,100,0)
	pop();
	point(-0,0);




	strokeWeight(8);
	stroke(255,100,150);
	noFill();

	stroke(200,25,25);
	arc(0,200,300,300,0,end1);


	stroke(12,108,150);
	arc(0,200,280,280,0,end2);
	
	
	stroke(40,200,50);
	arc(0,200,260,260,0,end3);

}