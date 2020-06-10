# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`0.2.1...main`][0.2.1...main].

## [`0.2.1`][0.2.1]

For a full diff see [`0.2.0...0.2.1`][0.2.0...0.2.1].

### Fixed

* Removed an inappropriate `replace` configuration from `composer.json` ([#20]), by [@localheinz]

## [`0.2.0`][0.2.0]

For a full diff see [`0.1.0...0.2.0`][0.1.0...0.2.0].

### Changed

* Renamed vendor namespace `Localheinz` to `Ergebnis` after move to [@ergebnis] ([#18]), by [@localheinz]

  Run

  ```
  $ composer remove localheinz/faker-provider
  ```

  and

  ```
  $ composer require ergebnis/faker-provider
  ```

  to update.

  Run

  ```
  $ find . -type f -exec sed -i '.bak' 's/Localheinz\\Faker\\Provider/Ergebnis\\Faker\\Provider/g' {} \;
  ```

  to replace occurrences of `Localheinz\Faker\Provider` with `Ergebnis\Faker\Provider`.

  Run

  ```
  $ find -type f -name '*.bak' -delete
  ```

  to delete backup files created in the previous step.

### Fixed

* Required `fzaninotto/faker` ([#4]), by [@localheinz]

## [`0.1.0`][0.1.0]

For a full diff see [`b2e46fd...0.1.0`][b2e46fd...0.1.0].

### Added

* Added `AvatarUrlProvider` which initally allows creating URLs to [avatars.adorable.io](http://avatars.adorable.io) avatars ([#1]), by [@localheinz]

[0.1.0]: https://github.com/ergebnis/faker-provider/tag/0.1.0
[0.2.0]: https://github.com/ergebnis/faker-provider/tag/0.2.0
[0.2.1]: https://github.com/ergebnis/faker-provider/tag/0.2.1

[b2e46fd...0.1.0]: https://github.com/ergebnis/faker-provider/compare/b2e46fd...0.1.0
[0.1.0...0.2.0]: https://github.com/ergebnis/faker-provider/compare/0.1.0...0.2.0
[0.2.0...0.2.1]: https://github.com/ergebnis/faker-provider/compare/0.2.0...0.2.1
[0.2.1...main]: https://github.com/ergebnis/faker-provider/compare/0.2.1...main

[#1]: https://github.com/ergebnis/faker-provider/pull/1
[#4]: https://github.com/ergebnis/faker-provider/pull/4
[#18]: https://github.com/ergebnis/faker-provider/pull/18
[#20]: https://github.com/ergebnis/faker-provider/pull/20

[@ergebnis]: https://github.com/ergebnis
[@localheinz]: https://github.com/localheinz
