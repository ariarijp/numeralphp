<?php
namespace Numeralphp\Tests;

use Numeralphp\Numeralphp as numeral;

class NumeralphpTest extends \PHPUnit_Framework_TestCase
{
    public function testFormat()
    {
        $str = numeral::new(1000)->format();
        $this->assertEquals('1,000', $str);

        $str = numeral::new(10000)->format('0,0.0000');
        $this->assertEquals('10,000.0000', $str);

        $str = numeral::new(10000.23)->format('0,0');
        $this->assertEquals('10,000', $str);

        $str = numeral::new(10000.23)->format('+0,0');
        $this->assertEquals('+10,000', $str);

        $str = numeral::new(-10000)->format('0,0.0');
        $this->assertEquals('-10,000.0', $str);

        $str = numeral::new(10000.1234)->format('0.000');
        $this->assertEquals('10000.123', $str);

        $str = numeral::new(10000.1234)->format('0.00000');
        $this->assertEquals('10000.12340', $str);
    }
}
