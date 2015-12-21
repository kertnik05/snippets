
function person(name, age, address) {
	this.name = name;
	this.age = age;
	this.address = address;
	//adding shared external methods
	this.employmentStatus = isEmployed;
	this.toString = function () {
		return this.name + "is " + age + " yearsold and has address of  " + this.address;
	};
}

function isEmployed (){
	if (typeof this.job == 'undefined'){
		return "not employed";
	} else {
		return "employed";
	}
}

function yearsLeft(){
	var numYears = 65 - this.age;
	return numYears;
}

//setting properties
var jake = new person('jake', 34,  '55 michigan ave NE, Washington D.C.');
//adding variable to extend 
jake.job = "programmer";

//adding methods to extend 
jake.yearsLeft = function() {
	var numYears = 65 - this.age;
	return numYears;
}

//getting properties
alert(jake.name);
alert(jake.age);
alert(jake.address);
alert(jake.job);
alert(jake.employmentStatus());

//getting methods
alert(jake.toString());
alert(jake.yearsLeft());

var molly = new person('molly', 21,  '100 michigan ave NW, Washington D.C.');
alert(molly.name);
alert(molly.age);
alert(molly.address);
alert(molly.job);
alert(molly.toString());
alert(molly.employmentStatus());
