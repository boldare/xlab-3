<?php

namespace XLab\Dependencies\API;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string|null
     */
    private $avatarPath = null;

    /**
     * @param int $id
     * @param string $email
     * @param string|null $avatarPath
     */
    public function __construct($id, $email, $avatarPath = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->avatarPath = $avatarPath;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getAvatarPath()
    {
        return $this->avatarPath;
    }

    /**
     * @param string|null $avatarPath
     */
    public function setAvatarPath($avatarPath = null)
    {
        $this->avatarPath = $avatarPath;
    }
}
