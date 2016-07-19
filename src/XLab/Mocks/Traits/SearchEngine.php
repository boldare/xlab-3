<?php

namespace XLab\Mocks\Traits;

class SearchEngine
{
    /**
     * @var TaggableInterface[]
     */
    private $items;

    /**
     * @param TaggableInterface[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param string $query
     *
     * @return \Traversable
     */
    public function search(string $query)
    {
        foreach ($this->items as $item) {
            if (!in_array($query, $item->getTags())) {
                continue;
            }

            yield $item;
        }
    }
}
