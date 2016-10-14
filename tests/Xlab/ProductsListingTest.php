<?php

namespace Xlab;

use Xlab\Service\ProductsPromotionApplier;
use Xlab\Service\ProductsSorter;
use Xlab\Service\ProductsTransformer;

class ProductsListingTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var ProductsListing
	 */
	protected $productsListing;

	/**
	 * @var ProductsSorter|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $productsSorter;

	/**
	 * @var ProductsPromotionApplier|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $productsPromotionApplier;

	/**
	 * @var ProductsTransformer|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $productsTransformer;

	public function setUp()
	{
		$this->productsSorter = $this->createMock(ProductsSorter::class);
		$this->productsPromotionApplier = $this->createMock(ProductsPromotionApplier::class);
		$this->productsTransformer = $this->createMock(ProductsTransformer::class);

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

		$this->productsSorter
			->expects($this->once())
			->method('sort')
			->with($products)
			->willReturn($products);

		$this->productsPromotionApplier
			->expects($this->once())
			->method('apply')
			->with($products)
			->willReturn($products);

		$this->productsTransformer
			->expects($this->once())
			->method('transformToHtml')
			->with($products)
			->willReturn('someHtml');

		$html = $this->productsListing->showProducts($products);

		$this->assertSame(
			'someHtml',
			$html,
			'Products are listed correctly'
		);
	}
}
