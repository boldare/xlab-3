<?php

namespace Xlab\Service;

interface ProductsSorterInterface
{
    /**
     * sorts products using some criteria and returns sorted list
     *
     * @param \Xlab\Product[] $products
     *
     * @return \Xlab\Product[]
     */
    public function sort(array $products);
}
