<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PostCurrencySalaryEnum extends Enum
{
    public const VND = "1";
    public const USD = "2";
    public const EUR = "3";
    public const GBP = "4";
    public const JPY = "5";
    public const AUD = "6";
    public function getlocationByValues($id) 
    {
        $location = [
            self::VND => "VND",
            self::USD => "USD",
            self::EUR => "EUR",
            self::GBP => "GBP",
            self::JPY => "JPY",
            self::AUD => "AUD",
        ];
    }
}
