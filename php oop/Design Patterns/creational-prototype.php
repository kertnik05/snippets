<?php
/**
 * 
 * Reference: http://www.jakowicz.com/prototype-pattern-in-php/
 * create objects by cloning existing objects instead of initialising new objects.
 * cloning is for sure less processor intensive 
 * Cloning objects in PHP is extremely easy due to its magic __clone() method
 */

class MyCloneable
{
    public $object1;
    public $object2;
    function __clone() {
        // Force a copy of this->object, otherwise it will point to same object.
        $this->object1 = clone $this->object1;
    }
}


class SubObject
{
    static $instances = 0;
    public $instance;
    public function __construct() {
        $this->instance = ++self::$instances;
    }
    public function __clone() {
        $this->instance = ++self::$instances;
    }
}



$obj = new MyCloneable();


//MyCloneable's object1 gets instantiated with SubObject()
$obj->object1 = new SubObject();
//MyCloneable's object2 gets instantiated with SubObject()
$obj->object2 = new SubObject();

//Actual Cloning process
$obj2 = clone $obj;

print("Original Object:\n");
print_r($obj);

print("Cloned Object:\n");
print_r($obj2);

?>
<?php 
/* Output
	Original Object:
	MyCloneable Object
	(
	    [object1] => SubObject Object
	        (
	            [instance] => 1
	        )
	
	    [object2] => SubObject Object
	        (
	            [instance] => 2
	        )
	
	)
 
	Cloned Object:
	MyCloneable Object
	(
	    [object1] => SubObject Object
	        (
	            [instance] => 3
	        )
	
	    [object2] => SubObject Object
	        (
	            [instance] => 2
	        )
	
	)
*/
?>
