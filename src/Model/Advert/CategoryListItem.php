<?php

declare(strict_types=1);

namespace App\Model\Advert;

/**
 * Class CategoryListItem.
 */
class CategoryListItem
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var string */
    private $slug;

    /**
     * CategoryListItem constructor.
     */
    public function __construct(string $id, string $name, string $description, string $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
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
     * Get description.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get slug.
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
