<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Encryption\Rot13;

class Rot13Test extends TestCase
{
    /**
     * @group encrypt
     * @dataProvider getEncryptTests
     */
    public function testEncrypt($expectedResult, $plainText)
    {
        $rot13 = new Rot13();

        $this->assertEquals($expectedResult, $rot13->encrypt($plainText));
    }

    public function getEncryptTests()
    {
        return [
            ['Hello', 'Uryyb'],
        ];
    }
}