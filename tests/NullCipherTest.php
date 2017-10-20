<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\NullCipher;

class BasicTest extends TestCase
{
    /**
     * @group decode
     *
     * @dataProvider getDecodeTests
     */
    public function testDecode($cipherText, $decryptKey, $expectedResult)
    {
        $decoder = new NullCipher($decryptKey);
        $decryptedText = $decoder->decode($cipherText);

        $this->assertEquals($expectedResult, $decryptedText);
    }


    public function getDecodeTests()
    {
        return [
            ['Susan says Gail lies. Matt lets Susan feel jovial. Elated angry?', [1, 2, 3], 'Sail at seven'],
            ['News Eight Weather: Tonight increasing snow. Unexpected precipitation smothers eastern towns. Be extremely cautious and use snowtires especially heading east. The [highway is not] knowingly slippery. Highway evacuation is suspected. Police report emergency situations in downtown ending near Tuesday.', [1], 'Newt is upset because he thinks he is President'],
            ['Can you fell natural', -1, 'null']
        ];
    }
}