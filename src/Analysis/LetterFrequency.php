<?php

namespace Matok\Crypto\Analysis;

/**
 *
 */
class LetterFrequency
{
    private $chars = [];
    private $count = 0;

    public function analyse($text)
    {
        $this->countLetters($text);
        $this->computeFrequencies();

        return $this->chars;
    }

    private function countLetters($text)
    {
        $letters = str_split($text, 1);

        foreach ($letters as $letter) {
            $this->addLetter($letter);
        }
    }

    private function addLetter($char)
    {
        $this->count++;

        if (!isset($this->chars[$char])) {
            $this->chars[$char] = 0;
        }

        $this->chars[$char] ++;
    }

    private function computeFrequencies()
    {
        foreach ($this->chars as $letter => $total) {
            $this->chars[$letter] = $total / $this->count;
        }
    }
}