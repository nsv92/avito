<?php

declare(strict_types=1);

namespace App\Common\ORM;

/**
 * Interface ModifiedAtInterface.
 */
interface ModifiedAtInterface
{
    /**
     * Get createdAt.
     */
    public function getCreatedAt(): \DateTime;

    /**
     * Get updatedAt.
     */
    public function getUpdatedAt(): \DateTime;
}
