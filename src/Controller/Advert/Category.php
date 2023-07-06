<?php

declare(strict_types=1);

namespace App\Controller\Advert;

use App\Model\Advert\CategoryListResponse;
use App\Service\Advert\Category as CategoryService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
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
     * @OA\Response(
     *     response=200,
     *     description="Returns advert categories",
     *
     *     @Model(type=CategoryListResponse::class)
     * )
     *
     * @Route(path="/api/v1/advert/category", methods={"GET"})
     */
    public function categories(): Response
    {
        return $this->json($this->categoryService->getCategories())->setEncodingOptions(
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}
