<?php

namespace \App\Http\Patterns;

use App\Http\Patterns\SquareFactory;
use App\Http\Patterns\UsingInterface;
use App\Models\Square;

class Usage {
    // Example usage of the square factory
    public function factory()
    {
        // Use the square factory to create a large square
        $largeBlueSqare = SquareFactory::create('50', 'blue');
        echo $largeBlueSqare->getInfo();
    }

    // Example usage of the square interface
    public function interface()
    {
        $square = SquareFactory::create(10, 'white');
        $squareFunctions = new UsingInterface();
        $area = $squareFunctions->getArea($square);
    }
}