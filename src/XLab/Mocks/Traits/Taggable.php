<?php

namespace XLab\Mocks\Traits;

trait Taggable
{
    /**
     * @var string[]
     */
    private $tags = [];

    /**
     * @return string[]
     */
    public function getTags()
    {
        return array_merge([$this->getMainTag()], $this->tags);
    }

    /**
     * @param string[] $tags
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    abstract public function getMainTag();
}
