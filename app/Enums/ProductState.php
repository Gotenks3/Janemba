<?php 

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static New()
 * @method static static VeryGood()
 * @method static static Good()
 * @method static static Normal()
 * @method static static Bad()
 * @method static static Very()
 * 
 */
final class ProductState extends Enum
{
    const NEW = 1;
    const VeryGood = 2;
    const Good = 3;
    const Normal = 4;
    const Bad = 5;
    const VeryBad = 6;

    /**
     * Get the description for an enum value
     *
     * @param $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value){
            case self::NEW:
                return '新品';
                brake;
            case self::VeryGood:
                return 'とても綺麗';
                brake;
            case self::Good:
                return '綺麗';
                brake;
            case self::Normal:
                return '普通';
                brake;
            case self::Bad:
                return '少し汚れている';
                brake;
            case self::VeryBad:
                return '汚れている';
                brake;
            default:
                return self::getKey($value);
        }
    }
}
