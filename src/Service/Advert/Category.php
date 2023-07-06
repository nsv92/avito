<?php

declare(strict_types=1);

namespace App\Service\Advert;

use App\Entity\Advert\Category as CategoryEntity;
use App\Model\Advert\CategoryListItem;
use App\Model\Advert\CategoryListResponse;
use App\Repository\Advert\Category as CategoryRepository;
use Doctrine\Common\Collections\Criteria;

/**
 * Class Category.
 */
class Category
{
    /** @var CategoryRepository */
    private $categoryRepository;

    /**
     * Category constructor.
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all advert categories.
     */
    public function getCategories(): CategoryListResponse
    {
        $categories = $this->categoryRepository->findBy([], ['name' => Criteria::ASC]);

        $categoryToItem = function (CategoryEntity $category): CategoryListItem {
            return new CategoryListItem(
                $category->getId(),
                $category->getName(),
                $category->getDescription(),
                $category->getSlug()
            );
        };

        return new CategoryListResponse(\array_map($categoryToItem, $categories));
    }
}
