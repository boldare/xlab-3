<?php

namespace Xlab\Service;

class ProductsPromotionApplier
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
