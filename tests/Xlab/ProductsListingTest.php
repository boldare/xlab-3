<?php

namespace Xlab;

class ProductsListingTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var ProductsListing
	 */
	protected $productsListing;

	public function setUp()
	{
		$this->productsListing = new ProductsListing();
	}

	public function testShowProducts()
	{
		$product1 = new Product(1999, 'Warcraft 3');
		$product2 = new Product(5999, 'World of Warcraft');

		$products = array($product1, $product2);

		$html = $this->productsListing->showProducts($products);

		$this->assertSame(
			'<html><body><div class="promoted">Warcraft 3 (19.99)</div><div>World of Warcraft (59.99)</div></body></html>',
			str_replace(["\n", "\t"], '', $html),
			'Products are listed correctly'
		);
	}
}
