<?php

namespace XLab\Dependencies\API\Proper\Tests;

use Prophecy\Prophecy\ObjectProphecy;
use Symfony\Component\Filesystem\Filesystem;
use XLab\Dependencies\API\Proper\Avatar;
use XLab\Dependencies\API\Proper\AvatarFileStorage;

class AvatarFileStorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AvatarFileStorage
     */
    private $storage;

    /**
     * @var ObjectProphecy|Filesystem
     */
    private $filesystem;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->filesystem = $this->prophesize(Filesystem::class);
        $this->storage = new AvatarFileStorage($this->filesystem->reveal(), 'avatar_directory');
    }

    public function testStoreNoDirectory()
    {
        $avatar = new Avatar('avatar_name', 'avatar content');

        $this->filesystem->exists('avatar_directory')->willReturn(false);
        $this->filesystem->mkdir('avatar_directory')->shouldBeCalled();
        $this->filesystem->touch('avatar_directory/avatar_name.png')->shouldBeCalled();
        $this->filesystem->dumpFile('avatar_directory/avatar_name.png', 'avatar content')->shouldBeCalled();

        $this->assertEquals('avatar_directory/avatar_name.png', $this->storage->store($avatar));
    }
}
