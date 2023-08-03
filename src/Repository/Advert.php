<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Advert as AdvertEntity;
use App\Entity\Advert\Category as AdvertCategoryEntity;
use App\Entity\Advert\Type as AdvertTypeEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class Advert.
 */
class Advert extends ServiceEntityRepository
{
    /**
     * Advert constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdvertEntity::class);
    }

    /**
     * Get adverts by category and type.
     *
     * @param AdvertCategoryEntity $category
     * @param AdvertTypeEntity     $type
     *
     * @return AdvertEntity[]
     */
    public function getAdvertByCategoryAndType(AdvertCategoryEntity $category, AdvertTypeEntity $type): array
    {
        return $this->findBy(['category' => $category, 'type' => $type], ['id' => Criteria::ASC]);
    }
}
