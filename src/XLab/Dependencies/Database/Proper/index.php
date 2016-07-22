<?php

require_once __DIR__.'/../../../../../vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use XLab\Dependencies\Database\Proper\DatabaseDoctrineDBALAdapter;
use XLab\Dependencies\Database\Proper\UserRepository;

$connection = DriverManager::getConnection(['driver' => 'pdo_sqlite', 'path' => __DIR__ . '/../db.sqlite']);
$database = new DatabaseDoctrineDBALAdapter($connection);
$repository = new UserRepository($database);
$user = $repository->findUser(1);

var_dump($user);

$user->setAvatarPath(__DIR__ .'/../../API/avatars/1.png');
$repository->saveUser($user);

var_dump($repository->findUser(1));

$user->setAvatarPath();
$repository->saveUser($user);

var_dump($repository->findUser(1));