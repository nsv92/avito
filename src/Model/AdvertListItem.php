<?php

declare(strict_types=1);

namespace App\Model;

/**
 * Class AdvertListItem.
 */
class AdvertListItem
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $type;
    /** @var string */
    private $category;
    /** @var string|null */
    private $price;

    /** @var string|null */
    private $description;

    /** @var string */
    private $slug;

    /** @var \DateTime */
    private $createdAt;

    /**
     * AdvertListItem constructor.
     */
    public function __construct(string $id, string $name, string $type, string $category, ?string $price, ?string $description, string $slug, \DateTime $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->category = $category;
        $this->price = $price;
        $this->description = $description;
        $this->slug = $slug;
        $this->createdAt = $createdAt;
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
     * Get type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get category.
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * Get price.
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * Get description.
     */
    public function getDescription(): ?string
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

    /**
     * Get createdAt.
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}
