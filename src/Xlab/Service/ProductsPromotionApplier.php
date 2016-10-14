<?php

namespace Xlab\Service;

class ProductsPromotionApplier implements ProductsPromotionApplierInterface
{
	public function apply(array $products)
	{
		foreach ($products as $product) {
			if ($product->getPrice() < 5000) {
				$product->promote();
			}
		}

		return $products;
	}
}
