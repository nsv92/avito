<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Advert as AdvertEntity;
use App\Entity\Advert\Category as AdvertCategoryEntity;
use App\Entity\Advert\Type as AdvertTypeEntity;
use App\Model\AdvertListItem;
use App\Model\AdvertListResponse;
use App\Repository\Advert as AdvertRepository;
use App\Repository\Advert\Category as AdvertCategoryRepository;
use App\Repository\Advert\Type as AdvertTypeRepository;
use App\Service\Exception\NotFoundException;

/**
 * Class Advert.
 */
class Advert
{
    /** @var AdvertRepository */
    private $advertRepository;
    /** @var AdvertTypeRepository */
    private $typeRepository;
    /** @var AdvertCategoryRepository */
    private $categoryRepository;

    /**
     * Advert constructor.
     *
     * @param AdvertRepository         $advertRepository
     * @param AdvertTypeRepository     $typeRepository
     * @param AdvertCategoryRepository $categoryRepository
     */
    public function __construct(
        AdvertRepository $advertRepository,
        AdvertTypeRepository $typeRepository,
        AdvertCategoryRepository $categoryRepository
    ) {
        $this->advertRepository = $advertRepository;
        $this->typeRepository = $typeRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get adverts by category and type.
     *
     * @param string $categoryId
     * @param string $typeId
     *
     * @return AdvertListResponse
     */
    public function getAdvertByCategoryAndType(string $categoryId, string $typeId): AdvertListResponse
    {
        $category = $this->categoryRepository->find($categoryId);
        $type = $this->typeRepository->find($typeId);

        $exceptionParams = [];
        if (!$category instanceof AdvertCategoryEntity) {
            $exceptionParams['category'] = $categoryId;
        }
        if (!$type instanceof AdvertTypeEntity) {
            $exceptionParams['type'] = $typeId;
        }
        if (0 != count($exceptionParams)) {
            throw NotFoundException::advertCategoryOrTypeNotFound(json_encode($exceptionParams));
        }

        return new AdvertListResponse(array_map(
            [$this, 'map'],
            $this->advertRepository->getAdvertByCategoryAndType($category, $type)
        ));
    }

    /**
     * @param AdvertEntity $advertEntity
     *
     * @return AdvertListItem
     */
    private function map(AdvertEntity $advertEntity): AdvertListItem
    {
        return new AdvertListItem(
            $advertEntity->getId(),
            $advertEntity->getName(),
            $advertEntity->getType()->getName(),
            $advertEntity->getCategory()->getName(),
            $advertEntity->getPrice(),
            $advertEntity->getDescription(),
            $advertEntity->getSlug(),
            $advertEntity->getCreatedAt()
        );
    }
}
