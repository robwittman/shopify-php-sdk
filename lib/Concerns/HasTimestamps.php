<?php

namespace Shopify\Concerns;

trait HasTimestamps
{
    /**
     * The date and time when the object was created. The API returns this value in ISO 8601 format.
     * @var string
     */
    protected $created_at;

    /**
     * The date and time when the object was last updated. The API returns this value in ISO 8601 format.
     * @var string
     */
    protected $updated_at;

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
