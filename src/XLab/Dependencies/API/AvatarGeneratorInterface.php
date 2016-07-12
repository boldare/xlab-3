<?php

namespace XLab\Dependencies\API;

interface AvatarGeneratorInterface
{
    /**
     * @param \XLab\Dependencies\API\User $user
     *
     * @return string file path of newly generated avatar
     */
    public function generate(User $user);
}
