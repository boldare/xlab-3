<?php

namespace Xlab;

use Xlab\Service\ProductsPromotionApplierInterface;
use Xlab\Service\ProductsSorterInterface;
use Xlab\Service\ProductsTransformerInterface;

class ProductsListing
{
    /**
     * @var ProductsSorterInterface
     */
    protected $productsSorter;

    /**
     * @var ProductsPromotionApplierInterface
     */
    protected $productsPromotionApplier;

    /**
     * @var ProductsTransformerInterface
     */
    protected $productsTransformer;

    /**
     * @param ProductsSorterInterface $productsSorter
     * @param ProductsPromotionApplierInterface $productsPromotionApplier
     * @param ProductsTransformerInterface $productsTransformer
     */
    public function __construct(
        ProductsSorterInterface $productsSorter,
        ProductsPromotionApplierInterface $productsPromotionApplier,
        ProductsTransformerInterface $productsTransformer
    ) {
        $this->productsSorter = $productsSorter;
        $this->productsPromotionApplier = $productsPromotionApplier;
        $this->productsTransformer = $productsTransformer;
    }

    /**
     * @param Product[] $products
     *
     * @return string
     */
    public function showProducts(array $products)
    {
        // @todo
        // use productsSorter, productsPromotionApplier and productsTransformer
        // and return html representation for the products
    }
}
