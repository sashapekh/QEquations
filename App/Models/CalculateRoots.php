<?php

namespace App\Models;


class CalculateRoots
{
    /**
     * @var float
     */
    private $discriminant;

    /**
     * @var float Coefficient of equation
     */
    private $a;

    /**
     * @var float Coefficient of equation
     */
    private $b;

    /**
     * @var float Coefficient of equation
     */
    private $c;

    /**
     * @param $discrim
     * @param $coefA
     * @param $coefB
     * @param $coefC
     *  initialization of variables
     */

    public function __construct($discrim, $coefA, $coefB, $coefC)
    {
        $this->discriminant = $discrim;
        $this->a = $coefA;
        $this->b = $coefB;
        $this->c = $coefC;
    }

    /**
     * @return float
     */

    public function findRoots()
    {
        if ($this->discriminant > 0) {
            $roots[0] = (round((-$this->b + sqrt($this->discriminant)) / (2 * $this->a), 2));
            $roots[1] = (round((-$this->b - sqrt($this->discriminant)) / (2 * $this->a), 2));
        } else {
            $roots = round((-$this->b) / (2 * $this->a));
        }

        return $roots;
    }
}