<?php

namespace XLab\Mocks\AbstractClass;

use XLab\Dependencies\API\Proper\Avatar;
use XLab\Dependencies\API\User;
use XLab\Dependencies\Database\UserRepositoryInterface;

class UpdateDatabaseHandler extends AbstractChainedUserAvatarChangeHandler implements UserAvatarChangeHandlerInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function doHandle(Avatar $avatar, User $user)
    {
        $this->userRepository->saveUser($user);
    }
}
