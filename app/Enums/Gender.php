<?php

namespace App\Enums;

enum Gender: string
{
    case None = "None";
    case Male = "Male";
    case Female = "Female";
    case Other = "Other";

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
