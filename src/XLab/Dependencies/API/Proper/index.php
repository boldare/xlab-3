<?php

require_once implode(DIRECTORY_SEPARATOR, [
    __DIR__,
    '..',
    '..',
    '..',
    '..',
    '..',
    'vendor',
    'autoload.php',
]);

use GuzzleHttp\Client;
use Symfony\Component\Filesystem\Filesystem;
use XLab\Dependencies\API\Proper\AdorableAvatarsApiRetriever;
use XLab\Dependencies\API\Proper\AvatarFileStorage;
use XLab\Dependencies\API\Proper\AvatarGenerator;
use XLab\Dependencies\API\User;

$user = new User(1, 'user@example.com');
$avatarDirectory = sprintf('%s%savatars', __DIR__, DIRECTORY_SEPARATOR);

$adorableAvatarApiClient = new Client();
$retriever = new AdorableAvatarsApiRetriever($adorableAvatarApiClient, 'https://api.adorable.io/avatars/285');
$directory = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'avatars';
$storage = new AvatarFileStorage(new Filesystem(), $directory);

$avatarGenerator = new AvatarGenerator($retriever, $storage);
$avatarPath = $avatarGenerator->generate($user);

var_dump($user);