<?php

declare(strict_types=1);

namespace App\Entity\Advert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Type.
 */
class Type
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
     * @ORM\Column(name="name", type="string", length=25, nullable=false, options={"comment"="Наименование типа"})
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=50, nullable=false)
     */
    protected $slug;
}
