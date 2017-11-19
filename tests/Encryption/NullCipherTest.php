<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Encryption\NullCipher;

class NullCipherTest extends TestCase
{
    /**
     * @group decrypt
     *
     * @dataProvider getDecodeTests
     */
    public function testDecrypt($cipherText, $decryptKey, $expectedResult)
    {
        $decoder = new NullCipher($decryptKey);
        $decryptedText = $decoder->decrypt($cipherText);

        $this->assertEquals($expectedResult, $decryptedText);
    }


    public function getDecodeTests()
    {
        return [
            ['Susan says Gail lies. Matt lets Susan feel jovial. Elated angry?', [0, 1, 2], 'SailatSevEn'],
            ['News Eight Weather: Tonight increasing snow. Unexpected precipitation smothers eastern towns. Be extremely cautious and use snowtires especially heading east. The highway is not knowingly slippery. Highway evacuation is suspected. Police report emergency situations in downtown ending near Tuesday.', [0], 'NEWTisUpsetBecauseheThinksHeisPresidenT'],
            ['Can you fell natural', -1, 'null']
        ];
    }
}