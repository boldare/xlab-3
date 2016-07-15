<?php
declare(strict_types = 1);

namespace XLab\Mocks\Traits;

class Product implements TaggableInterface
{
    use Taggable;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $category;

    /**
     * @var int
     */
    private $price;

    /**
     * @param string $name
     * @param string $category
     * @param int $price
     */
    public function __construct(string $name, string $category, int $price)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * {@inheritdoc}
     */
    public function getMainTag()
    {
        return $this->name;
    }
}
