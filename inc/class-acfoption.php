<?php declare( strict_types = 1 );
/**
 * Strongly typed Advanced Custom Fields get_field function variants for options.
 *
 * @package ACFget
 */

/**
 * Helper functions for getting strictly typed ACF option values.
 *
 * @method static string string_field( string $selector, string $default = '' )
 * @method static int int_field( string $selector, int $default = 0 )
 * @method static float float_field( string $selector, float $default = 0.0 )
 * @method static bool bool_field( string $selector, bool $default = false )
 * @method static bool|null trinary_field( string $selector, bool $default = null )
 * @method static array array_field( string $selector, array $default = [] )
 * @method static \WP_Post|null post_field( string $selector )
 */
class ACFoption extends ACFget {

	/**
	 * The post ID of which the value is saved against.
	 *
	 * @var int|string|false
	 */
	public static $post_id = 'options';
}
