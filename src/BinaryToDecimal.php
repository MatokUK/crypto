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
        $chunks = str_split($string, 1);
        var_dump($chunks);

        $encoded = '';
        foreach ($chunks as $chunk) {
            $encoded .= $this->decimalToBinary($chunk);
        }

        return $encoded;
    }

    public function decode($string)
    {
        $chunks = str_split($string, $this->splitSize);
        var_dump($chunks);

        $encoded = '';
        foreach ($chunks as $chunk) {
            $encoded .= $this->binaryToDecimal($chunk);
        }

        return $encoded;
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