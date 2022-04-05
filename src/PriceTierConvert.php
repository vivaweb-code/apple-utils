<?php
declare(strict_types=1);

namespace Vivaweb\AppleUtils;

use \Exception;

class PriceTierConvert
{
    // TODO default => USD not BRL
    static public $tiers = [
        1 => 4.9,
        2 => 10.9,
        3 => 16.9,
        4 => 22.9,
        5 => 27.9,
        6 => 34.9,
        7 => 39.9,
        8 => 44.9,
        9 => 49.9,
        10 => 54.9,
        11 => 59.9,
        12 => 69.9,
        13 => 74.9,
        14 => 79.9,
        15 => 84.9,
        16 => 89.9,
        17 => 94.9,
        18 => 99.9,
        19 => 104.9,
        20 => 109.9,
        21 => 119.9,
        22 => 124.9,
        23 => 129.9,
        24 => 134.9,
        25 => 139.9,
        26 => 144.9,
        27 => 149.9,
        28 => 154.9,
        29 => 159.9,
        30 => 169.9,
        31 => 174.9,
        32 => 179.9,
        33 => 184.9,
        34 => 189.9,
        35 => 194.9,
        36 => 199.9,
        37 => 204.9,
        38 => 209.9,
        39 => 219.9,
        40 => 224.9,
        41 => 229.9,
        42 => 234.9,
        43 => 239.9,
        44 => 244.9,
        45 => 249.9,
        46 =>  259.9,
        47 => 264.9,
        48 => 269.9,
        49 => 274.9,
        50 => 279.9,
        51 => 299.9,
        52 => 329.9,
        53 => 349.9,
        54 => 399.9,
        55 => 429.9,
        56 => 449.9,
        57 => 479.9,
        58 => 499.9,
        59 => 529.9,
        60 => 549.9,
        61 => 599.9,
        62 => 649.9,
        63 => 699.9,
        64 => 749.9,
        65 => 799.9,
        66 => 849.9,
        67 => 899.9,
        68 => 949.9,
        69 => 979.9,
        70 => 999.9,
        71 => 1049.9,
        72 => 1099.9,
        73 => 1149.9,
        74 => 1199.9,
        75 => 1299.9,
        76 => 1399.9,
        77 => 1499.9,
        78 => 1699.9,
        79 => 1999.9,
        80 => 2299.9,
        81 => 2499.9,
        82 => 2999.9,
        83 => 3499.9,
        84 => 3999.9,
        85 => 4499.9,
        86 => 4999.9,
        87 => 5499.9,
    ];

    static public function lowerTierByPrice(float $price, $currency = null)
    {
        $tiers = self::$tiers;

        if ($currency) {
            $arrayFilename = __DIR__ . '/../data/tiers/' . $currency . '.php';
            $tiers = include $arrayFilename;
            if (! is_array($tiers)) {
                throw new Exception('Not found currency tiers on data folder');
            }
        }

        $oldTier = null;
        foreach (static::$tiers as $tier) {
            if ($tier >= $price) {
                return $oldTier;
            }
            $oldTier = $tier;
        }

        throw new Exception('Tier not found');
    }
}
