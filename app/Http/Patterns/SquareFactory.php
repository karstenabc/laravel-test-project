<?php

namespace App\Http\Patterns;

use App\Models\Square;

class SquareFactory {
    // Create a square object with the given parameters
    public static function create($length, $colour)
    {
        return new Square($length, $colour);
    }
}
