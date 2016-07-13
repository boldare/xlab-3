<?php

namespace XLab\Dependencies\API\Proper;

use XLab\Dependencies\API\User;

interface AvatarRetrieverInterface
{
    /**
     * @param User $user
     *
     * @return Avatar
     */
    public function getAvatar(User $user);
}
