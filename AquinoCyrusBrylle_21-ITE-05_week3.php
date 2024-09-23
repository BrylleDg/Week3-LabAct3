<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year){
        $this->make = $make; 
        $this->model = $model; 
        $this->year = $year; 
    }

    final public function getDetails(){
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    public function describe(){
        return "This is a vehicle";
    }
}

class Car extends Vehicle{
    private $doors;

    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
    }

    public function describe() {
        return "This car has $this->doors doors.";
    }
}

interface ElectricVehicle {
    public function chargeBattery();
}

class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $doors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $doors);
        $this->batteryLevel = $batteryLevel;
    }

    public function chargeBattery() {
        $this->batteryLevel = 100;
        echo "Battery fully charged.<br>";
    }

    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery.";
    }
}

final class Motorcycle extends Vehicle {
    public function describe() {
        return "This is a motorcycle.";
    }
}

$car = new Car("Lamborghini", "Huracan", 2017, 2);
echo $car->getDetails() . "<br>";
echo $car->describe() . "<br><br>";

$motorcycle = new Motorcycle("Ducati", "Panigale V4 Red", 2024);
echo $motorcycle->getDetails() . "<br>";
echo $motorcycle->describe() . "<br><br>";

$electricCar = new ElectricCar("Tesla", "Model 3", 2023, 4, 75);
echo $electricCar->getDetails() . "<br>";
echo $electricCar->describe() . "<br>";
$electricCar->chargeBattery();
echo $electricCar->describe() . "<br>";
?>
    
</body>
</html>