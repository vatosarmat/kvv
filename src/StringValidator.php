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
        $input = $this->str;

        //strip-out all valid {} pairs
        $matches = [];
        $noBrackets = '[^{}]*';
        $anything = '.*';
        while (preg_match("/$noBrackets\{($anything)\}$noBrackets/", $input, $matches)) {
            $input = $matches[1];
        }

        //check if still has { or }
        return ! preg_match('/\{|\}/', $input);
    }
}
