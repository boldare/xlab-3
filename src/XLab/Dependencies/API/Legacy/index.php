<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';

$user = new XLab\Dependencies\API\User(1, 'user@example.com');
$avatarGenerator = new XLab\Dependencies\API\Legacy\AvatarGenerator(__DIR__ . '/../avatars');

$avatarPath = $avatarGenerator->generate($user);
$user->setAvatarPath($avatarPath);

var_dump($user);