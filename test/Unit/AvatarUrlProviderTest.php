<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/faker-provider
 */

namespace Ergebnis\Faker\Provider\Test\Unit;

use Ergebnis\Faker\Provider\AvatarUrlProvider;
use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Faker\Provider\AvatarUrlProvider
 */
final class AvatarUrlProviderTest extends Framework\TestCase
{
    private const PATTERN_ADORABLE_AVATAR_URL = '/^https:\/\/api\.adorable\.io\/avatars\/(?P<identifier>\d+)\/(?P<userName>\S+)$/';

    /**
     * @dataProvider providerInvalidAdorableAvatarUrlIdentifier
     *
     * @param string $identifier
     */
    public function testAdorableAvatarUrlRejectsInvalidIdentifier(string $identifier): void
    {
        /** @var AvatarUrlProvider&Generator $faker */
        $faker = self::createFakerWithAddedAvatarUrlProvider();

        $size = $faker->numberBetween(200, 450);

        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Identifier cannot contain new-line characters.');

        $faker->adorableAvatarUrl(
            $identifier,
            $size
        );
    }

    public function providerInvalidAdorableAvatarUrlIdentifier(): \Generator
    {
        /** @var AvatarUrlProvider&Generator $faker */
        $faker = self::createFakerWithAddedAvatarUrlProvider();

        $newLineCharacters = [
            "\n",
            "\r",
            "\r\n",
        ];

        foreach ($newLineCharacters as $newLineCharacter) {
            /** @var string[] $words */
            $words = $faker->words;

            $invalidIdentifier = \implode(
                $newLineCharacter,
                $words
            );

            yield [
                $invalidIdentifier,
            ];
        }
    }

    /**
     * @dataProvider providerInvalidAdorableAvatarUrlSize
     *
     * @param int $size
     */
    public function testAdorableAvatarUrlRejectsInvalidSize(int $size): void
    {
        /** @var AvatarUrlProvider&Generator $faker */
        $faker = self::createFakerWithAddedAvatarUrlProvider();

        $identifier = $faker->userName;

        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage(\sprintf(
            'Size needs to be greater than 0, but %d is not.',
            $size
        ));

        $faker->adorableAvatarUrl(
            $identifier,
            $size
        );
    }

    public function testAdorableAvatarUrlReturnsAdorableAvatarUrlWhenInvokedWithoutArguments(): void
    {
        /** @var AvatarUrlProvider&Generator $faker */
        $faker = self::createFakerWithAddedAvatarUrlProvider();

        $pattern = self::PATTERN_ADORABLE_AVATAR_URL;

        self::assertRegExp($pattern, $faker->adorableAvatarUrl());
    }

    public function testAdorableAvatarUrlReturnsAdorableAvatarUrlWithTrimmedIdentifier(): void
    {
        /** @var AvatarUrlProvider&Generator $faker */
        $faker = self::createFakerWithAddedAvatarUrlProvider();

        $identifier = $faker->userName;
        $paddedIdentifier = \str_pad(
            $identifier,
            \mb_strlen($identifier) + 10,
            ' ',
            \STR_PAD_BOTH
        );
        $size = $faker->numberBetween(200, 450);

        $expected = \sprintf(
            'https://api.adorable.io/avatars/%d/%s.png',
            $size,
            $identifier
        );

        self::assertSame($expected, $faker->adorableAvatarUrl($paddedIdentifier, $size));
    }

    public function providerInvalidAdorableAvatarUrlSize(): array
    {
        return [
            'int-less-than-minus-1' => [-1 * self::createFaker()->numberBetween(2)],
            'int-minus-1' => [-1],
            'int-zero' => [0],
        ];
    }

    private static function createFaker(): Generator
    {
        $faker = Factory::create();

        $faker->seed(9001);

        return $faker;
    }

    private static function createFakerWithAddedAvatarUrlProvider(): Generator
    {
        $faker = self::createFaker();

        $faker->addProvider(new AvatarUrlProvider($faker));

        return $faker;
    }
}
