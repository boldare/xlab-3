<?php

use XLab\Dependencies\API\User;

namespace XLab\Dependencies\API;

interface AvatarGeneratorInterface
{
    /**
     * @param User $user
     *
     * @return string file path of newly generated avatar
     */
    public function generate(User $user);
}
