<?php

namespace Xlab\Service;

class ProductsTransformer implements ProductsTransformerInterface
{
	public function transformToHtml(array $products)
	{
		$html = "<ol>";
		foreach ($products as $product)
		{
			$html .= sprintf(
				"<li%s>%s (%s)</li>\n",
				$product->isPromoted() ? ' class="promoted"' : '',
				$product->getName(),
				$product->getPrice() / 100
			);
		}
		$html .= "</ol>";

		return $html;
	}
}
