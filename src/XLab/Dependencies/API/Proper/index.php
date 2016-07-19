<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\Filesystem\Filesystem;
use XLab\Dependencies\API\Proper\AdorableAvatarsApiRetriever;
use XLab\Dependencies\API\Proper\AvatarFileStorage;
use XLab\Dependencies\API\Proper\AvatarGenerator;
use XLab\Dependencies\API\User;

$user = new User(1, 'user@example.com');

$adorableAvatarApiClient = new Client();
$retriever = new AdorableAvatarsApiRetriever($adorableAvatarApiClient, 'https://api.adorable.io/avatars/285');
$storage = new AvatarFileStorage(new Filesystem(), __DIR__ . '/../avatars');

$avatarGenerator = new AvatarGenerator($retriever, $storage);
$avatarPath = $avatarGenerator->generate($user);

var_dump($user);