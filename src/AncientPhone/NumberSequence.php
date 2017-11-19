<?php

namespace Matok\Crypto\AncientPhone;


class NumberSequence
{
    private $numbers;
    private $length;
    private $chunks;

    public function __construct($numbers, $length)
    {
        $this->numbers = $numbers;
        $this->length = $length;

        $this->chunks = str_split($numbers, $length);
    }
}