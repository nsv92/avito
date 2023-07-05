<?php

declare(strict_types=1);

namespace App\Repository\Advert;

use App\Entity\Advert\Type as TypeEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class Type.
 */
class Type extends ServiceEntityRepository
{
    /**
     * Type constructor.
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, TypeEntity::class);
    }
}
