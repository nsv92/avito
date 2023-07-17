<?php

declare(strict_types=1);

namespace App\Common\ORM;

use DateTime;

/**
 * Trait ModifiedAtTrait.
 */
trait ModifiedAtTrait
{
    /**
     * @var \DateTime
     *
     * @Doctrine\ORM\Mapping\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;
    /**
     * @var \DateTime
     *
     * @Doctrine\ORM\Mapping\Column(name="updated_at", type="datetime", nullable=false)
     */
    protected $updatedAt;

    /**
     * Get createdAt.
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Get updatedAt.
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Pre persist and pre update events.
     *
     * @Doctrine\ORM\Mapping\PrePersist()
     *
     * @Doctrine\ORM\Mapping\PreUpdate()
     */
    public function preFlushModifiedAt(): void
    {
        $updatedAt = new \DateTime();
        if (null === $this->createdAt) {
            $this->createdAt = $updatedAt;
        }
        $this->updatedAt = $updatedAt;
    }
}
