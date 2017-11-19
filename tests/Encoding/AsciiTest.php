<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Encoding\Ascii;

class AsciiTest extends TestCase
{
    /**
     * @group decode
     */
    public function testDecode()
    {
        $decoder = new Ascii();
        $this->assertEquals('Ola', $decoder->decode('7910897'));
    }

    /**
     * @group encode
     */
    public function testEncode()
    {
        $encoder = new Ascii();
        $this->assertEquals('7797116111107', $encoder->encode('Matok'));
    }
}