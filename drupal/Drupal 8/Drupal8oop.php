<?php
class foo {
    function call_foo(){
        echo "Calling foo.";
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