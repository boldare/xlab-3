<?php

namespace XLab\Mocks\AbstractClass;

use XLab\Dependencies\API\Proper\Avatar;
use XLab\Dependencies\API\User;

abstract class AbstractChainedUserAvatarChangeHandler
{
    /**
     * @var UserAvatarChangeHandlerInterface|null
     */
    private $successor;

    /**
     * @param Avatar $avatar
     * @param User $user
     */
    final public function handle(Avatar $avatar, User $user)
    {
        $this->doHandle($avatar, $user);

        if ($this->successor instanceof UserAvatarChangeHandlerInterface) {
            $this->successor->handle($avatar, $user);
        }
    }

    /**
     * @param UserAvatarChangeHandlerInterface $successor
     */
    final public function append(UserAvatarChangeHandlerInterface $successor)
    {
        $this->successor = $successor;
    }

    /**
     * @param Avatar $avatar
     * @param User $user
     */
    abstract protected function doHandle(Avatar $avatar, User $user);
}
