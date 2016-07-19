<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';

use XLab\Dependencies\API\Legacy\AvatarGenerator;
use XLab\Dependencies\API\User;

$user = new User(1, 'user@example.com');
$avatarGenerator = new AvatarGenerator(__DIR__ . '/../avatars');

$avatarPath = $avatarGenerator->generate($user);
$user->setAvatarPath($avatarPath);

var_dump($user);