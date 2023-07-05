<?php

declare(strict_types=1);

namespace App\Controller\Advert;

use App\Service\Advert\Category as CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Category.
 */
class Category extends AbstractController
{
    /** @var CategoryService */
    private $categoryService;

    /**
     * Category constructor.
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @Route(path="/api/v1/advert/category")
     */
    public function categories(): Response
    {
        return $this->json($this->categoryService->getCategories())->setEncodingOptions(
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}
