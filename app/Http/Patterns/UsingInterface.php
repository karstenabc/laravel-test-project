<?php

namespace App\Http\Patterns;

use App\Http\Patterns\SquareInterface;
use App\Models\Square;

class UsingInterface implements SquareInterface
{
    public function getArea($square)
    {
        return $square->sides * $square->length;
    }

    public function getCircumference($square)
    {
        return $square->sides * $square->length;
    }
}