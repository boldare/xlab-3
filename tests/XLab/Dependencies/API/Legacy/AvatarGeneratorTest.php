<?php

namespace XLab\Dependencies\API\Legacy\Tests;

use XLab\Dependencies\API\Legacy\AvatarGenerator;
use XLab\Dependencies\API\User;

class AvatarGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AvatarGenerator
     */
    private $generator;

    /**
     * @var string
     */
    private $directory;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->directory = __DIR__ . '/avatars';
        $this->generator = new AvatarGenerator($this->directory);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        $dir = new \DirectoryIterator($this->directory);

        foreach ($dir as $file) {
            if ($file->isFile() && 'png' === $file->getExtension()) {
                unlink($file->getRealPath());
            }
        }
    }

    public function testGenerate()
    {
        $user = new User(123, 'user@example.com');
        $result = $this->generator->generate($user);

        $this->assertFileExists($result);
    }
}
