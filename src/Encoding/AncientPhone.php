<?php

namespace Matok\Crypto\Encoding;

/*
 *
 *
 * 7777
 *
 * 7|777
 * 7| 77|7
 *
 * 777|7
 *
 *
 * 99999
 *  9999 | 9
 *  999 | 99
 *  99 | 99 | 9
 *
 *  9 | 9999
 *
 *  999 | 999
 *
 *  99 | 99 | 9
 */
use Matok\Crypto\AncientPhone\NumberSequence;

class AncientPhone implements DecodeEncodeInterface
{
    const UNDEFINED = 0;

    private $numberToChar = [
        2 => 'abc',
        3 => 'def',
        4 => 'ghi',
        5 => 'jkl',
        6 => 'mno',
        7 => 'pqrs',
        8 => 'tuv',
        9 => 'wxyz',
    ];

    //private $chatToNumber = [];

    private $solutions;

    public function __construct()
    {
    }

    /**
     * @param $number
     *
     * @return string
     */
    public function encode($number)
    {
        $result = '';
        $length = strlen($number);

        for ($i = 0; $i < $length; $i++) {
            $result .= $this->encodeChar($number[$i]);
        }

        return $result;
    }

    /**
     * @param $char
     *
     * @return int|string
     */
    private function encodeChar($char)
    {
        foreach ($this->numberToChar as $number => $charGroup) {
            $pos = strpos($charGroup, $char);
            if (false !== $pos) {
                return str_repeat($number, $pos + 1);
            }
        }

        return self::UNDEFINED;
    }

    /**
     * @param $string
     */
    public function decode($string)
    {
        $sameGroups = $this->splitByRepeatingNumber($string);

        foreach ($sameGroups as $key => $group) {
            $sameGroups[$key] = $this->generateCombination($group);
        }

        var_dump($sameGroups);
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    private function splitByRepeatingNumber($string)
    {
        preg_match_all('/([0-9])(\1+)?/', $string, $matches);

        return $matches[0];
    }

    private function generateCombination($numbers)
    {
        $maxLength = $this->getMaxRepeatingNumbers($numbers[0]);
        $realLength = strlen($numbers);
        $combination = [];

        for ($i = min($maxLength, $realLength); $i > 0; $i--) {
            $combination[] = new NumberSequence($numbers, $i);
        }

        return $combination;
    }

    private function gc($numbers, $maxLength)
    {
        $c = [];
        $length = strlen($numbers);

        if ($maxLength == 0) {
            return [];
        }

        if ($maxLength <= $length) {
            $c = array_merge_recursive($c, str_split($numbers, $maxLength));

           /* if ($maxLength == 2) {
                var_dump($numbers);
                var_dump($c);
                var_dump(str_split($numbers, $length));
                echo 'kkk';
                exit;
            }*/
        } else {
            $c += [$numbers];
            var_dump($c);
        }
        foreach ($c as $ww) {
            var_dump($c);

            $c += array_merge_recursive($c, $this->gc($ww, strlen($ww) - 1));
        }


        return [$c];
    }

    private function getMaxRepeatingNumbers($number)
    {
        return strlen($this->numberToChar[$number]);
    }
}

//$ap = new AncientPhone();

//var_dump($ap);

//$d = $ap->decode('944455532233277778');

//$d = $ap->decode('444');


//var_dump($d);