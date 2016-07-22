<?php

namespace Xlab\Service;

use Xlab\Product;

class ProductsPromotionApplierTest extends \PHPUnit_Framework_TestCase
{
	protected $productsPromotionApplier;

	public function setUp()
	{
		$this->productsPromotionApplier = new ProductsPromotionApplier();
	}

	public function testApply()
	{
		$product1 = new Product(1999, 'Warcraft 3');
		$product2 = new Product(5999, 'World of Warcraft');

		$products = array($product1, $product2);

		$productsWithPromotion = $this->productsPromotionApplier->apply($products);

		$this->assertTrue($productsWithPromotion[0]->isPromoted());
		$this->assertFalse($productsWithPromotion[1]->isPromoted());
	}
}
