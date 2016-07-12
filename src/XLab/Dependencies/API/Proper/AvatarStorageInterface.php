<?php

namespace XLab\Dependencies\API\Proper;

interface AvatarStorageInterface
{
    /**
     * @param \XLab\Dependencies\API\Proper\Avatar $avatar
     *
     * @return string path to the avatar
     */
    public function store(Avatar $avatar);
}
