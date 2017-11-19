<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Encoding\Base64;

class BasicTest extends TestCase
{
    /**
     * @group decode
     */
    public function testDecode()
    {
        $decoder = new Base64();
        $this->assertEquals('Matok', $decoder->decode('TWF0b2s='));
    }

    /**
     * @group encode
     */
    public function testEncode()
    {
        $encoder = new Base64();
        $this->assertEquals('TWF0b2s=', $encoder->encode('Matok'));
    }
}