<?php

namespace XLab\Dependencies\API\Legacy\Tests;

class AvatarGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \XLab\Dependencies\API\Legacy\AvatarGenerator
     */
    private $generator;

    private $directory;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->directory = __DIR__.DIRECTORY_SEPARATOR.'avatars';
        $this->generator = new \XLab\Dependencies\API\Legacy\AvatarGenerator($this->directory);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        $dir = new \DirectoryIterator($this->directory);

        foreach ($dir as $file) {
            if ($file->isFile()) {
                unlink($file->getRealPath());
            }
        }
    }

    public function testGenerate()
    {
        $user = new \XLab\Dependencies\API\User(123, 'user@example.com');
        $result = $this->generator->generate($user);

        $this->assertFileExists($result);
    }
}
