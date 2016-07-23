<?php

namespace XLab\Dependencies\API\Proper;

use XLab\Dependencies\API\User;

class AdorableAvatarsApiRetriever implements AvatarRetrieverInterface
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @param string $apiUrl
     */
    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function getAvatar(User $user)
    {
        $uri = sprintf('%s/%s.png', $this->apiUrl, $user->getEmail());
        $avatarContent = file_get_contents($uri);

        return new Avatar($user->getId(), $avatarContent);
    }
}
