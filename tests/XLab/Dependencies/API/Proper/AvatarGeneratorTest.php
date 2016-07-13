<?php

namespace XLab\Dependencies\API\Proper\Tests;

use Prophecy\Prophecy\ObjectProphecy;
use XLab\Dependencies\API\Proper\Avatar;
use XLab\Dependencies\API\Proper\AvatarGenerator;
use XLab\Dependencies\API\Proper\AvatarRetrieverInterface;
use XLab\Dependencies\API\Proper\AvatarStorageInterface;
use XLab\Dependencies\API\User;

class AvatarGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AvatarGenerator
     */
    private $generator;

    /**
     * @var ObjectProphecy|AvatarRetrieverInterface
     */
    private $retriever;

    /**
     * @var ObjectProphecy|AvatarStorageInterface
     */
    private $storage;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->retriever = $this->prophesize(AvatarRetrieverInterface::class);
        $this->storage = $this->prophesize(AvatarStorageInterface::class);

        $this->generator = new AvatarGenerator($this->retriever->reveal(), $this->storage->reveal());
    }

    public function testGenerate()
    {
        $user = new User(123, 'user@example.com');
        $avatar = new Avatar('avatar name', 'avatar content');

        $this->retriever->getAvatar($user)->willReturn($avatar);
        $this->storage->store($avatar)->willReturn('filepath');

        $this->assertEquals('filepath', $this->generator->generate($user));
        $this->assertEquals('filepath', $user->getAvatarPath());
    }
}
