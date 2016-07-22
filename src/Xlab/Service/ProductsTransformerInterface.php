<?php

namespace Xlab\Service;

interface ProductsTransformerInterface
{
	/**
	 * transforms products list to an html representation
	 *
	 * @param \Xlab\Product[] $products
	 *
	 * @return \Xlab\Product[]
	 */
	public function transformToHtml(array $products);
}
