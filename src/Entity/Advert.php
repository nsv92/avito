<?php

declare(strict_types=1);

namespace App\Entity;

use App\Common\ORM\ModifiedAtInterface;
use App\Common\ORM\ModifiedAtTrait;
use App\Entity\Advert\Category as AdvertCategoryEntity;
use App\Entity\Advert\Type as AdvertTypeEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Advert.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Advert")
 *
 * @ORM\Table(name="advert",
 *      uniqueConstraints={@ORM\UniqueConstraint(columns={"name", "type_id", "category_id"})}
 * )
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Advert implements ModifiedAtInterface
{
    use ModifiedAtTrait;

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
     * @ORM\Column(name="name", type="string", length=75, nullable=false, options={"comment"="Наименование объявления"})
     */
    protected $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true, options={"comment"="Описание объявления"})
     */
    protected $description;

    /**
     * @var AdvertTypeEntity
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Advert\Type", cascade={"persist"}, fetch="LAZY")
     *
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $type;

    /**
     * @var AdvertCategoryEntity
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Advert\Category", cascade={"persist"}, fetch="LAZY")
     *
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $category;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=23, scale=2, nullable=true)
     */
    protected $price;

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
    public function setName(string $name): Advert
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
    public function setDescription(?string $description): Advert
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get type.
     */
    public function getType(): AdvertTypeEntity
    {
        return $this->type;
    }

    /**
     * Set type.
     */
    public function setType(AdvertTypeEntity $type): Advert
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get category.
     */
    public function getCategory(): AdvertCategoryEntity
    {
        return $this->category;
    }

    /**
     * Set category.
     */
    public function setCategory(AdvertCategoryEntity $category): Advert
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get price.
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * Set price.
     */
    public function setPrice(?string $price): Advert
    {
        $this->price = $price;

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
    public function setSlug(string $slug): Advert
    {
        $this->slug = $slug;

        return $this;
    }
}
