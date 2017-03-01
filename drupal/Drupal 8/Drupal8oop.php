<?php
/* 
Programming Jargon:
Parent Class - also called super class or base class
Child Class - also called sub class
method - is a function that contains structured code (sequence, conditions, iterations)
Interface - is a public method. Normally has a return. Accessor and Constructor are both interface. 
    Abstract Interface - more generic (Take me to Airport). More Resuable. 
    Concrete Interface - very specific (Take taxi, turn right, turn left ...)
        Design Thought Process - designed the interface by having users perspective; give only what they need; When first creating a class, hide everything; check requirements to identify the behavior of the interface. 
        Users - Objects that uses and sends data to interface; Users need to know how to use the interface (like what parameters to pass).
    When possible, avoid changes to interface after its built.
    Stubs - a temporary implementation of interface (ie.. simulate database connection)

Implementation - is a private method. It can be change without the knowledge of the user of the interface. 
Constructor - is a method that is the same as classname or use the word contruct method. Primary purpose is for initialization(safe state) of attributes. No return. Called during intantiation. 
    Best practice to have one constructor even if not in used. If you plan to add a contructor, then replace the default (check for bugs) or just simply add another contructor. 


Is a Relationship - Circle is a shape, Square is a shape
    Inheritance - Abstaction (copy a parent to create it's own)
        Multiple Inheritance - Class that inherets from multiple class (except Java, .net, and Objective C)
    Polymorphism - Normally when a public abstract method  of a parent class is overriden.
        When an Abstract class is extended, it is inheretance. And when the methods is overriden that's when you can call poly morphism. 
Has a Relationship 
    composition - a class/object which is composed of other class/object. Embed a class inside another class

Overloading a Method - a method that is called twice within an object/class with different parameter each time. Good if you don't know what possible parameter input the user of the interface/method. 
    For example, the user is login/out they can still order from shopping cart. In each case, if this is a constructor, it can be initialize differently. 

Signature - is a method name + Parameter

Error Handling - Throw an exception, do not ignore. Display and error and do a cleanup by asking user for error feedback. Try and cath method.
Destructors = available on some language like C#. Purpose to prevent memory leak and code cleanup.


How to Think in OOP:
 - Think in Abstract
 - Minimal Interace as possible

When Designing a Class: Keep Extensibility in mind. Provide a way to copy and compare objects. 
    Keep the scope as small as possible. Think carefully if class/object attributes needs to belong to local attribute. 
    Class should be responsible for itself meaning print method of a circle shape is different than printing a square shape. 
    A change in one classs should not interfere other classes. Write and test code at small increment. Use stubs for testing.
    When altering Interface or Implementation of the class, take the old class and wrap it inside the new class.
Non portable code (ie native or concrete interface) - provide a wrapper. 

Objects 
    - Serializing - reconstruct the object after being send to the wire
    - Deserializing - deconstructing an object (Must use the same specification as serializing - normally non-propriteary). 
    - Marshalling - sending object to the wire 

*/

class foo {
    static $my_static = 'foo'; //static means it shares one memory allocation each time it is instantiated. Warning, if the static variable is being used in one object that is running, the current object can potentially change the value from memory.
    var $firstname = ''; //object attribute
    var $lastname; //object attribute
    function call_foo(){
        echo "Calling foo.";
        $count; //local attribute
        this.my_static; //references the object attribute
    }
    function setFirstname($name){
        this.$firstname = fname;
    }
    function setLastName($lname){
        this.$lastname = $lname;
    }
    function getName(){
        return this.firstname + this.lastname; 
    }
}
$bar = new foo;
$bar->call_foo();
?>

<!-- Abstraction Makes the code remain unchanged when extended (getVal, and prefixVal); -->
<?php
abstract class AbstractClass
{
    // Force Extending class to define this method
    abstract protected function getVal();
    abstract protected function prefixVal($prefix);

    // Common method
    public function printOut() {
        print $this->getVal() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getVal() {
        return "ConcreteClass1";
    }

    public function prefixVal($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

//Encapsulation
$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixVal('FOO_') ."\n";
?>

<?php
class Application {
     private static $_user;
     public function User( ) {
          if( $this->_user == null ) {
               $this->_user = new UserData();
          }
          return $this->_user;
     }
}

class UserData {
     private $_name;
     public function __construct() {
          $this->_name = "Krishna kanth";
     }
     public function GetUserName() {
          return $this->_name;
     }
}
$app = new Application();
echo $app->UserData()->GetUserName();
?>


<!-- polymorphism: method overloading, method overriding, and operator overloading. -->
<?php
// Create Shape interace with calculateArea() method.
//ShapeInterface.php
interface Shape {
  public function calculateArea();
}
?>

<?php
require ShapeInterface.php;

// Create Circle class that implement Shape interface.
class Circle implements Shape {
  private $radius;
   
  public function __construct($radius)
  {
    $this -> radius = $radius;
  }
  
  // calcArea calculates the area of circles 
  public function calculateArea()
  {
    return $this -> radius * $this -> radius * pi();
  }
}
?>


<!-- Inheritance -->
<?php
// Declare the interface 'iTemplate'
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Implement the interface
// This will work
class Template implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}

?>