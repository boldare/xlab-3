<?php

namespace XLab\Dependencies\Database\Proper;

use XLab\Dependencies\API\User;
use XLab\Dependencies\Database\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $database;

    /**
     * @param DatabaseInterface $database
     */
    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    /**
     * {@inheritdoc}
     */
    public function findUser($id)
    {
        // @TODO
    }

    /**
     * {@inheritdoc}
     */
    public function saveUser(User $user)
    {
        // @TODO
    }
}
