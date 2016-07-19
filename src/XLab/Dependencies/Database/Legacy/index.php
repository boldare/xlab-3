<?php

require_once __DIR__.'/../../../../../vendor/autoload.php';

use XLab\Dependencies\Database\Legacy\UserRepository;

$repository = new UserRepository(__DIR__ . '/../db.sqlite');
$user = $repository->find(1);

var_dump($user);

$user->setAvatarPath(__DIR__ .'/../../API/avatars/1.png');
$repository->save($user);

var_dump($repository->find(1));

$user->setAvatarPath();
$repository->save($user);

var_dump($repository->find(1));