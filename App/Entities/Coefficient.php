<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;


/**
 * @Entity
 * @Table(name="equations")
 */
class Coefficient
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="float")
     */
    protected $coefA;

    /**
     * @Column(type="float")
     */
    protected $coefB;

    /**
     * @Column(type="float")
     */
    protected $coefC;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Coefficient of quadratic equation
     * @param float $coefA
     * @param float $coefB
     * @param float $coefC
     * @return $this
     */
    public function setCoefficient($coefA, $coefB, $coefC)
    {
        $this->coefA = $coefA;
        $this->coefB = $coefB;
        $this->coefC = $coefC;

        return $this;
    }

    /**
     * @return array
     */
    public function getCoefficient()
    {
        $data = array($this->coefA, $this->coefB, $this->coefC);

        return $data;
    }
}

