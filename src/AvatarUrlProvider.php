<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/faker-provider
 */

namespace Localheinz\Faker\Provider;

use Faker\Provider;

final class AvatarUrlProvider extends Provider\Base
{
    /**
     * @see http://avatars.adorable.io
     *
     * @param null|string $identifier
     * @param int         $size
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function adorableAvatarUrl(string $identifier = null, int $size = null): string
    {
        if (null !== $identifier && 1 === \preg_match('/(\n|\r)/', $identifier)) {
            throw new \InvalidArgumentException('Identifier cannot contain new-line characters.');
        }

        if (null === $identifier) {
            $identifier = $this->generator->userName;
        }

        if (null !== $size && 1 > $size) {
            throw new \InvalidArgumentException(\sprintf(
                'Size needs to be greater than 0, but %d is not.',
                $size
            ));
        }

        if (null === $size) {
            $size = $this->generator->numberBetween(
                80,
                250
            );
        }

        return \sprintf(
            'https://api.adorable.io/avatars/%d/%s.png',
            $size,
            \trim($identifier)
        );
    }
}
