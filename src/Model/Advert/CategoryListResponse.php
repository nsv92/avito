<?php

declare(strict_types=1);

namespace App\Model\Advert;

/**
 * Class CategoryListResponse.
 */
class CategoryListResponse
{
    /** @var CategoryListItem[] */
    private $items;

    /**
     * CategoryListResponse constructor.
     *
     * @param CategoryListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Get items.
     *
     * @return CategoryListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
