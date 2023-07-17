<?php

declare(strict_types=1);

namespace App\Entity\Advert;

use App\Common\ORM\ModifiedAtInterface;
use App\Common\ORM\ModifiedAtTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Type.
 *
 * @ORM\Entity(repositoryClass="App\Repository\Advert\Type")
 *
 * @ORM\Table(name="advert_type",
 *      uniqueConstraints={@ORM\UniqueConstraint(columns={"name"})}
 * )
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Type implements ModifiedAtInterface
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
     * @ORM\Column(name="name", type="string", length=25, nullable=false, options={"comment"="Наименование типа"})
     */
    protected $name;

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
    public function setName(string $name): Type
    {
        $this->name = $name;

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
    public function setSlug(string $slug): Type
    {
        $this->slug = $slug;

        return $this;
    }
}
