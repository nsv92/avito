<?php

declare(strict_types=1);

namespace App\Model\Advert;

/**
 * Class TypeListResponse.
 */
class TypeListResponse
{
    /** @var TypeListItem[] */
    private $items;

    /**
     * CategoryListResponse constructor.
     *
     * @param TypeListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return TypeListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
