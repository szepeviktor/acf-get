# Strongly typed Advanced Custom Fields `get_field()` variants

[![CircleCI](https://circleci.com/gh/szepeviktor/acf-get.svg?style=svg)](https://circleci.com/gh/szepeviktor/acf-get)
[![Packagist](https://img.shields.io/packagist/v/szepeviktor/acf-get.svg?color=239922&style=popout)](https://packagist.org/packages/szepeviktor/acf-get)
[![Packagist](https://img.shields.io/packagist/dt/szepeviktor/acf-get.svg)](https://packagist.org/packages/szepeviktor/acf-get)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-239922)](https://github.com/phpstan/phpstan)

### Installation

`composer require szepeviktor/acf-get` or copy all `inc/class-*.php` files to your theme or plugin.

### Usage

For example `ACFget::bool_field( $name )` returns a boolean for sure.

### Field status

- Undefined ACF field
- Missing value, not in post meta
- Empty value when it is possible, e.g. "Allow null" is enabled in Select fields
- Existing value
