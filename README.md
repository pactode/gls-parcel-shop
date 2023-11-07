# GLS Parcel Shop


<a href="https://github.com/pactode/gls-parcel-shop/actions"><img alt="GitHub Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/pactode/gls-parcel-shop/tests.yml?branch=main&label=tests&style=round-square"></a>
<a href="https://packagist.org/packages/pactode/gls-parcel-shop"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/pactode/gls-parcel-shop"></a>
<a href="https://packagist.org/packages/pactode/gls-parcel-shop"><img alt="Latest Version" src="https://img.shields.io/packagist/v/pactode/gls-parcel-shop"></a>
<a href="https://packagist.org/packages/pactode/gls-parcel-shop"><img alt="License" src="https://img.shields.io/github/license/pactode/gls-parcel-shop"></a>

The `pactode/gls-parcel-shop` package is a simple wrapper for the GLS Parcel Shop Webservice written in PHP with a service provider for Laravel.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)

## Installation

You can install the package via composer:

```bash
composer require pactode/gls-parcel-shop
```

The package will automatically register itself.


You can optionally publish the config file with:

```bash
php artisan vendor:publish --tag="parcel-shop-config"
```

## Usage

The GLS Parcel Shop webservice allows you to retrieve the following information:
- All parcel shops for a given country
- Find a specific parcel shop by its unique number
- Find parcel shops near an address
- Find parcel shops within a specific zip code, country

**Setting up the client**

*This can be skipped in Laravel as the client is bound to the service container.*

```php
$client = GLSParcelShop::make('http://www.gls.dk/webservices_v4/wsShopFinder.asmx?WSDL');
```

**Resolving it from the Laravel Service Container**

```php
use Pactode\ParcelShop\Contracts\ParcelShop;

$client = app(ParcelShop::class);
```

**Get all parcel shops**

```php
$client->all('DK'); // returns Illuminate\Support\Collection
```

This request returns a collection of `Pactode\ParcelShop\Resources\ParcelShop` resources.

**Find a specific parcel shop**

```php
$parcelShop = $client->find(12345); // returns Pactode\ParcelShop\Resources\ParcelShop

// The following getters are available for ParcelShop:
$parcelShop->number();
$parcelShop->company();
$parcelShop->streetName();
$parcelShop->streetName2();
$parcelShop->zipCode();
$parcelShop->city();
$parcelShop->countryCode();
$parcelShop->latitude();
$parcelShop->longitude(); 

$parcelShop->openingHours(); // returns a collection of OpeningHour resources

// Only available if you find parcel shops near an address
$parcelShop->distance(); // 875
$parcelShop->distanceInKm(); // 0.875

// Available getters for the OpeningHour resource
$openingHour->day(); // Monday
$openingHour->from(); // 08:00
$openingHour->to(); // 20:00
```

**Find parcel shops near an address**

```php
// Params: Street, Zip Code, Country Code, Amount (optional, default to 5)

$client->nearest('Amaliegade 16', '1256', 'DK', 10); // returns Illuminate\Support\Collection
```

**Find parcel shops within a zip code**

```php
$client->within('1256', 'DK'); // returns Illuminate\Support\Collection
```

## Testing

```bash
composer test
```

## Security

If you discover any security issues, please email dev@pactode.com instead of using the issue tracker.

## Credits

- [Morten Poul Jensen](https://github.com/pactode)
- [All contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
