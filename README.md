# faker-provider

[![Continuous Deployment](https://github.com/ergebnis/faker-provider/workflows/Continuous%20Deployment/badge.svg)](https://github.com/ergebnis/faker-provider/actions)
[![Continuous Integration](https://github.com/ergebnis/faker-provider/workflows/Continuous%20Integration/badge.svg)](https://github.com/ergebnis/faker-provider/actions)

[![Code Coverage](https://codecov.io/gh/ergebnis/faker-provider/branch/master/graph/badge.svg)](https://codecov.io/gh/ergebnis/faker-provider)
[![Type Coverage](https://shepherd.dev/github/ergebnis/faker-provider/coverage.svg)](https://shepherd.dev/github/ergebnis/faker-provider)

[![Latest Stable Version](https://poser.pugx.org/ergebnis/faker-provider/v/stable)](https://packagist.org/packages/ergebnis/faker-provider)
[![Total Downloads](https://poser.pugx.org/ergebnis/faker-provider/downloads)](https://packagist.org/packages/ergebnis/faker-provider)

Provides additional providers for [`fzaninotto/faker`](https://github.com/fzaninotto/Faker).

## Installation

Run

```
$ composer require --dev ergebnis/faker-provider
```

## Usage

First obtain an instance of `Faker\Generator`:

```php
use Faker\Factory;

$faker = Factory::create();
```

Then add providers like this:

```php
use Ergebnis\Faker\Provider;

$faker->addProvider(new Provider\AvatarUrlProvider($faker));
```

## Providers

This package provides the following providers for use with [`fzaninotto/faker`](https://github.com/fzaninotto/Faker):

* [`Ergebnis\Faker\Provider\AvatarUrlProvider`](https://github.com/ergebnis/faker-provider#avatarurlprovider)

### `AvatarUrlProvider`

```php
use Ergebnis\Faker\Provider;
use Faker\Generator;

/** @var Generator&Provider\AvatarUrlProvider $faker */
$url = $faker->adorableAvatarUrl();

$urlWithFixedIdentifier = $faker->adorableAvatarUrl('localheinz');

$urlWithFixedIdentifierAndSize = $faker->adorableAvatarUrl(
    'localheinz',
    150
);
```

![Example of avatars.adorable.io avatar](https://api.adorable.io/avatars/150/localheinz.png)

Also see [avatars.adorable.io](http://avatars.adorable.io/).

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](https://github.com/ergebnis/.github/blob/master/CODE_OF_CONDUCT.md).

## License

This package is licensed using the [MIT License](LICENSE.md).
