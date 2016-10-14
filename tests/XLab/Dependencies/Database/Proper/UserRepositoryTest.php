<?php

namespace XLab\Dependencies\Database\Proper\Tests;

use XLab\Dependencies\Database\Proper\DatabaseInterface;
use XLab\Dependencies\Database\Proper\UserRepository;

class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var DatabaseInterface
     */
    private $database;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        // @todo create mock of the database and store it under $this->database variable
        // @todo instantiate UserRepository, inject the mock and store it under $this->repository variable
    }

    public function testFindUser()
    {
        $this->markTestIncomplete('TODO');
    }

    public function testSaveUser()
    {
        $this->markTestIncomplete('TODO');
    }
}
