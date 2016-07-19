<?php

namespace XLab\Dependencies\Database\Proper\Tests;

use Prophecy\Prophecy\ObjectProphecy;
use XLab\Dependencies\API\User;
use XLab\Dependencies\Database\Proper\DatabaseInterface;
use XLab\Dependencies\Database\Proper\UserRepository;

class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var ObjectProphecy|DatabaseInterface
     */
    private $database;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->database = $this->prophesize(DatabaseInterface::class);
        $this->repository = new UserRepository($this->database->reveal());
    }

    public function testFind()
    {
        $this->database->select('users', ['id' => 123])->willReturn([
            'id' => 123,
            'email' => 'user@example.com',
            'avatar_path' => 'avatar_path',
        ]);

        $result = $this->repository->find(123);

        $this->assertInstanceOf(User::class, $result);
        $this->assertSame(123, $result->getId());
        $this->assertEquals('user@example.com', $result->getEmail());
        $this->assertEquals('avatar_path', $result->getAvatarPath());
    }

    public function testSave()
    {
        $user = new User(123, 'new@example.com', 'new_avatar_path');

        $this->database->update(
            'users',
            ['id' => 123],
            [
                'email' => 'new@example.com',
                'avatar_path' => 'new_avatar_path'
            ]
        )->shouldBeCalled();

        $this->repository->save($user);
    }
}
