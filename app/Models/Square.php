<?php

namespace App\Models;

class Square
{
    private Int $length;
    private String $colour;
    private static $sides = 4;

    public function __construct($length, $colour)
    {
        $this->length = $length;
        $this->colour = $colour;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getColour()
    {
        return $this->colour;
    }

    public function __toString()
    {
        return $this->length . ' ' . $this->colour;
    }
}
