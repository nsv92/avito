<?php

declare(strict_types=1);

namespace App\Model;

/**
 * Class AdvertResponse.
 */
class AdvertListResponse
{
    /** @var AdvertListItem[] */
    protected $items;

    /**
     * AdvertResponse constructor.
     *
     * @param AdvertListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Get items.
     *
     * @return AdvertListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
