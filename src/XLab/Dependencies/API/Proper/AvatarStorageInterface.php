<?php

namespace XLab\Dependencies\API\Proper;

interface AvatarStorageInterface
{
    /**
     * @param Avatar $avatar
     *
     * @return string path to the avatar
     */
    public function store(Avatar $avatar);
}
