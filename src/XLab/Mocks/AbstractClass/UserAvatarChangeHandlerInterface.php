<?php

namespace XLab\Mocks\AbstractClass;

use XLab\Dependencies\API\Proper\Avatar;
use XLab\Dependencies\API\User;

interface UserAvatarChangeHandlerInterface
{
    /**
     * @param Avatar $avatar
     * @param User $user
     */
    public function handle(Avatar $avatar, User $user);
}
