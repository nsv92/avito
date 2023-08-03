<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Entity\Advert as AdvertEntity;
use App\Entity\Advert\Category as CategoryEntity;
use App\Entity\Advert\Type as TypeEntity;
use App\Model\AdvertListItem;
use App\Model\AdvertListResponse;
use App\Repository\Advert as AdvertRepository;
use App\Repository\Advert\Category as CategoryRepository;
use App\Repository\Advert\Type as TypeRepository;
use App\Service\Advert;
use App\Service\Advert as AdvertService;
use App\Service\Exception\NotFoundException;
use App\Tests\AbstractTestCase;

/**
 * Class AdvertServiceTest.
 */
class AdvertServiceTest extends AbstractTestCase
{
    private const NOT_FOUND = '123456';
    private const TYPE_ID = '1';
    private const CATEGORY_ID = '1';
    private const ADVERT_ID = '1';

    /**
     * @throws \ReflectionException
     */
    public function testGetAdvertByCategoryAndType(): void
    {
        $categoryEntity = $this->createCategory();
        $typeEntity = $this->createType();
        $advertEntity = $this->createAdvert($categoryEntity, $typeEntity);

        $categoryRepository = $this->createMock(CategoryRepository::class);
        $categoryRepository->expects($this->once())
            ->method('find')
            ->with(self::CATEGORY_ID)
            ->willReturn($categoryEntity);

        $typeRepository = $this->createMock(TypeRepository::class);
        $typeRepository->expects($this->once())
            ->method('find')
            ->with(self::TYPE_ID)
            ->willReturn($typeEntity);

        $advertRepository = $this->createMock(AdvertRepository::class);
        $advertRepository->expects($this->any())
            ->method('getAdvertByCategoryAndType')
            ->with($categoryEntity, $typeEntity)
            ->willReturn([$advertEntity]);

        $expected = new AdvertListResponse(
            [
                new AdvertListItem(
                    $advertEntity->getId(),
                    $advertEntity->getName(),
                    $advertEntity->getType()->getName(),
                    $advertEntity->getCategory()->getName(),
                    $advertEntity->getPrice(),
                    $advertEntity->getDescription(),
                    $advertEntity->getSlug(),
                    $advertEntity->getCreatedAt()
                ),
            ]
        );

        $response = (new Advert($advertRepository, $typeRepository, $categoryRepository))
            ->getAdvertByCategoryAndType(self::CATEGORY_ID, self::TYPE_ID);

        $this->assertEquals($expected, $response);
    }

    /**
     * @return void
     */
    public function testCategoryOrTypeNotFound(): void
    {
        $advertRepository = $this->createMock(AdvertRepository::class);
        $typeRepository = $this->createMock(TypeRepository::class);
        $typeRepository->expects($this->any())
            ->method('find')
            ->with(self::NOT_FOUND)
            ->willReturn(null);
        $categoryRepository = $this->createMock(CategoryRepository::class);
        $typeRepository->expects($this->any())
            ->method('find')
            ->with(self::NOT_FOUND)
            ->willReturn(null);
        $this->expectException(NotFoundException::class);
        (new AdvertService($advertRepository, $typeRepository, $categoryRepository))
            ->getAdvertByCategoryAndType(self::NOT_FOUND, self::NOT_FOUND);
    }

    /**
     * Create advert entity.
     *
     * @param CategoryEntity $category
     * @param TypeEntity     $type
     *
     * @return AdvertEntity
     *
     * @throws \ReflectionException
     */
    private function createAdvert(CategoryEntity $category, TypeEntity $type): AdvertEntity
    {
        $advert = (new AdvertEntity())
            ->setName('name')
            ->setCategory($category)
            ->setType($type)
            ->setDescription('some_description')
            ->setPrice('1')
            ->setSlug('advert');
        $this->setEntityId($advert, self::ADVERT_ID);
        $this->setCreatedAt($advert, new \DateTime('today'));

        return $advert;
    }

    /**
     * Create advert category entity.
     *
     * @return CategoryEntity
     *
     * @throws \ReflectionException
     */
    private function createCategory(): CategoryEntity
    {
        $category = (new CategoryEntity())
            ->setName('category')
            ->setDescription('some_category')
            ->setSlug('category');
        $this->setEntityId($category, self::CATEGORY_ID);

        return $category;
    }

    /**
     * Create advert type entity.
     *
     * @return TypeEntity
     *
     * @throws \ReflectionException
     */
    private function createType(): TypeEntity
    {
        $type = (new TypeEntity())
            ->setName('type')
            ->setSlug('type');
        $this->setEntityId($type, self::TYPE_ID);

        return $type;
    }
}
