<?php

namespace Matok\Crypto\Encoding;

class Ascii implements DecodeEncodeInterface
{
    public function encode($number)
    {
        $encoded = '';
        $length = strlen($number);

        for ($i = 0; $i < $length; $i++) {
            $encoded .= ord($number[$i]);
        }

        return $encoded;
    }

    public function decode($string)
    {
        $ords = $this->splitToArray($string);
        $decoded = '';

        foreach ($ords as $ord) {
            $decoded .= chr($ord);
        }

        return $decoded;
    }

    private function splitToArray($asciiOrd)
    {
        $asciiNumbers = [];

        $idx = 0;
        while (isset($asciiOrd[$idx])) {
            if ('1' === $asciiOrd[$idx]) {
                $asciiNumbers[] = substr($asciiOrd, $idx, 3);
                $idx += 3;
            } else {
                $asciiNumbers[] = substr($asciiOrd, $idx, 2);
                $idx += 2;
            }
        }

        return $asciiNumbers;
    }
}