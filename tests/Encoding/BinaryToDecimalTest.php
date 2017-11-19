<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Encoding\BinaryToDecimal;

class BinaryToDecimalTest extends TestCase
{
    /**
     * @group decode
     */
    public function testDecode()
    {
        $decoder = new BinaryToDecimal(8);
        $this->assertEquals('Matok', $decoder->decode('450100010101'));
    }

    /**
     * @group encode
     */
    public function testEncode()
    {
        $encoder = new BinaryToDecimal(8);
        $this->assertEquals('450100010101', $encoder->encode('Matok'));
    }
}