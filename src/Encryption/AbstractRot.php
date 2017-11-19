<?php

namespace Matok\Crypto\Encryption;

abstract class AbstractRot implements DecryptEncryptInterface
{
    protected $charset = ['ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'];
    protected $rotation = 0;

    private $encrypt = [];

    public function __construct($charset = null)
    {
        foreach ($this->charset as $charsetPart) {
            $chars = $this->splitToChars($charsetPart);
            $alphabetLength = count($chars);

            $idx = 0;
            foreach ($chars as $char) {
                $this->encrypt[$char] = $chars[($idx + $this->rotation) % $alphabetLength];
                $idx ++;
            }
        }
    }

    public function decrypt($message)
    {
        $chars = $this->splitToChars($message);

        $decrypted = '';
        foreach ($chars as $char) {
            $decrypted .= $this->decryptChar($char);
        }

        return $decrypted;
    }

    public function decryptChar($char)
    {
        if (isset($this->encrypt[$char])) {
            return $this->encrypt[$char];
        }

        return $char;
    }

    protected function splitToChars($string)
    {
        return str_split($string, 1);
    }

    public function encrypt($message)
    {
        return $this->decrypt($message);
    }
}