<?php

namespace Pactode\ParcelShop\Tests;

use Illuminate\Support\Collection;
use Pactode\ParcelShop\Contracts\ParcelShop;

class GLSParcelShopTest extends TestCase
{
    /** @test */
    public function it_retrieves_all_parcel_shops()
    {
        /** @var \Pactode\ParcelShop\Contracts\ParcelShop */
        $parcelShops = app(ParcelShop::class)->all('DK');

        $this->assertInstanceOf(Collection::class, $parcelShops);
    }

    /** @test */
    public function it_retrieves_a_specific_parcel_shop()
    {
        /** @var \Pactode\ParcelShop\Contracts\ParcelShop */
        $parcelShop = app(ParcelShop::class)->find(99044);

        $this->assertInstanceOf(\Pactode\ParcelShop\Resources\ParcelShop::class, $parcelShop);
    }

    /** @test */
    public function it_retrieves_the_nearest_parcel_shops()
    {
        /** @var \Pactode\ParcelShop\Contracts\ParcelShop */
        $parcelShops = app(ParcelShop::class)->nearest('Vesterbrogade 44', '1620', 'DK', 5);

        $this->assertCount(5, $parcelShops);
        $this->assertInstanceOf(Collection::class, $parcelShops);
    }

    /** @test */
    public function it_retrieves_parcel_shops_within_a_zip_code()
    {
        /** @var \Pactode\ParcelShop\Contracts\ParcelShop */
        $parcelShops = app(ParcelShop::class)->within('1620', 'DK');

        $this->assertInstanceOf(Collection::class, $parcelShops);
    }
}
