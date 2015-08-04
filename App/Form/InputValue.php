<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class InputValue extends AbstractType
{

    /**
     * Create Form for input data
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /**
         * add new HTML element for input some values
         */
        $builder->add('coefA', 'text',
            array(
                "data" => 1,
                "label" => "x2 +",
                "attr" => array("class" => "form-control"),
                "constraints" => array(
                    new Assert\NotBlank(),
                    new Assert\NotEqualTo(array("value" => 0)),
                    new Assert\Type(array("type" => "numeric"))
                )
            ));

        $builder->add('coefB', 'text',
            array(
                "data" => 2,
                "label" => "x +",
                "attr" => array("class" => "form-control"),
                "constraints" => array(
                    new Assert\NotBlank(),
                    new Assert\Type(array("type" => "numeric"))
                )
            ));

        $builder->add('coefC', 'text',
            array(
                "data" => 3,
                "label" => "= 0",
                "attr" => array("class" => "form-control"),
                "constraints" => array(
                    new Assert\NotBlank(),
                    new Assert\Type(array("type" => "numeric"))
                )
            ));
    }

    /**
     * Set id for HTML elements which created
     * @return string
     */

    public function getName()
    {
        return "InputValue";
    }


}