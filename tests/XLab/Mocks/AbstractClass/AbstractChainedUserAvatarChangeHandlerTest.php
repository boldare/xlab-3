<?php

namespace XLab\Mocks\AbstractClass\Tests;

use XLab\Mocks\AbstractClass\AbstractChainedUserAvatarChangeHandler;

class AbstractChainedUserAvatarChangeHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractChainedUserAvatarChangeHandler
     */
    private $handler;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->handler = $this->getMockForAbstractClass(AbstractChainedUserAvatarChangeHandler::class);
    }

    public function testHandleNoSuccessor()
    {
        $this->markTestIncomplete('This test is not completed yet!');
    }

    public function testHandleWithSuccessor()
    {
        $this->markTestIncomplete('This test is not completed yet!');
    }
}
