<?php

require_once __DIR__ . '/../../../../vendor/autoload.php';

$firstBlogPost = new \XLab\Mocks\Traits\BlogPost('first', 'lorem ipsum', 'me!');
$firstBlogPost->setTags(['sweet', 'check it out']);
$secondBlogPost = new \XLab\Mocks\Traits\BlogPost('another post', 'dolor sit amet', 'me again!');
$secondBlogPost->setTags(['booring']);

$firstProduct = new \XLab\Mocks\Traits\Product('lawn mower', 'gardening', 3999);
$firstProduct->setTags(['first', 'lawn', 'garden', 'trim']);
$secondProduct = new \XLab\Mocks\Traits\Product('tube', 'equipmment', 999);
$secondProduct->setTags(['water', 'watering']);

$searchEngine = new \XLab\Mocks\Traits\SearchEngine([
    $firstBlogPost,
    $secondBlogPost,
    $firstProduct,
    $secondProduct,
]);

foreach ($searchEngine->search('first') as $result) {
    var_dump($result);
}