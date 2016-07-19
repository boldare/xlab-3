<?php

namespace XLab\Dependencies\API\Legacy;

use XLab\Dependencies\API\AvatarGeneratorInterface;
use XLab\Dependencies\API\User;

class AvatarGenerator implements AvatarGeneratorInterface
{
    const URL = 'https://api.adorable.io/avatars/285';

    /**
     * @var string
     */
    private $directoryPath;

    /**
     * @param string $directoryPath
     */
    public function __construct(string $directoryPath)
    {
        $this->directoryPath = $directoryPath;
    }

    /**
     * @param User $user
     *
     * @return string
     */
    public function generate(User $user)
    {
        $avatar = $this->get($user);
        $path = $this->generateAvatarPath($user);
        $this->store($avatar, $path);

        return $path;
    }

    /**
     * @param User $user
     *
     * @return string
     */
    private function get(User $user)
    {
        $uri = sprintf('%s/%s.png', self::URL, $user->getEmail());

        return file_get_contents($uri);
    }

    /**
     * @param string $data
     * @param string $path
     */
    private function store(string $data, string $path)
    {
        file_put_contents($path, $data);
    }

    /**
     * @param User $user
     *
     * @return string
     */
    private function generateAvatarPath(User $user)
    {
        return sprintf('%s/%s.png', $this->directoryPath, $user->getId());
    }
}
