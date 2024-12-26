<?php

  // Cannot Be Instantiated
// You cannot create an object of an abstract class directly.



// An abstract class is a class in object-oriented programming that cannot be instantiated on its own and is 
// designed to be extended by other classes. It can contain both abstract methods (methods without implementation)
//  and concrete methods 


abstract class Animal {
    abstract public function makeSound();
}

// This will cause an error:
// $animal = new Animal(); 
// You cannot create an object of the abstract class, but you can create objects of 
// the child classes that implement the abstract methods.




// The abstract class defines what methods child classes must have.
// The child classes provide how those methods work by implementing them.

class Dog extends Animal {
    public function makeSound() {
        echo "fff!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow!";
    }
}


$dog = new Dog();
$dog->makeSound();
echo "<br>";


$cat = new Cat();
$cat->makeSound();
echo "<br>";




// blueprint

// Enforce Structure:
// They ensure that all child classes follow a consistent method structure. 
// For example, all animals must have a makeSound() method, even if the sound differs.


// Promote Code Reuse:
// Abstract methods ensure that common requirements are defined at a higher level, 
// while specifics are handled at the lower levels.

// Avoid Duplication:
// The shared logic can go into regular methods in the abstract class,
//  while unique logic is implemented in abstract methods in child classes.








// abstract class Product {
//     protected $name;
//     protected $price;

//     public function __construct($name, $price) {
//         $this->name = $name;
//         $this->price = $price;
//     }

//     abstract public function calculateShipping();
//     abstract public function handleReturn();

//     public function displayProductDetails() {
//         echo "Product Name: $this->name\n";
//         echo "Price: $this->price\n";
//     }
// }



// class PhysicalProduct extends Product {
//     public function calculateShipping() {
//         echo "Calculating shipping based on weight and dimensions for $this->name.\n";
//     }

//     public function handleReturn() {
//         echo "Processing return for physical product: $this->name.\n";
//     }
// }


// class SubscriptionProduct extends Product {
//     public function calculateShipping() {
//         echo "No shipping required for subscription: $this->name.\n";
//     }

//     public function handleReturn() {
//         echo "Handling cancellation for subscription: $this->name.\n";
//     }
// }


// $physicalProduct = new PhysicalProduct("Laptop", 1200);
// $physicalProduct->displayProductDetails();
// echo "<br>";
// echo "<br>";
// $physicalProduct->calculateShipping(); 
// echo "<br>";
// echo "<br>";
// $physicalProduct->handleReturn();
// echo "<br>";
// echo "<br>";



// $subscriptionProduct = new SubscriptionProduct("Streaming Service", 10);
// echo "<br>";
// echo "<br>";

// $subscriptionProduct->displayProductDetails(); 
// echo "<br>";
// echo "<br>";

// $subscriptionProduct->calculateShipping(); 
// echo "<br>";
// echo "<br>";

// $subscriptionProduct->handleReturn();
// echo "<br>";

















// Advanced Usage: Polymorphism with Abstract Classes
// Abstract methods are particularly useful when working with polymorphism. For example, if you have multiple child classes implementing the same abstract method, you can treat them all as instances of the abstract class and call the method without knowing the exact type of object.

// Example
// abstract class Animal {
//     abstract public function makeSound();
// }

// class Dog extends Animal {
//     public function makeSound() {
//         echo "Woof!";
//     }
// }

// class Cat extends Animal {
//     public function makeSound() {
//         echo "Meow!";
//     }
// }

// // Polymorphism in action
// function makeAnimalSound(Animal $animal) {
//     $animal->makeSound();
// }

// $dog = new Dog();
// $cat = new Cat();

// makeAnimalSound($dog);
// makeAnimalSound($cat); 









































// <!-- Interfaces vs. Abstract Classes

// Interface are similar to abstract classes. The difference between interfaces and abstract classes are:

// Interfaces cannot have properties, while abstract classes can
// All interface methods must be public, while abstract class methods is public or protected
// All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
// Classes can implement an interface while inheriting from another class at the same time -->

// No Properties:

// Unlike abstract classes, interfaces cannot contain properties (variables).
// Multiple Inheritance:

// A class can implement multiple interfaces, allowing PHP to simulate multiple inheritance.











// interface Logger {
//     public function log(string $message);
// }


// class FileLogger implements Logger {
//     public function log(string $message) {
//         echo "Logging to a file: $message\n";
//     }
// }
// $fileLogger = new FileLogger();
// $fileLogger->log("File log message");


// Inheritance
// Abstract Class:
// An abstract class can provide both fully implemented methods (with code) and abstract methods