<?php

namespace Matok\Crypto;

class HexToAscii
{
    private $encodedText;

    public function __construct($encodedText)
    {
        $this->encodedText = preg_replace('/\s/', '', $encodedText);
    }

    public function decode($size = 2)
    {
        $hexValues = str_split($this->encodedText, $size);

        $decodedText = '';
        foreach ($hexValues as $hexValue) {
            $decodedText .= chr(hexdec($hexValue));
        }

        return $decodedText;
    }
}