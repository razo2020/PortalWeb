<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 18/10/2018
 * Time: 05:29 PM
 */

namespace App\CollectionSy\Entity;


class Value
{
    protected $value;

    public function __construct($value = '')
    {
        $this->value = $value;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }


}