<?php

namespace XLab\Dependencies\API\Proper;

use Symfony\Component\Filesystem\Filesystem;

class AvatarFileStorage implements AvatarStorageInterface
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var string
     */
    private $directory;

    /**
     * @param Filesystem $filesystem
     * @param string $directory
     */
    public function __construct(Filesystem $filesystem, $directory)
    {
        $this->filesystem = $filesystem;
        $this->directory = $directory;
    }

    /**
     * {@inheritdoc}
     */
    public function store(Avatar $avatar)
    {
        $this->createAvatarDirectoryIfNotPresent();
        $avatarPath = $this->generateFilepath($avatar);
        $this->saveToFile($avatarPath, $avatar);

        return $avatarPath;
    }

    /**
     * @param string $avatarPath
     * @param Avatar $avatar
     */
    private function saveToFile($avatarPath, Avatar $avatar)
    {
        $this->filesystem->touch($avatarPath);
        $this->filesystem->dumpFile($avatarPath, $avatar->getContent());
    }

    /**
     * @param Avatar $avatar
     *
     * @return string
     */
    private function generateFilepath(Avatar $avatar)
    {
        return sprintf('%s%s%s.png', $this->directory, DIRECTORY_SEPARATOR, $avatar->getName());
    }

    private function createAvatarDirectoryIfNotPresent()
    {
        if ($this->filesystem->exists($this->directory)) {
            return;
        }

        $this->filesystem->mkdir($this->directory);
    }
}
