<?php

require_once __DIR__.'/../../../../../vendor/autoload.php';

$repository = new XLab\Dependencies\Database\Legacy\UserRepository(__DIR__ . '/../db.sqlite');
$user = $repository->find(1);

var_dump($user);

$user->setAvatarPath(__DIR__ .'/../../API/avatars/1.png');
$repository->save($user);

var_dump($repository->find(1));

$user->setAvatarPath();
$repository->save($user);

var_dump($repository->find(1));