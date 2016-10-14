<?php

namespace Xlab;

class Product
{
    /**
     * @var int
     */
    protected $price;

    /**
     * @var bool
     */
    protected $promote = false;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param int $price
     * @param string $name
     * @param bool $promote
     */
    public function __construct($price, $name, $promote = false)
    {
        $this->name = $name;
        $this->promote = $promote;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return bool
     */
    public function isPromoted()
    {
        return $this->promote;
    }

	/**
	 * @return string
	 */
    public function getName()
    {
        return $this->name;
    }

    public function promote()
    {
        return $this->promote = true;
    }
}
