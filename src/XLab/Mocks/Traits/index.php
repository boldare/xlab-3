<?php

require_once __DIR__ . '/../../../../vendor/autoload.php';

use XLab\Mocks\Traits\BlogPost;
use XLab\Mocks\Traits\Product;
use XLab\Mocks\Traits\SearchEngine;

$firstBlogPost = new BlogPost('first', 'lorem ipsum', 'me!');
$firstBlogPost->setTags(['sweet', 'check it out']);
$secondBlogPost = new BlogPost('another post', 'dolor sit amet', 'me again!');
$secondBlogPost->setTags(['booring']);

$firstProduct = new Product('lawn mower', 'gardening', 3999);
$firstProduct->setTags(['first', 'lawn', 'garden', 'trim']);
$secondProduct = new Product('tube', 'equipmment', 999);
$secondProduct->setTags(['water', 'watering']);

$searchEngine = new SearchEngine([
    $firstBlogPost,
    $secondBlogPost,
    $firstProduct,
    $secondProduct,
]);

foreach ($searchEngine->search('first') as $result) {
    var_dump($result);
}