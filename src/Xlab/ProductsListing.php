<?php

namespace Xlab;

use Xlab\Service\ProductsPromotionApplier;
use Xlab\Service\ProductsSorter;
use Xlab\Service\ProductsTransformer;

// ProductsManager2 =>
class ProductsListing
{
	/**
	 * @var ProductsSorter
	 */
	protected $productsSorter;

	/**
	 * @var Service\ProductsPromotionApplier
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
		$products = $this->sortProducts($products);
		$products = $this->applyPromotion($products);

		return $this->transformToHtml($products);
	}

	protected function sortProducts(array $products)
	{
		return $this->productsSorter->sort($products);
	}

	protected function applyPromotion(array $products)
	{
		return $this->productsPromotionApplier->apply($products);
	}

	protected function transformToHtml(array $products)
	{
		return $this->productsTransformer->transformToHtml($products);
	}
}
