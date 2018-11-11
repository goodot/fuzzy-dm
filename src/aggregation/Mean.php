<?php


namespace ketili\aggregation;


class Mean{
    static function average($array)
    {
        $count = (float)count($array);
        $sum = (float)array_sum($array);

        return $sum / $count;
    }
    static function geo_average($array, $weights)
    {
        $powArg = 1/array_sum($weights);
        $product = array_product($array);
        return pow($product, $powArg);
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