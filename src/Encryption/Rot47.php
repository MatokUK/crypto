<?php

namespace Matok\Crypto\Encryption;

class Rot47 extends AbstractRot
{
    protected $charset = ['!"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~'];
    protected $rotation = 47;
}