<?php

namespace Xlab;

class ProductsManager
{
    /**
     * @param Product[] $products
     *
     * @return string
     */
    public function showProducts(array $products)
    {
        usort($products, function (Product $productA, Product $productB) {
            return $productA->getPrice() > $productB->getPrice() ? 1 : -1;
        });

        foreach ($products as $product) {
            if ($product->getPrice() < 5000) {
                $product->promote();
            }
        }

        $html = "<ol>\n";
        foreach ($products as $product)
        {
            $html .= sprintf(
                "\t<li%s>%s (%s)</li>\n",
                $product->isPromoted() ? ' class="promoted"' : '',
                $product->getName(),
                $product->getPrice() / 100
            );
        }
        $html .= "</ol>\n";

        return $html;
    }
}
