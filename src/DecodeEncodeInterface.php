<?php

namespace Matok\Crypto;

interface DecodeEncodeInterface
{
    public function encode($string);

    public function decode($string);
}