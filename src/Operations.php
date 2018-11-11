<?php

namespace ketili;


class Operations
{
    static function array_multiplication($ar1, $ar2)
    {
        if (count($ar1) != count($ar2))
            throw new \Exception("size of arrays are not equal");
        $count = count($ar1);
        $product = array();
        for ($i = 0; $i < $count; $i++) {
            $multiplication = (float)($ar1[$i] * $ar2[$i]);
            array_push($product, $multiplication);
        }
        return $product;
    }
    static function array_pow($ar1, $ar2)
    {
        if (count($ar1) != count($ar2))
            throw new \Exception("size of arrays are not equal");
        $count = count($ar1);
        $product = array();
        for ($i = 0; $i < $count; $i++) {
            $multiplication = pow($ar1[$i], $ar2[$i]);
            array_push($product, $multiplication);
        }
        return $product;
    }
}