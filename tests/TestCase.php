<?php

namespace Pactode\ParcelShop\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Pactode\ParcelShop\ParcelShopServiceProvider;

abstract class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'base64:9e0yNQB60wgU/cqbP09uphPo3aglW3iQJy+u4JQgnQE=');
    }

    protected function getPackageProviders($app)
    {
        return [ParcelShopServiceProvider::class];
    }
}
