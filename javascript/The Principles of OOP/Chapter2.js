
/****************** Functions **************************/
//Function Declaration - you can call this function before or after declaring it.
function add(num1, num2) {
	return num1 + num2;
}

var result = add(5, 5);
alert(result);

//Function Expression -  needs to be declared before calling it
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

var numbers = [ 1, 5, 8, 4, 7, 10, 2, 6 ];


numbers.sort();
alert(numbers); // "[1, 10, 2, 4, 5, 6, 7, 8]"

numbers.sort(function(first, second) {
	return first - second;
});
alert(numbers); // "[1, 2, 4, 5, 6, 7, 8, 10]"

function sayMessage(message) {
	alert(message);
}
function sayMessage() {
	alert("Default message");
}
sayMessage("Hello!"); // multiple functions with the same name, the one that appears last in your code wins
/****************** Parameters **************************/
//Function as sum
function sum() {
	var result = 0,
	i = 0,
	len = arguments.length;
	while (i < len) {
		result += arguments[i];
		i++;
	}
	return result;
}
	alert(sum(1, 2)); // 3
	alert(sum(3, 4, 5, 6)); // 18
	alert(sum(50)); // 50
	alert(sum()); // 0

	
	
// Function Argument	
function reflect(value) {
	return value;
}
alert(reflect("Hi!")); // "Hi!"
alert(reflect("Hi!", 25)); // "Hi!" --> drops 25 because there's no placeholder
alert(reflect.length); // 1 --> Because there's a paramerter 

reflect = function() {
	return arguments[0];
};
alert(reflect("Hi!")); // "Hi!"
alert(reflect("Hi!", 25)); // "Hi!"--> drops 25 because there's no placeholder
alert(reflect.length); // 0 --> Because there's no paramerter 

/****************** Overloading **************************/

function sayMessage(message) {
	if (arguments.length === 0) {
	message = "Default message";
	}
	alert(message);
}
sayMessage("Hello!"); // outputs "Hello!"

/****************** Object Methods **************************/
var person = {
	name: "Nicholas",
	sayName: function() {
			alert(person.name);
		}
	};
person.sayName(); // outputs "Nicholas"
