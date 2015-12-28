/****************** Defining Properties **************************/
var person1 = {
	name: "Nicholas"  //- It uses intenal js put method
};
var person2 = new Object();
person2.name = "Nicholas"; //- It uses intenal js put method

person1.age = "Redacted";//- It uses intenal js put method
person2.age = "Redacted";//- It uses intenal js put method
person1.name = "Greg";//overrides person1.name = "Nicholas"; - It uses intenal js set method
//overrides person2.name = "Nicholas"; - It uses intenal js set method
person2.name = "Michael";

//Detecting Properties ; in checks all properties including prototype; hasOwnProperty checks only declared properties
alert("name" in person1); // true
alert("age" in person1); // true
alert("title" in person1); // false
alert(person1.hasOwnProperty("name"));//true
alert("toString" in person1); // true -- toString() method, however, is a prototype property that is present on all objects
alert(person1.hasOwnProperty("toString")); // false


/****************** Removing Properties **************************/
var person1 = {
	name: "Nicholas"
};
alert("name" in person1); // true
delete person1.name; // true - not output
alert("name" in person1); // false
alert(person1.name); // undefined