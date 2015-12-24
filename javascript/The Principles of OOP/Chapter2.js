

//Function Declaration 
function add(num1, num2) {
return num1 + num2;
}

var result = add(5, 5);
alert(result);

//Function Expression
var add = function(num1, num2) {
return num1 + num2;
};

var result = add(5, 5);
alert(result);


//Function as value
var sayHi = new Function("console.log(\"Hi!\");");
sayHi(); // outputs "Hi!"
var sayHi2 = sayHi;
sayHi2(); // outputs "Hi!"

	
