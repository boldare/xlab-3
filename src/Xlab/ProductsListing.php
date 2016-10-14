<?php

namespace Xlab;

use Xlab\Service\ProductsPromotionApplier;
use Xlab\Service\ProductsPromotionApplierInterface;
use Xlab\Service\ProductsSorter;
use Xlab\Service\ProductsSorterInterface;
use Xlab\Service\ProductsTransformer;
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
        $products = $this->productsSorter->sort($products);
        $products = $this->productsPromotionApplier->apply($products);

        return $this->productsTransformer->transformToHtml($products);
    }
}
