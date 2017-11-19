<?php

namespace Matok\Crypto\Encoding;

class Base64 implements DecodeEncodeInterface
{
    public function encode($number)
    {
        return base64_encode($number);
    }

    public function decode($string)
    {
        return base64_decode($string);
    }
}