<?php

namespace Pactode\ParcelShop\Resources;

class OpeningHour extends Resource
{
    /**
     * Get the day.
     */
    public function day(): string
    {
        return $this->getData('day');
    }

    /**
     * Get the from time.
     */
    public function from(): string
    {
        return $this->getData('openAt.From');
    }

    /**
     * Get the to time.
     */
    public function to(): string
    {
        return $this->getData('openAt.To');
    }
}
