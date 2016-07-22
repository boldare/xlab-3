<?php

namespace Xlab;

class ProductsManager2
{
	public function sortProducts(array $products)
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

	public function applyPromotion(array $products)
	{
		foreach ($products as $product) {
			if ($product->getPrice() < 5000) {
				$product->promote();
			}
		}

		return $products;
	}

	public function transformToHtml(array $products)
	{
		$html = "<html>\n\t<body>\n";
		foreach ($products as $product)
		{
			$html .= sprintf(
				"\t\t<div%s>%s (%s)</div>\n",
				$product->isPromoted() ? ' class="promoted"' : '',
				$product->getName(),
				$product->getPrice() / 100
			);
		}
		$html .= "\t</body>\n</html>";

		return $html;
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
}
