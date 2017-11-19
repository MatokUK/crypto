<?php

use PHPUnit\Framework\TestCase;
use Matok\Crypto\Analysis\LetterFrequency;

class LetterFrequencyTest extends TestCase
{
    /**
     * @group analyse
     */
    public function testFrequency()
    {
        $letterFrequency = new LetterFrequency();
        $analysis = $letterFrequency->analyse($this->readText());

        var_dump($analysis);
    }

    private function readText()
    {
        $text = file_get_contents(__DIR__.'/google-10000-english-usa.txt');

        return preg_replace('/\s+/', '', $text);
    }
}