<?php

include 'Model.php';

class Shape
{

    use ModelTraits, OptionListTraits;

    protected $height;
    protected $widht;
    protected $diameter;
    protected $length;
    protected $unit = 'cm';

    public function __construct($_length, $_widht)
    {
        $this->length = $_length;
        $this->width = $_widht;
    }

    public function setDiameter($value)
    {

        $this->diameter = $value;
    }

    public function getDiameter()
    {
        return $this->diameter . ' ' . $this->unit;
    }

    public function setHeight($value)
    {
        if (is_int($value)) {
            $this->height = $value;
        }
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setUnit($value)
    {
        $this->unit = $value;
    }

    public function computeArea()
    {
        return ($this->length * $this->width) . ' sq' . $this->unit;
    }

    public function computePerimeter()
    {
        return ($this->length * 2) + ($this->width * 2);
    }
}

class Square extends Shape
{
    public function __construct($_length)
    {
        parent::__construct($_length, $_length);
    }
}

class Rectagle extends Shape
{
    public function __construct($_length, $_widht)
    {
        parent::__construct($_length, $_widht);
    }
}

class Triangle extends Shape
{
    public function __construct($_base, $_height)
    {
        parent::__construct($_base, 0);
        $this->height = $_height;
    }

    public function computeArea()
    {
        return (($this->height * $this->length) / 2) . ' sq' . $this->unit;
    }
}

class Circle extends Shape
{
    public function __construct($_diameter)
    {
        parent::__construct(0, 0);
        $this->diameter = $_diameter;
    }

    public function computeArea()
    {
        return (pi() * ($this->diameter / 2) ** 2) . ' sq' . $this->unit;
    }
}

$square = new Square(4, 7);
echo $square->computeArea() . '<br/>';
echo $square->computePerimeter() . '<br/>';

$rectagle = new Rectagle(4, 7);
echo $rectagle->computeArea() . '<br/>';

$triangle = new Triangle(5, 9);
echo $triangle->computeArea() . '<br/>';

$circle = new Circle(5);
echo $circle->computeArea() . '<br/>';
