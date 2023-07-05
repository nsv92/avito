<?php

declare(strict_types=1);

namespace App\Entity\Advert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Advert\Category")
 *
 * @ORM\Table(name="advert_category")
 */
class Category
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false, options={"comment"="Наименование категории"})
     */
    protected $name;

    /**
     * @var string|null
     *
     * @ORM\Column(
     *     name="description",
     *      type="string",
     *      length=150,
     *      nullable=true,
     *      options={"comment"="Описание категории"}
     *     )
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=50, nullable=false)
     */
    protected $slug;

    /**
     * Get id.
     */
    public function getId(): ?string
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
     * Set name.
     */
    public function setName(string $name): Category
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set description.
     */
    public function setDescription(?string $description): Category
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get slug.
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Set slug.
     */
    public function setSlug(string $slug): Category
    {
        $this->slug = $slug;

        return $this;
    }
}
