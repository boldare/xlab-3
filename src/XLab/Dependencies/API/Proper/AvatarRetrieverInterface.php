<?php

namespace XLab\Dependencies\API\Proper;

interface AvatarRetrieverInterface
{
    /**
     * @param \XLab\Dependencies\API\User $user
     *
     * @return Avatar
     */
    public function getAvatar(\XLab\Dependencies\API\User $user);
}
