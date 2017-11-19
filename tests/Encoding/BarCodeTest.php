<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Encoding\BarCode;

class BarCodeTest extends TestCase
{
    /**
     * @group encode
     * @group bar-code
     * @dataProvider getEncodeTests
     */
    public function testEncode($numberCode, $expectedBarCode)
    {
        $barCode = new BarCode();

        $this->assertEquals($expectedBarCode, $barCode->encode($numberCode));
    }

    /**
     * @group decode
     * @group bar-code
     * @dataProvider getDecodeTests
     */
    public function testDecode($bars, $expectedNumberCode)
    {
        $barCode = new BarCode();

        $this->assertEquals($expectedNumberCode, $barCode->decode($bars));
    }

    public function getEncodeTests()
    {
        return [
            ['043000181706', ['3-2-1-1', '1-1-3-2', '1-4-1-1', '3-2-1-1', '3-2-1-1', '3-2-1-1', '2-2-2-1', '1-2-1-3', '2-2-2-1', '1-3-1-2', '3-2-1-1', '1-1-1-4']],
        ];
    }

    public function getDecodeTests()
    {
        return [
            [['3-2-1-1', '1-1-3-2', '1-4-1-1', '3-2-1-1', '3-2-1-1', '3-2-1-1', '2-2-2-1', '1-2-1-3', '2-2-2-1', '1-3-1-2', '3-2-1-1', '1-1-1-4'], '043000181706'],
        ];
    }
}