<?php

namespace XLab\Dependencies\Database\Legacy;

use XLab\Dependencies\API\User;
use XLab\Dependencies\Database\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var string
     */
    private $databasePath;

    /**
     * @param string $databasePath
     */
    public function __construct(string $databasePath)
    {
        $this->databasePath = $databasePath;
    }

    /**
     * {@inheritdoc}
     */
    public function findUser(int $id)
    {
        $db = $this->openConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindValue('id', $id);

        $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

        return new User($result['id'], $result['email'], $result['avatar_path']);
    }

    /**
     * {@inheritdoc}
     */
    public function saveUser(User $user)
    {
        $db = $this->openConnection();
        $stmt = $db->prepare('UPDATE users SET email = :email, avatar_path = :avatar_path WHERE id = :id');
        $stmt->bindValue('email', $user->getEmail());
        $stmt->bindValue('avatar_path', $user->getAvatarPath());
        $stmt->bindValue('id', $user->getId());

        $stmt->execute();
    }

    /**
     * @return \SQLite3
     */
    private function openConnection()
    {
        return new \SQLite3($this->databasePath);
    }
}
