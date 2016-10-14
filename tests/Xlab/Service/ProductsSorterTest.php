<?php

namespace Xlab\Service;

use Xlab\Product;

class ProductsSorterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ProductsSorter
     */
    protected $productsSorter;

    public function setUp()
    {
        $this->productsSorter = new ProductsSorter();
    }

    public function testSortProducts()
    {
        $product1 = new Product(5999, 'Warcraft 3');
        $product2 = new Product(5999, 'World of Warcraft');
        $product3 = new Product(5999, 'Diablo 3');

        $products = array($product1, $product2, $product3);

        $sortedProducts = $this->productsSorter->sort($products);

        $sortedProductNames = [];
        foreach ($sortedProducts as $product) {
            $sortedProductNames[] = $product->getName();
        }

        $this->assertSame(
            ['Diablo 3', 'Warcraft 3', 'World of Warcraft'],
            $sortedProductNames,
            'Sorting takes prices and names into consideration'
        );
    }

    /**
     * @dataProvider productsOrderProvider
     */
    public function testSortProductsWithProvider(array $products, array $expectedNamesOrder, $message)
    {
        $sortedProducts = $this->productsSorter->sort($products);

        /* 1 */
        foreach($sortedProducts as $k => $sortedProduct) {
            $this->assertSame(
                $expectedNamesOrder[$k],
                $sortedProduct->getName(),
                $message
            );
        }

        /* 2
        $sortedProductNames = [];
        foreach ($sortedProducts as $product) {
            $sortedProductNames[] = $product->getName();
        }

        $this->assertSame(
            $expectedNamesOrder,
            $sortedProductNames,
            $message
        );
         */
    }

    public function productsOrderProvider()
    {
        return [
            [
                [new Product(5999, 'Warcraft 3'), new Product(5999, 'World of Warcraft'), new Product(5999, 'Diablo 3')],
                ['Diablo 3', 'Warcraft 3', 'World of Warcraft'],
                'Products are sorted by name if price is the same'
            ],
            [
                [new Product(3, 'Product3'), new Product(2, 'Product2'), new Product(1, 'Product1')],
                ['Product1', 'Product2', 'Product3'],
                'Products are sorted by price descending'
            ],
            [
                [],
                [],
                'Empty list of products returns empty list'
            ],
            [
                [new Product(5999, 'Warcraft 3'), new Product(5999, 'Warcraft 3')],
                ['Warcraft 3', 'Warcraft 3'],
                'Sorting works for products considered "the same"'
            ],
        ];
    }
}
