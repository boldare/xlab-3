<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';

use XLab\Dependencies\API\Proper\AdorableAvatarsApiRetriever;
use XLab\Dependencies\API\Proper\AvatarFileStorage;
use XLab\Dependencies\API\Proper\AvatarGenerator;
use XLab\Dependencies\API\User;

$user = new User(1, 'user@example.com');

$adorableAvatarsApiUrl = 'https://api.adorable.io/avatars/285';
$retriever = new AdorableAvatarsApiRetriever();

$avatarsDirectory = __DIR__ . '/../avatars';
$storage = new AvatarFileStorage();

$avatarGenerator = new AvatarGenerator($retriever, $storage);
$avatarPath = $avatarGenerator->generate($user);
var_dump($user);