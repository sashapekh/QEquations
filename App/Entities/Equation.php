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
class Equation
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
     * @param float $a
     * @param float $b
     * @param float $c
     */
    public function __construct($a, $b, $c)
    {
        $this->coefA = $a;
        $this->coefB = $b;
        $this->coefC = $c;
    }

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
     * @return float
     */
    public function getCoefA()
    {
        return $this->coefA;
    }

    /**
     * @return float
     */
    public function getCoefB()
    {
        return $this->coefB;
    }

    /**
     * @return float
     */
    public function getCoefC()
    {
        return $this->coefC;
    }
}