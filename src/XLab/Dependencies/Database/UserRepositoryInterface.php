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
    public function findUser(int $id);

    /**
     * @param User $user
     */
    public function saveUser(User $user);
}
