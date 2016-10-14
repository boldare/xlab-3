<?php

namespace Xlab;

use Xlab\Service\ProductsPromotionApplier;
use Xlab\Service\ProductsSorter;
use Xlab\Service\ProductsTransformer;

class ProductsListingTestWithoutMocksTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var ProductsListing
	 */
	protected $productsListing;

	/**
	 * @var ProductsSorter
	 */
	protected $productsSorter;

	/**
	 * @var ProductsPromotionApplier
	 */
	protected $productsPromotionApplier;

	/**
	 * @var ProductsTransformer
	 */
	protected $productsTransformer;

	public function setUp()
	{
		$this->productsSorter = new ProductsSorter();
		$this->productsPromotionApplier = new ProductsPromotionApplier();
		$this->productsTransformer = new ProductsTransformer();

		$this->productsListing = new ProductsListing(
			$this->productsSorter,
			$this->productsPromotionApplier,
			$this->productsTransformer
		);
	}

	public function testShowProducts()
	{
		$product1 = new Product(1999, 'Warcraft 3');
		$product2 = new Product(5999, 'World of Warcraft');

		$products = array($product1, $product2);

		$html = $this->productsListing->showProducts($products);

		$this->assertSame(
			'<ol><li class="promoted">Warcraft 3 (19.99)</li><li>World of Warcraft (59.99)</li></ol>',
			str_replace(["\n", "\t"], '', $html),
			'Products are listed correctly'
		);
	}
}
