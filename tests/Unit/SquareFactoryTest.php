<?php

namespace Tests\Unit;

use App\Http\Patterns\SquareFactory;
use App\Models\Square;
use PHPUnit\Framework\TestCase;

class SquareFactoryTest extends TestCase
{
    /**
     * Test the length of a square is set correctly.
     *
     * @return void
     */
    public function testInitialisingSquareLength()
    {
        $square = SquareFactory::create(10, 'blue');
        $expectedLength = 10;
        $actualLength = $square->getLength();
        $this->assertEquals($expectedLength, $actualLength, 'Square Length: ' . $actualLength . ' expected: ' . $expectedLength);
    }

    /**
     * Test the colour of a square is set correctly.
     *
     * @return void
     */
    public function testInitialisingSquareColour()
    {
        $square = SquareFactory::create(10, 'blue');
        $expectedColour = 'blue';
        $actualColour = $square->getColour();
        $this->assertEquals($expectedColour, $actualColour, 'Square Colour: ' . $actualColour . ' expected: ' . $expectedColour);
    }

    /**
     * Test a square object created by the factory is the square class type.
     *
     * @return void
     */
    public function testCreatingSquare()
    {
        $square = SquareFactory::create(10, 'blue');
        $this->assertInstanceOf(Square::class, $square, '');
    }
}
