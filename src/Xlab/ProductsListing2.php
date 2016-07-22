<?php

namespace Xlab;

use Xlab\Service\ProductsPromotionApplier;
use Xlab\Service\ProductsSorter;
use Xlab\Service\ProductsTransformer;

class ProductsListing2
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

	/**
	 * @param ProductsSorter $productsSorter
	 * @param ProductsPromotionApplier $productsPromotionApplier
	 * @param ProductsTransformer $productsTransformer
	 */
	public function __construct(
		ProductsSorter $productsSorter,
		ProductsPromotionApplier $productsPromotionApplier,
		ProductsTransformer $productsTransformer
	) {
		$this->productsSorter = $productsSorter;
		$this->productsPromotionApplier = $productsPromotionApplier;
		$this->productsTransformer = $productsTransformer;
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
