<?php

namespace XLab\Dependencies\API\Proper;

use GuzzleHttp\ClientInterface;
use XLab\Dependencies\API\User;

class AdorableAvatarsApiRetriever implements AvatarRetrieverInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $uri;

    /**
     * @param ClientInterface $client
     * @param string $uri
     */
    public function __construct(ClientInterface $client, $uri)
    {
        $this->client = $client;
        $this->uri = $uri;
    }

    /**
     * {@inheritdoc}
     */
    public function getAvatar(User $user)
    {
        $uri = $this->generateUri($user);
        $response = $this->client->request('GET', $uri);

        return new Avatar($user->getId(), $response->getBody());
    }

    /**
     * @param User $user
     *
     * @return string
     */
    private function generateUri(User $user)
    {
        return sprintf('%s/%s.png', $this->uri, $user->getEmail());
    }
}
