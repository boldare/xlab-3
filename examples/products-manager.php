<?php

require __DIR__ . '/../vendor/autoload.php';

$product1 = new \Xlab\Product(1999, 'Warcraft 3');
$product2 = new \Xlab\Product(5999, 'World of Warcraft');

$products = array($product1, $product2);

$productsManager = new \Xlab\ProductsManager();

echo $productsManager->showProducts($products);
