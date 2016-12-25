<?php


namespace ketili\models\aggregation;


class Mean{
    static function average($array)
    {
        $count = count($array);
        $sum = array_sum($array);

        return $sum / $count;
    }
    static function geo_average($array)
    {
        $count = count($array);
        $product = array_product($array);
        return $product / $count;
    }
    static function harmonic_average($array)
    {
        $n = count($array);
        $sum = 0;
        foreach ($array as $x) {
            $sum += 1 / ((float)$x);
        }
        $sum = pow($sum, -1);

        return $n * $sum;
    }


}