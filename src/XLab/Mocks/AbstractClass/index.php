<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use GuzzleHttp\Client;
use Symfony\Component\Filesystem\Filesystem;
use XLab\Dependencies\API\Proper\AdorableAvatarsApiRetriever;
use XLab\Dependencies\API\Proper\AvatarFileStorage;
use XLab\Dependencies\Database\Proper\DatabaseDoctrineDBALAdapter;
use XLab\Dependencies\Database\Proper\UserRepository;
use XLab\Mocks\AbstractClass\StoreAvatarHandler;
use XLab\Mocks\AbstractClass\UpdateDatabaseHandler;

$retriever = new AdorableAvatarsApiRetriever(new Client(), 'https://api.adorable.io/avatars/285');
$connection = DriverManager::getConnection(['driver' => 'pdo_sqlite', 'path' => __DIR__ . '/db.sqlite']);
$database = new DatabaseDoctrineDBALAdapter($connection);
$repository = new UserRepository($database);
$storage = new AvatarFileStorage(new Filesystem(), __DIR__ . '/avatars');

$dbHandler = new UpdateDatabaseHandler($repository);
$storeHandler = new StoreAvatarHandler($storage);
$storeHandler->append($dbHandler);

$user = $repository->find(1);
$avatar = $retriever->getAvatar($user);

$storeHandler->handle($avatar, $user);

var_dump($user);
