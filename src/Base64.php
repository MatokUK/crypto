<?php

namespace Matok\Crypto;

class Base64 implements DecodeEncodeInterface
{
    public function encode($string)
    {
        return base64_encode($string);
    }

    public function decode($string)
    {
        return base64_decode($string);
    }
}