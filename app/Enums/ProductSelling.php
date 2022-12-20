<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Sell()
 * @method static static Stop()
 */
final class ProductSelling extends Enum
{
    const Sell = 1;
    const Stop = 2;

     /**
     * Get the description for an enum value
     *
     * @param $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value){
            case self::Sell:
                return '販売中';
                brake;
            case self::Stop:
                return '停止中';
                brake;
            default:
                return self::getKey($value);
        }
    }
}
