<?php

declare(strict_types=1);

namespace App\Service\Exception;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class NotFoundException.
 */
class NotFoundException extends \RuntimeException
{
    /**
     * AdvertCategory not found exception.
     */
    public static function advertCategoryNotFound(string $params): NotFoundException
    {
        return new self(sprintf('AdvertCategory not found by requested params %s', $params), Response::HTTP_NOT_FOUND);
    }

    /**
     * AdvertType not found exception.
     */
    public static function advertTypeNotFound(string $params): NotFoundException
    {
        return new self(sprintf('AdvertType not found by requested params %s', $params), Response::HTTP_NOT_FOUND);
    }
}
