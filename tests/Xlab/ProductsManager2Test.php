<?php

namespace Xlab;

class ProductsManager2Test extends \PHPUnit_Framework_TestCase
{
	protected $productsManager;

	public function setUp()
	{
		$this->productsManager = new ProductsManager2();
	}

	public function testShowProducts()
	{
		$product1 = new Product(1999, 'Warcraft 3');
		$product2 = new Product(5999, 'World of Warcraft');

		$products = array($product1, $product2);

		$html = $this->productsManager->showProducts($products);

		$this->assertSame(
			'<html><body><div class="promoted">Warcraft 3 (19.99)</div><div>World of Warcraft (59.99)</div></body></html>',
			str_replace(["\n", "\t"], '', $html),
			'Products are listed correctly'
		);
	}

	public function testSortProducts()
	{
		$product1 = new Product(5999, 'Warcraft 3');
		$product2 = new Product(5999, 'World of Warcraft');
		$product3 = new Product(5999, 'Diablo 3');

		$products = array($product1, $product2, $product3);

		$sortedProducts = $this->productsManager->sortProducts($products);

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
		$sortedProducts = $this->productsManager->sortProducts($products);

		$sortedProductNames = [];
		foreach ($sortedProducts as $product) {
			$sortedProductNames[] = $product->getName();
		}

		$this->assertSame(
			$expectedNamesOrder,
			$sortedProductNames,
			$message
		);
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
		];
	}
}
