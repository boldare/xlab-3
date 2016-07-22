<?php

namespace Xlab;

use Xlab\Service\ProductsPromotionApplier;
use Xlab\Service\ProductsSorter;
use Xlab\Service\ProductsTransformer;

class ProductsListing
{
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

	public function __construct()
	{
		$this->productsSorter = new ProductsSorter();
		$this->productsPromotionApplier = new ProductsPromotionApplier();
		$this->productsTransformer = new ProductsTransformer();
	}

	/**
	 * @param Product[] $products
	 *
	 * @return string
	 */
	public function showProducts(array $products)
	{
		// @todo
	}
}
