<?php

namespace XLab\Mocks\Libs\Tests;

use XLab\Dependencies\API\Proper\Avatar;
use XLab\Dependencies\API\Proper\AvatarGenerator;
use XLab\Dependencies\API\Proper\AvatarRetrieverInterface;
use XLab\Dependencies\API\Proper\AvatarStorageInterface;
use XLab\Dependencies\API\User;

class AvatarGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @link https://phpunit.de/manual/current/en/test-doubles.html
     */
    public function testGeneratePHPUnitMockObject()
    {
        $retriever = $this->createMock(AvatarRetrieverInterface::class);
        $storage = $this->createMock(AvatarStorageInterface::class);
        $generator = new AvatarGenerator($retriever, $storage);

        $user = new User(123, 'user@example.com');
        $avatar = new Avatar('avatar name', 'avatar content');

        $retriever->expects($this->once())
            ->method('getAvatar')
            ->with($user)
            ->willReturn($avatar);
        $storage->expects($this->once())
            ->method('store')
            ->with($avatar)
            ->willReturn('filepath');

        $this->assertEquals('filepath', $generator->generate($user));
        $this->assertEquals('filepath', $user->getAvatarPath());
    }

    /**
     * @link https://github.com/phpspec/prophecy#how-to-use-it
     */
    public function testGenerateProphecy()
    {
        $retriever = $this->prophesize(AvatarRetrieverInterface::class);
        $storage = $this->prophesize(AvatarStorageInterface::class);
        $generator = new AvatarGenerator($retriever->reveal(), $storage->reveal());

        $user = new User(123, 'user@example.com');
        $avatar = new Avatar('avatar name', 'avatar content');

        $retriever->getAvatar($user)->willReturn($avatar);
        $storage->store($avatar)->willReturn('filepath');

        $this->assertEquals('filepath', $generator->generate($user));
        $this->assertEquals('filepath', $user->getAvatarPath());
    }

    /**
     * @link http://docs.mockery.io/en/latest/reference/startup_methods.html
     */
    public function testGenerateMockery()
    {
        $user = new User(123, 'user@example.com');
        $avatar = new Avatar('avatar name', 'avatar content');

        $retriever = \Mockery::mock(AvatarRetrieverInterface::class)
            ->shouldReceive('getAvatar')
            ->with($user)
            ->andReturn($avatar)
            ->mock();
        $storage = \Mockery::mock(AvatarStorageInterface::class)
            ->shouldReceive('store')
            ->with($avatar)
            ->andReturn('filepath')
            ->mock();
        $generator = new AvatarGenerator($retriever, $storage);

        $this->assertEquals('filepath', $generator->generate($user));
        $this->assertEquals('filepath', $user->getAvatarPath());

        \Mockery::close();
    }

    /**
     * @link http://phake.readthedocs.io/en/latest/mocks.html
     */
    public function testGeneratePhake()
    {
        $retriever = \Phake::mock(AvatarRetrieverInterface::class);
        $storage = \Phake::mock(AvatarStorageInterface::class);
        $generator = new AvatarGenerator($retriever, $storage);

        $user = new User(123, 'user@example.com');
        $avatar = new Avatar('avatar name', 'avatar content');

        \Phake::when($retriever)->getAvatar($user)->thenReturn($avatar);
        \Phake::when($storage)->store($avatar)->thenReturn('filepath');

        $this->assertEquals('filepath', $generator->generate($user));
        $this->assertEquals('filepath', $user->getAvatarPath());
    }
}