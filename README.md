# Strongly typed Advanced Custom Fields `get_field()` variants

[![CircleCI](https://circleci.com/gh/szepeviktor/acf-get.svg?style=svg)](https://circleci.com/gh/szepeviktor/acf-get)

### Installation

Copy all `inc/class-*.php` files to your theme or plugin.

### Usage

For example `ACFget::bool_field( $name )` returns a boolean for sure.

### Field status

- Undefined ACF field
- Missing value, not in post meta
- Empty value when it is possible, e.g. "Allow null" in Select fields
- Existing value
