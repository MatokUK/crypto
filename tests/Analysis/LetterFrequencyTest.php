<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Base64;

class LetterFrequencyTest extends TestCase
{
    /**
     * @group decode
     */
    public function testDecode()
    {
        $decoder = new Base64();
        $this->assertEquals('Matok', $decoder->decode('TWF0b2s='));
    }


    private function readText()
    {
        $text = file_get_contents(__DIR__.'/google-10000-english-usa.txt');

        return $text;
    }
}