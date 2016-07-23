<?php

namespace XLab\Dependencies\API\Proper;

use XLab\Dependencies\API\AvatarGeneratorInterface;
use XLab\Dependencies\API\User;

class AvatarGenerator implements AvatarGeneratorInterface
{
    /**
     * @var AvatarRetrieverInterface
     */
    private $retriever;

    /**
     * @var AvatarStorageInterface
     */
    private $storage;

    /**
     * @param AvatarRetrieverInterface $retriever
     * @param AvatarStorageInterface $storage
     */
    public function __construct(AvatarRetrieverInterface $retriever, AvatarStorageInterface $storage)
    {
        $this->retriever = $retriever;
        $this->storage = $storage;
    }

    /**
     * {@inheritdoc}
     */
    public function generate(User $user)
    {
        $avatar = $this->retriever->getAvatar($user);
        $filepath = $this->storage->store($avatar);
        $user->setAvatarPath($filepath);

        return $filepath;
    }
}
