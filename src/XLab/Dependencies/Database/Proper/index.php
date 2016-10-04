<?php

require_once __DIR__.'/../../../../../vendor/autoload.php';

use XLab\Dependencies\Database\Proper\SQLiteDatabase;
use XLab\Dependencies\Database\Proper\UserRepository;

$databasePath = __DIR__ . '/../db.sqlite';
$database = new SQLiteDatabase($databasePath);

$repository = new UserRepository($database);

$user = $repository->findUser(1);
var_dump($user);

$user->setAvatarPath(__DIR__ .'/../../API/avatars/1.png');
$repository->saveUser($user);
var_dump($repository->findUser(1));

$user->setAvatarPath();
$repository->saveUser($user);
var_dump($repository->findUser(1));