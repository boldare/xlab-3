<?php

namespace XLab\Mocks\AbstractClass;

use XLab\Dependencies\API\Proper\Avatar;
use XLab\Dependencies\API\Proper\AvatarStorageInterface;
use XLab\Dependencies\API\User;

class StoreAvatarHandler extends AbstractChainedUserAvatarChangeHandler implements UserAvatarChangeHandlerInterface
{
    /**
     * @var AvatarStorageInterface
     */
    private $storage;

    /**
     * @param AvatarStorageInterface $storage
     */
    public function __construct(AvatarStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * {@inheritdoc}
     */
    protected function doHandle(Avatar $avatar, User $user)
    {
        $path = $this->storage->store($avatar);
        $user->setAvatarPath($path);
    }
}
