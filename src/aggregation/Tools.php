<?php


namespace ketili\aggregation;


class Tools
{
    static function get_aggregation_function_by_key($key)
    {
        $aggregation_functions = array("arithmetic_mean", "geometric_mean",
            "harmonic_mean", "weighted_arithmetic_mean", "weighted_geometric_mean",
            "weighted_harmonic_mean");
        if (in_array($key, $aggregation_functions)) {

            switch ($key) {
                case Constants::ArithmeticMean: {
                    return new ArithmeticMean();
                }
                    break;
                case Constants::GeometricMean: {
                    return new GeometricMean();
                }
                    break;
                case Constants::HarmonicMean: {
                    return new HarmonicMean();
                }
                    break;
                case Constants::WeightedArithmeticMean: {
                    return new WeightedArithmeticMean();
                }
                    break;
                case Constants::WeightedGeometricMean: {
                    return new WeightedGeometricMean();
                }
                    break;
                case Constants::WeightedHarmonicMean: {
                    return new WeightedHarmonicMean();
                }
                    break;
                default: {
                    return new ArithmeticMean();
                }
            }
        } else throw new \Exception("unknown key for aggregation function");
    }
}