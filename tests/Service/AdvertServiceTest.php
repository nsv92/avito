<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Repository\Advert as AdvertRepository;
use App\Repository\Advert\Category as CategoryRepository;
use App\Repository\Advert\Type as TypeRepository;
use App\Service\Advert as AdvertService;
use App\Service\Exception\NotFoundException;
use App\Tests\AbstractTestCase;

/**
 * Class AdvertServiceTest.
 */
class AdvertServiceTest extends AbstractTestCase
{
    private const NOT_FOUND = 123456;

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
        //            ->willThrowException(new NotFoundException());
        $categoryRepository = $this->createMock(CategoryRepository::class);
        $typeRepository->expects($this->any())
            ->method('find')
            ->with(self::NOT_FOUND)
            ->willReturn(null);
        //            ->willThrowException(new NotFoundException());

        $this->expectException(NotFoundException::class);
        (new AdvertService($advertRepository, $typeRepository, $categoryRepository))
            ->getAdvertByCategoryAndType(self::NOT_FOUND, self::NOT_FOUND);
    }
}
