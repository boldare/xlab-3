<?php

namespace Xlab\Service;

class ProductsPromotionApplier implements ProductsPromotionApplierInterface
{
    /**
     * applies promotion flag to products that price is below 50 zl
     *
     * @param \Xlab\Product[] $products
     *
     * @return \Xlab\Product[]
     */
    public function apply(array $products)
    {
        // @todo
    }
}
