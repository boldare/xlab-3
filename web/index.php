<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <h1>Products:</h1>
        <?php
            require __DIR__ . '/../vendor/autoload.php';

            $product1 = new \Xlab\Product(1999, 'Warcraft 3');
            $product2 = new \Xlab\Product(5999, 'World of Warcraft');
            $product3 = new \Xlab\Product(6999, 'Diablo 3');

            $products = array($product1, $product2, $product3);

            $productsManager = new \Xlab\ProductsManager();

            echo $productsManager->showProducts($products);
        ?>
    </body>
</html>
