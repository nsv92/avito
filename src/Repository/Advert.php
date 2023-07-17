<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Advert as AdvertEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class Advert.
 */
class Advert extends ServiceEntityRepository
{
    /**
     * Advert constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdvertEntity::class);
    }
}
