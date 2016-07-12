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

$user = new XLab\Dependencies\API\User(1, 'user@example.com');
$avatarDirectory = sprintf('%s%s..%savatars', __DIR__, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);
$avatarGenerator = new XLab\Dependencies\API\Legacy\AvatarGenerator($avatarDirectory);

$avatarPath = $avatarGenerator->generate($user);
$user->setAvatarPath($avatarPath);

var_dump($user);