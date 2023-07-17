<?php

declare(strict_types=1);

namespace App\Model\Advert;

/**
 * Class TypeListItem.
 */
class TypeListItem
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    /**
     * TypeListItem constructor.
     */
    public function __construct(string $id, string $name, string $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
    }

    /**
     * Get id.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get slug.
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
