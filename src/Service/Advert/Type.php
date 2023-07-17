<?php

declare(strict_types=1);

namespace App\Service\Advert;

use App\Entity\Advert\Type as TypeEntity;
use App\Model\Advert\TypeListItem;
use App\Model\Advert\TypeListResponse;
use App\Repository\Advert\Type as TypeRepository;
use Doctrine\Common\Collections\Criteria;

/**
 * Class Type.
 */
class Type
{
    /** @var TypeRepository */
    private $typeRepository;

    /**
     * Type constructor.
     */
    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function getAllTypes(): TypeListResponse
    {
        $types = $this->typeRepository->findBy([], ['id' => Criteria::ASC]);

        $typeToItem = function (TypeEntity $type): TypeListItem {
            return new TypeListItem(
                $type->getId(),
                $type->getName(),
                $type->getSlug()
            );
        };

        return new TypeListResponse(\array_map($typeToItem, $types));
    }
}
