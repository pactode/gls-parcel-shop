<?php

namespace Pactode\ParcelShop\Resources;

use Illuminate\Support\Collection;

class ParcelShop extends Resource
{
    /**
     * Get the city name.
     */
    public function city(): string
    {
        return $this->getData('CityName');
    }

    /**
     * Get the company name.
     */
    public function company(): string
    {
        return $this->getData('CompanyName');
    }

    /**
     * Get the country code (ISO-3166-A format).
     */
    public function countryCode(): string
    {
        return $this->getData('CountryCodeISO3166A2');
    }

    /**
     * Get the distance in meters.
     */
    public function distance(): int
    {
        return round($this->getData('DistanceMetersAsTheCrowFlies'), 0);
    }

    /**
     * Get the distance in kilometers.
     */
    public function distanceInKm(): float
    {
        return round($this->distance() / 1000, 3);
    }

    /**
     * Get the latitude.
     */
    public function latitude(): float
    {
        return $this->getData('Latitude');
    }

    /**
     * Get the longitude.
     */
    public function longitude(): float
    {
        return $this->getData('Longitude');
    }

    /**
     * Get the unique parcel shop number.
     */
    public function number(): string
    {
        return $this->getData('Number');
    }

    /**
     * Get the opening hours.
     */
    public function openingHours(): Collection
    {
        return collect($this->getData('OpeningHours.Weekday'))
            ->map(function ($data) {
                return new OpeningHour((array) $data);
            });
    }

    /**
     * Get the street name.
     */
    public function streetName(): string
    {
        return $this->getData('Streetname');
    }

    /**
     * Get the street name 2.
     */
    public function streetName2(): string
    {
        return $this->getData('Streetname2');
    }

    /**
     * Get the zip code.
     */
    public function zipCode(): string
    {
        return $this->getData('ZipCode');
    }
}
