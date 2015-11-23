function VehicleFactory() {}

VehicleFactory.prototype.vehicleClass = Car;

	VehicleFactory.prototype.getVehicle = function (options) {
		return new this.vehicleClass(options);
	};
	
	var carFactory = new VehicleFactory();
	
		var car = carFactory.getVehicle({ color: "yellow", turbo: true });
		console.log(car instanceof Car); // => true
		// approach #1: Modify a VehicleFactory instance to use the Truck class

	carFactory.vehicleClass = Truck;

		var mover = carFactory.getVehicle({ enclosedCargo: true, length: 26 });
		counsole.log(mover instanceof Truck); // => true
		// approach #2: Subclass VehicleFactory to create a factory class that
		// builds Trucks

function TruckFactory () {}

	TruckFactory.prototype = new VehicleFactory();
	TruckFactory.prototype.vehicleClass = Truck;
	
	var truckFactory = new TruckFactory();
	var bigfoot = truckFactory.getVehicle({ monster: true, cylinders: 12 });
	console.log(bigfoot instanceof Truck); // => true
	
/*************************************/
var peopleFactory = function(name, age, state){
	var temp = {};
	
	temp.age = age;
	temp.name = name;
	temp.state = state;
	temp.printPerson = function(){
		console.log(this.name + ", " + this.age + ", " + this.state);
	}
	
	return temp;
}

var person1 = peopleFactory("john", 23, "CA");
var person2 = peopleFactory("kim", 27, "SC");

person1.printPerson();
person2.printPerson();