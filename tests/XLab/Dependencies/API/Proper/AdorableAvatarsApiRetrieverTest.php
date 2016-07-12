<?php

namespace XLab\Dependencies\API\Proper\Tests;

use GuzzleHttp\ClientInterface;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use XLab\Dependencies\API\Proper\AdorableAvatarsApiRetriever;
use XLab\Dependencies\API\Proper\Avatar;
use XLab\Dependencies\API\User;

class AdorableAvatarsApiRetrieverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AdorableAvatarsApiRetriever
     */
    private $retriever;

    /**
     * @var ObjectProphecy|ClientInterface
     */
    private $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = $this->prophesize(ClientInterface::class);
        $this->retriever = new AdorableAvatarsApiRetriever($this->client->reveal(), 'avatar_uri');
    }

    public function testGetAvatar()
    {
        $user = new User(123, 'user@example.com');
        $apiResponse = $this->prophesize(ResponseInterface::class);
        $apiResponse->getBody()->willReturn('avatar content');
        $this->client->request('GET', 'avatar_uri/user@example.com.png')->willReturn($apiResponse->reveal());

        $result = $this->retriever->getAvatar($user);

        $this->assertInstanceOf(Avatar::class, $result);
        $this->assertSame(123, $result->getName());
        $this->assertEquals('avatar content', $result->getContent());
    }
}
