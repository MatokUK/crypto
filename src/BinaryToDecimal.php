<?php

namespace Matok\Crypto;

class BinaryToDecimal implements DecodeEncodeInterface
{
    private $splitSize;

    public function __construct($splitSize)
    {
        $this->splitSize = $splitSize;
    }

    public function encode($string)
    {
        $chunks = str_split($string, $this->splitSize);

        $encoded = '';
        foreach ($chunks as $chunk) {
            $encoded .= $this->decimalToBinary($chunk);
        }

        return $chunks;
    }

    public function decode($string)
    {
        return base64_decode($string);
    }

    private function binaryToDecimal($binaryString)
    {
        return bindec($binaryString);
    }

    private function decimalToBinary($decimalString)
    {
        return decbin($decimalString);
    }
}