<?php

namespace App;

class StringValidator
{
    private string $str;

    public function __construct(string $str)
    {
        $this->str = $str;
    }

    public function validateBrackets()
    {
        $level = 0;
        foreach (mb_str_split($this->str) as $char) {
            if ($char === '{') {
                $level++;
            } elseif ($char === '}') {
                $level--;
            }

            if ($level < 0) {
                return false;
            }
        }

        return $level === 0;
    }
}
