<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;

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
     * @throws \ReflectionException
     */
    protected function setEntityId(object $entity, string $id): void
    {
        $class = new \ReflectionClass($entity);
        $idProperty = $class->getProperty('id');
        $idProperty->setAccessible(true);
        $idProperty->setValue($id);
        $idProperty->setAccessible(false);
    }
}
