<?php

namespace Xlab;

class ProductsManagerTest extends \PHPUnit_Framework_TestCase
{
	protected $productsManager;

	public function setUp()
	{
		$this->productsManager = new ProductsManager();
	}

	public function testShowProducts()
	{
		$product1 = new Product(1999, 'Warcraft 3');
		$product2 = new Product(5999, 'World of Warcraft');

		$products = array($product1, $product2);

		$html = $this->productsManager->showProducts($products);

		$this->assertSame(
			'<ol><li class="promoted">Warcraft 3 (19.99)</li><li>World of Warcraft (59.99)</li></ol>',
			str_replace(["\n", "\t"], '', $html),
			'Products are listed correctly'
		);
	}
}
