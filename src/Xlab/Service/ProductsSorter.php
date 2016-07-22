<?php

namespace Xlab\Service;

use Xlab\Product;

class ProductsSorter
{
	public function sort(array $products)
	{
		usort($products, function (Product $productA, Product $productB) {
			if ($productA->getPrice() == $productB->getPrice()) {
				$nameComparison = strnatcmp($productA->getName(), $productB->getName());
				if (0 !== $nameComparison) {
					return $nameComparison;
				}
			}

			return $productA->getPrice() > $productB->getPrice() ? 1 : -1;
		});

		return $products;
	}
}
