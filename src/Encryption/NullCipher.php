<?php

namespace Matok\Crypto\Encryption;

/**
 * https://en.wikipedia.org/wiki/Null_cipher
 */
class NullCipher implements DecodeInterface
{
    /** @var \InfiniteIterator */
    private $key;

    public function __construct($key)
    {
        if (is_scalar($key)) {
            $key = [$key];
        }

        $this->key = new \InfiniteIterator($key);
    }

    public function decrypt($message)
    {
        $words = $this->splitToWords($message);

        $decrypted = '';
        foreach ($words as $word) {
            $decrypted .= $this->decryptWord($word);
        }

        return $decrypted;
    }

    private function splitToWords($message)
    {
       return preg_split('@\s+@', $message);
    }

    private function decryptWord($word)
    {
        $position = $this->key->current();
        $this->key->next();

        return substr($word, $position, 1);
    }
}