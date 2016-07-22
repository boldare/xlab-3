<?php

namespace Xlab\Service;

class ProductsTransformer
{
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
}
