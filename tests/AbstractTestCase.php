<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionException as ReflectionExceptionAlias;

/**
 * Class AbstractTestCase.
 */
class AbstractTestCase extends TestCase
{
    /**
     * Set entity id.
     *
     * @param string $id
     * @param object $entity
     *
     * @throws ReflectionExceptionAlias
     */
    protected function setEntityId(object $entity, string $id): void
    {
        $class = new \ReflectionClass($entity);
        $idProperty = $class->getProperty('id');
        $idProperty->setAccessible(true);
        $idProperty->setValue($entity, $id);
        $idProperty->setAccessible(false);
    }

    /**
     * Set entity createdAt.
     *
     * @param object    $entity
     * @param \DateTime $createdAt
     *
     * @throws ReflectionExceptionAlias
     */
    protected function setCreatedAt(object $entity, \DateTime $createdAt): void
    {
        $class = new \ReflectionClass($entity);
        $createdAtProperty = $class->getProperty('createdAt');
        $createdAtProperty->setAccessible(true);
        $createdAtProperty->setValue($entity, $createdAt);
        $createdAtProperty->setAccessible(false);
    }
}
