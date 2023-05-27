<?php

abstract class Shape {
    protected $name;
    abstract public function description();
}

interface IShape {
  public function getArea($params_array);
  public function getPerimeter($params_array);
}

class Square extends Shape implements IShape{
    protected $name = 'Square';
    public function description(){
        return "$this->name have four equal sides.";
    }
    public function getArea($params_array){
        if($params_array['length'] !== $params_array['width']){
            return "\"invalid\" as length and width needs to be equal.";
        }
        return $params_array['length'] * $params_array['width'];
    }
    public function getPerimeter($params_array){
        if($params_array['length'] !== $params_array['width']){
            return "\"invalid\" as length and width needs to be equal.";
        }
        return ($params_array['length'] * 2 )  + ($params_array['width'] * 2);
    }
}

class Rectangle extends Shape implements IShape{
    protected $name = 'Rectangle';
    public function description(){
        return "$this->name have two equal sides.";
    }
    public function getArea($params_array){
        return $params_array['length'] * $params_array['width'];
    }
    public function getPerimeter($params_array){
        return ($params_array['length'] * 2 )  + ($params_array['width'] * 2);
    }
}

class Triangle extends Shape implements IShape{
    protected $name = 'Triangle';
    public function description(){
        return "$this->name have three sides.";
    }
    public function getArea($params_array){
        return ($params_array['length'] * $params_array['width']) / 2;
    }
    public function getPerimeter($params_array){
        return $params_array['length'] + $params_array['width'] + $params_array['height'];
    }
}

class Circle extends Shape{
    protected $name = 'Circle';
    public function description(){
        return "$this->name have no sides only curve.";
    }
    public function getArea($params_array){
        return round(pi() * ($params_array['radius'] ** 2), 2);
    }
    public function getPerimeter($params_array){
        return round(2 * (pi() * $params_array['radius']) , 3);
    }
}


$shape1 = new Square();
echo $shape1->description() . "\n"; // Output: "Square has four equal sides."
echo $shape1->getArea(['length' => 4, 'width' => 4]) . "\n"; // Output: 16
echo $shape1->getArea(['length' => 4, 'width' => 3]) . "\n"; // Output: "invalid" as length and width need to be equal
echo $shape1->getPerimeter(['length' => 4, 'width' => 4]) . "\n"; // Output: 16
echo $shape1->getPerimeter(['length' => 4, 'width' => 3]) . "\n"; // Output: "invalid" as length and width need to be equal

//Rectangle Class
$shape2  = new Rectangle();
echo $shape2 ->description() . "\n"; // output "Rectangle have two equal sides."
echo $shape2 ->getArea(['length' => 4, 'width' => 6]) . "\n"; // output 24
echo $shape2 ->getPerimeter(['length' => 4, 'width' => 6]) . "\n"; // output 20

//Triangle Class
$shape3 = new Triangle();
echo $shape3->description() . "\n"; // output "Triangle have three sides."
echo $shape3->getArea(['length' => 4, 'width' => 6]). "\n"; // output 12
echo $shape3->getPerimeter(['length' => 4, 'width' => 6, "height" => 7]). "\n"; // output 17

$shape4 = new Circle();
echo $shape4->description() . "\n"; // output "Circle have no sides only curve."
echo $shape4->getArea(['radius' => 5]) . "\n"; // output 78.54, consider the first parameter as the radius value
echo $shape4->getPerimeter(['radius' => 5]) . "\n"; // output 31.416, consider the first parameter as the radius value