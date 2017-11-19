<?php

namespace Matok\Crypto\Encryption;

class Rot5 extends AbstractRot
{
    protected $charset = ['0123456789'];
    protected $rotation = 5;
}