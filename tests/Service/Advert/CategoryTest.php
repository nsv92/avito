<?php

namespace App\Tests\Service\Advert;

use App\Entity\Advert\Category as AdvertCategoryEntity;
use App\Model\Advert\CategoryListItem;
use App\Model\Advert\CategoryListResponse;
use App\Repository\Advert\Category as CategoryRepository;
use App\Service\Advert\Category;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

/**
 * Class CategoryTest.
 */
class CategoryTest extends TestCase
{
    public const NAME = 'some_name';
    public const DESCRIPTION = 'some_description';
    public const SLUG = 'some_slug';

    /**
     * @return void
     */
    public function testGetCategories()
    {
        $categoryService = new Category($this->getRepositoryMock());
        $expected = new CategoryListResponse(
            [new CategoryListItem('1', self::NAME, self::DESCRIPTION, self::SLUG)]
        );
        $this->assertEquals($expected, $categoryService->getCategories());
    }

    protected function getRepositoryMock(): CategoryRepository
    {
        $categoryEntity = new class() extends AdvertCategoryEntity {
            public function getId(): ?string
            {
                return '1';
            }
        };
        $mock = $this->getMockBuilder(CategoryRepository::class)
            ->onlyMethods(['findBy'])
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())
            ->method('findBy')
            ->with([], ['name' => Criteria::ASC])
            ->willReturn([
                $categoryEntity
                    ->setName(self::NAME)
                    ->setDescription(self::DESCRIPTION)
                    ->setSlug(self::SLUG),
            ]);

        return $mock;
    }
}
