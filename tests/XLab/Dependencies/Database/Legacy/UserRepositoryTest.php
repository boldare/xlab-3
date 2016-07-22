<?php

namespace XLab\Dependencies\Database\Tests;

use XLab\Dependencies\API\User;
use XLab\Dependencies\Database\Legacy\UserRepository;

class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->repository = new UserRepository(__DIR__ . '/test.sqlite');
    }

    public function testFind()
    {
        $result = $this->repository->findUser(1);
        $this->assertInstanceOf(User::class, $result);
        $this->assertSame(1, $result->getId());
        $this->assertEquals('user@example.com', $result->getEmail());
        $this->assertNull($result->getAvatarPath());

        return $result;
    }

    /**
     *
     * @param User $user
     *
     * @depends testFind
     */
    public function testSave(User $user)
    {
        $user->setAvatarPath('new_avatar_path');
        $this->repository->saveUser($user);

        $result = $this->repository->findUser($user->getId());

        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals('new_avatar_path', $result->getAvatarPath());
    }
}
