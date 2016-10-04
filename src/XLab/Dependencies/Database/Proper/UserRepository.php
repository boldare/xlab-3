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
        $data = $this->database->find('users', $id);

        return new User($data['id'], $data['email'], $data['avatar_path']);
    }

    /**
     * {@inheritdoc}
     */
    public function saveUser(User $user)
    {
        $this->database->update(
            'users',
            $user->getId(),
            [
                'email' => $user->getEmail(),
                'avatar_path' => $user->getAvatarPath(),
            ]
        );
    }
}
