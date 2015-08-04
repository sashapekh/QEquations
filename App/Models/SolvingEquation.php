<?php

namespace App\Models;

class SolvingEquation
{
    /**
     * Solution equation
     *
     * @return float
     */
    public function evaluate($a, $b, $c)
    {
        $discrim = pow($b, 2) - 4 * $c * $a;

        if ($discrim > 0 || $discrim == 0) {
            $result = $this->calculateRoots($discrim, $a, $b, $c);
        } else {
            $result = false;
        }

        return $result;
    }

    /**
     * @param $discriminant
     * @return float
     */
    private function calculateRoots($discriminant, $a, $b, $c)
    {
        $roots = new CalculateRoots($discriminant, $a, $b, $c);
        $result = $roots->findRoots();

        return $result;
    }

}