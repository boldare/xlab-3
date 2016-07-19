<?php

namespace XLab\Dependencies\Database;

use XLab\Dependencies\API\User;

interface UserRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return User
     */
    public function find($id);

    /**
     * @param User $user
     */
    public function save(User $user);
}
