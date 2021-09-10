<!-------------------------------
Exercise 2: Explain the following in PHP including some sample code to illustrate.
2.1 A class
2.2 An object
2.3 method
2.4 Class inheritance
2.5 Method overloading
2.6 Class Singleton
--------------------------------->

<?php
    //2.1 A Class
    //Class is a collection of objects and it defined using the keyword "class". .
    //Fruit is an exmaple of a class in php
    class Car 
    {
        public $name;
        public $color;

        public function __construct($name, $color) 
        {
            $this->name = $name;
            $this->color = $color;
        }

        //2.5 Method overloading
        //Method overloading is when properties and methods are create dynamically. To achieve method overloading the PHP magic method need to be utilize.
        //Overloading methods via the __set()
        public function __set($name, $color)
        {
            echo "Setting '$name' to '$color'\n";
            $this->data[$name] = $color;
        }

        //2.3 A method
        //Methods are functions inside classes which are used to perform actions.
        //Hello function is an example of a method because it is use inside the class Fruit
        public function display() 
        {
            echo "The car name is {$this->name} and the color is {$this->color}.";
        }
    }

    // 2.4 Class inheritance
    // Class inheritance is when a class(child class) inherit all the public and protected properties and methods from another class known as parent class.
    // The child class is also known as derived class or a subclass while The parent class is also called a base class or super class.
    //The extends keyword is use to define a class inherits from another class.
    // The code example below show Bmw Class is inherited from Car class
    class Bmw extends Car 
    {
        //method
        public function message() 
        {
            echo "Bmw is a car company.";
        }
    }



    //2.6 Singleton
    // A Singleton Pattern ensures that a class has only one instance and provides a single(global) point of access to it for any other code. It ensures that only one object is available all across the application in a controlled state.
    // Below program illustrates the Singleton Design Pattern 
    class Singleton 
    {
        private static $obj;
                 
        private final function __construct() 
        {
            echo __CLASS__ . " initialize only once ";
        }
     
        public static function getConnect() 
        {
            if (!isset(self::$obj)) {
                self::$obj = new Singleton();
            }
             
            return self::$obj;
        }
    }

    //2.2 An object
    //An Object is an instance of either a built-in or user defined class.
    //The Keyword "new" is use to declare an object of a class.
    //Create an object for the class Bmw
    $car = new Car("Hilux", "Blue");
    $bmw = new Bmw("Bmw M3", "white");

    echo "2.3 A method";
    echo "<br>";
    echo "Calling the method Display()";
    echo "<br>";
    echo "Output:";
    echo "<br>";
    $car->display();

    echo "<br>";
    echo "<br>";

    //output for class inheritance
    echo "2.4 class inheritance";
    echo "<br>";
    echo "The Bmw class inherit name and color for the Car class.";
    echo "<br>";
    echo "Output:";
    echo "<br>";
    $bmw->message();
    echo "<br>";
    $bmw->display();

    echo "<br>";
    echo "<br>";

    //output for method overloading
    echo "2.5 Method overloading";
    echo "<br>";
    echo "Output:";
    echo "<br>";
    $car->name = "Corolla";
    $car->color = "Red";
    echo "Name: ".$car->name . "<br>". "Color: " .$car->color;

    echo "<br>";
    echo "<br>";

    //output for singleton
    echo "2.6 Singleton";
    echo "<br>";
    echo "Output:";
    echo "<br>";
    $obj1 = Singleton::getConnect();
    $obj2 = Singleton::getConnect();

    var_dump($obj1 == $obj2);

?>