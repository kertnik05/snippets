/****************** Constructors **************************/
function Person() {
// intentionally empty
}
var person1 = new Person();
var person2 = new Person;
alert(person1 instanceof Person); // true
alert(person2 instanceof Person); // true
alert(person1.constructor === Person); // true - check the type of an instance
alert(person2.constructor === Person); // true
//Object Constructor in function notation
function Person(name) {
	this.name = name;
	this.sayName = function() {
		alert(this.name);
	};
}
var person1 = new Person("Nicholas");
var person2 = new Person("Greg");

alert(person1.name); // "Nicholas"
alert(person2.name); // "Greg"
person1.sayName(); // outputs "Nicholas"
person2.sayName(); // outputs "Greg"

//Object Constructor in Object literal notation
function Person(name) {
  Object.defineProperty(this, "name", {
  get: function() {
    return name;
  },
  set: function(newName) {
  	name = newName;
  },
  enumerable: true,
  configurable: true
  });
  this.sayName = function() {
  	alert(this.name);
  };
}

var person1 = Person("Nicholas"); // note: missing "new"; It will create person1 which is equal of Person contractor but not an instance of Person
alert(person1 instanceof Person); // false
alert(typeof person1); // "undefined"
alert(name); // "Nicholas"

/****************** Prototypes **************************/
/*Almost every function
(with the exception of some built-in functions) has a prototype property
that is used during the creation of new instances.*/
var book = {
	title: "The Principles of Object-Oriented JavaScript"
};
alert("title" in book); // true
alert(book.hasOwnProperty("title")); // true
alert("hasOwnProperty" in book); // true
alert(book.hasOwnProperty("hasOwnProperty")); // false
alert(book.hasOwnProperty("title")); // true
alert(Object.prototype.hasOwnProperty("hasOwnProperty")); // true

function hasPrototypeProperty(object, name) {
	return name in object && !object.hasOwnProperty(name);
}
alert(hasPrototypeProperty(book, "title")); // false
alert(hasPrototypeProperty(book, "hasOwnProperty")); // true