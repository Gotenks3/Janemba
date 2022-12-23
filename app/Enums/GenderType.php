<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class GenderType extends Enum
{
    const MAN = 0;
    const WOMAN = 1;
    const OTHER = 2;

    /**
     * Get the description for an enum value
     *
     * @param $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value){
            case self::MAN:
                return '男性';
                brake;
            case self::WOMAN:
                return '女性';
            case self::OTHER:
                return 'その他(非公開)';
                brake;
            default:
                return self::getKey($value);
        }
    }
}
