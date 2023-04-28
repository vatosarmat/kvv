<?php

declare(strict_types=1);
use App\StringValidator;
use PHPUnit\Framework\TestCase;

final class StringValidatorTest extends TestCase
{
    public static function test_validateBrackets()
    {
        $validStrings = ['', 'adf', '{}', '{{lajkdhf{adfa}{}adfasdfadf{}}}', '{{}{}{}}', '{μυρτι}ὲς {δὲν} {θὰ βρῶ}'];
        foreach ($validStrings as $input) {
            self::assertTrue((new StringValidator($input))->validateBrackets());
        }

        $invalidStrings = ['}}}', '{{lajkdhf{adfa', 'adfasf{adf}af}adf', 'μυ{ρτ}ιὲς δ{ὲν θὰ βρῶ'];
        foreach ($invalidStrings as $input) {
            self::assertFalse(((new StringValidator($input))->validateBrackets())[0]);
        }
    }
}
