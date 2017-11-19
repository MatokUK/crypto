<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\AncientPhone;

class AncientPhoneTest extends TestCase
{
    /**
     * @group decode
     * @group phone
     */
    public function testDecode()
    {
        $decoder = new AncientPhone();
        $this->assertEquals('Matok', $decoder->decode('99999'));
        //$this->assertEquals('Matok', $decoder->decode('62866655'));

    }

    /**
     * @group encode
     * @group phone
     */
    public function testEncode()
    {
        $encoder = new AncientPhone();
        $this->assertEquals('62866655', $encoder->encode('matok'));
    }
}