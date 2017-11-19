<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Encryption\Rot47;

class Rot47Test extends TestCase
{
    /**
     * @group encrypt
     * @dataProvider getEncryptTests
     */
    public function testEncrypt($plainText, $expectedResult)
    {
        $rot13 = new Rot47();

        $this->assertEquals($expectedResult, $rot13->encrypt($plainText));
    }

    public function getEncryptTests()
    {
        return [
            ['The Quick Brown Fox Jumps Over The Lazy Dog', '%96 "F:4< qC@H? u@I yF>AD ~G6C %96 {2KJ s@8'],
        ];
    }
}