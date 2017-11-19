<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Encryption\Rot5;

class Rot5Test extends TestCase
{
    /**
     * @group encrypt
     * @dataProvider getEncryptTests
     */
    public function testEncrypt($expectedResult, $plainText)
    {
        $rot13 = new Rot5();

        $this->assertEquals($expectedResult, $rot13->encrypt($plainText));
    }

    /**
     * @group decrypt
     * @dataProvider getDecryptTests
     */
    public function testDecrypt($expectedResult, $encryptedText)
    {
        $rot13 = new Rot5();

        $this->assertEquals($expectedResult, $rot13->decrypt($encryptedText));
    }

    public function getEncryptTests()
    {
        return [
            ['6', '1'],
            ['78', '23'],
            ['901', '456'],
            ['2345', '7890'],
        ];
    }

    public function getDecryptTests()
    {
        return [
            ['1', '6'],
            ['23', '78'],
            ['456', '901'],
            ['7890', '2345'],
        ];
    }
}