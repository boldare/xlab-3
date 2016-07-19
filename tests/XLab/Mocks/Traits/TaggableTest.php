<?php

namespace XLab\Mocks\Traits\Tests;

use XLab\Mocks\Traits\Taggable;

class TaggableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Taggable
     */
    private $object;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->object = $this->getMockForTrait(Taggable::class);
    }

    public function testGetTags()
    {
        $this->markTestIncomplete('This test is not completed yet!');
    }
}
