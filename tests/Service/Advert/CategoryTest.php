<?php

namespace App\Tests\Service\Advert;

use App\Entity\Advert\Category as AdvertCategoryEntity;
use App\Model\Advert\CategoryListItem;
use App\Model\Advert\CategoryListResponse;
use App\Repository\Advert\Category as CategoryRepository;
use App\Service\Advert\Category;
use App\Tests\AbstractTestCase;
use Doctrine\Common\Collections\Criteria;

/**
 * Class CategoryTest.
 */
class CategoryTest extends AbstractTestCase
{
    public const NAME = 'some_name';
    public const DESCRIPTION = 'some_description';
    public const SLUG = 'some_slug';

    /**
     * @return void
     *
     * @throws \ReflectionException
     */
    public function testGetCategories()
    {
        $categoryService = new Category($this->getRepositoryMock());
        $expected = new CategoryListResponse(
            [new CategoryListItem('1', self::NAME, self::DESCRIPTION, self::SLUG)]
        );
        $this->assertEquals($expected, $categoryService->getCategories());
    }

    /**
     * @throws \ReflectionException
     */
    protected function getRepositoryMock(): CategoryRepository
    {
        $categoryEntity = (new AdvertCategoryEntity())
            ->setName(self::NAME)
            ->setDescription(self::DESCRIPTION)
            ->setSlug(self::SLUG);
        $this->setEntityId($categoryEntity, '1');
        $mock = $this->getMockBuilder(CategoryRepository::class)
            ->onlyMethods(['findBy'])
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->once())
            ->method('findBy')
            ->with([], ['name' => Criteria::ASC])
            ->willReturn([
                $categoryEntity,
            ]);

        return $mock;
    }
}
