<?php

namespace XLab\Dependencies\API\Proper;

class AvatarFileStorage implements AvatarStorageInterface
{
    /**
     * @var string
     */
    private $directoryPath;

    /**
     * @param type $directoryPath
     */
    public function __construct($directoryPath)
    {
        $this->directoryPath = $directoryPath;
    }

    /**
     * {@inheritdoc}
     */
    public function store(Avatar $avatar)
    {
        $path = $this->generateAvatarPath($avatar);
        file_put_contents($path, $avatar->getContent());

        return $path;
    }

    /**
     * @param Avatar $avatar
     *
     * @return string
     */
    private function generateAvatarPath(Avatar $avatar)
    {
        return sprintf('%s/%s.png', $this->directoryPath, $avatar->getName());
    }
}
