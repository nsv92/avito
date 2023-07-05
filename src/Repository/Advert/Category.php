<?php

declare(strict_types=1);

namespace App\Repository\Advert;

use App\Entity\Advert\Category as CategoryEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class Category.
 */
class Category extends ServiceEntityRepository
{
    /**
     * CategoryRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryEntity::class);
    }
}
