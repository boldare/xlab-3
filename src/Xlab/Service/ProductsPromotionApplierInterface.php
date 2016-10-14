<?php

namespace Xlab\Service;

interface ProductsPromotionApplierInterface
{
    /**
     * applies promotion flag to products based on some criteria
     *
     * @param \Xlab\Product[] $products
     *
     * @return \Xlab\Product[]
     */
    public function apply(array $products);
}
