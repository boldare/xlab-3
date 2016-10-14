<?php

namespace XLab\Dependencies\API\Proper\Tests;

use Prophecy\Prophecy\ObjectProphecy;
use XLab\Dependencies\API\Proper\AvatarGenerator;
use XLab\Dependencies\API\Proper\AvatarRetrieverInterface;
use XLab\Dependencies\API\Proper\AvatarStorageInterface;

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
        // @todo create mocks and store them in $this->retriever/$this->storage properties
        // @todo instantiate the generator injecting the mocks into the constructor
    }

    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }
}
