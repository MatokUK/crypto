<?php

namespace Matok\Crypto\Encoding;

class BarCode implements DecodeEncodeInterface
{
    private $convertionTable = [
                0 => '3-2-1-1',
                1 => '2-2-2-1',
                2 => '2-1-2-2',
                3 => '1-4-1-1',
                4 => '1-1-3-2',
                5 => '1-2-3-1',
                6 => '1-1-1-4',
                7 => '1-3-1-2',
                8 => '1-2-1-3',
                9 => '3-1-1-2',
    ];

    public function decode($string)
    {

    }

    public function encode($number)
    {
        $encoded = [];
        $length = strlen($number);

        for ($i = 0; $i < $length; $i++) {
            $encoded[] = $this->convertionTable[$number[$i]];
        }

        return $encoded;
    }
}