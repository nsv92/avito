<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Advert as AdvertService;
use App\Service\Exception\NotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Advert.
 */
class Advert extends AbstractController
{
    /** @var AdvertService */
    private $advertService;

    /**
     * Advert constructor.
     *
     * @param AdvertService $advertService
     */
    public function __construct(AdvertService $advertService)
    {
        $this->advertService = $advertService;
    }

    /**
     * @Route(path="/api/v1/type/{typeId}/category/{categoryId}/adverts", methods={"GET"})
     *
     * @param int $categoryId
     * @param int $typeId
     *
     * @return Response
     */
    public function AdvertByCategoryAndType(int $categoryId, int $typeId): Response
    {
        try {
            return $this->json($this->advertService->getAdvertByCategoryAndType($categoryId, $typeId));
        } catch (NotFoundException $e) {
            throw new HttpException($e->getCode(), $e->getMessage());
        }
    }
}
