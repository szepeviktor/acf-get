<?php declare( strict_types = 1 ); // phpcs:disable NeutronStandard.MagicMethods.RiskyMagicMethod.RiskyMagicMethod
/**
 * Strongly typed Advanced Custom Fields get_field function variants with post ID.
 *
 * @package ACFget
 */

/**
 * Helper functions for getting strictly typed ACF field values by post ID.
 *
 * @method static string string_field( string $selector, int $post_id, string $default = '' )
 * @method static int int_field( string $selector, int $post_id, int $default = 0 )
 * @method static float float_field( string $selector, int $post_id, float $default = 0.0 )
 * @method static bool bool_field( string $selector, int $post_id, bool $default = false )
 * @method static bool|null trinary_field( string $selector, int $post_id, bool $default = null )
 * @method static array array_field( string $selector, int $post_id, array $default = [] )
 * @method static \WP_Post|null post_field( string $selector, int $post_id )
 */
class ACFgetbyid {

	/**
	 * Set post ID and call method of ACFget.
	 *
	 * Example: ACFgetbyid::some_field( $selector, $post_id [, $default] );
	 *
	 * @param string $name Method name.
	 * @param array $arguments Arguments for the method.
	 * @return mixed
	 * @throws \LogicException
	 */
	public static function __callStatic( string $name, array $arguments ) { // phpcs:ignore NeutronStandard.Functions.LongFunction.LongFunction
		// Check static method name.
		if ( ! method_exists( 'ACFget', $name ) ) {
			throw new \LogicException( sprintf( 'Method does not exist: ACFget::%s', $name ) );
		}

		$arg_count = count( $arguments );
		$previous_post_id = ACFget::$post_id;
		ACFget::$post_id = $arguments[1];

		switch ( $arg_count ) {
			case 2:
				// $selector only
				// phpcs:ignore NeutronStandard.Functions.VariableFunctions.VariableFunction
				$return_value = ACFget::$name( $arguments[0] );
				break;
			case 3:
				// $selector and $default
				// phpcs:ignore NeutronStandard.Functions.VariableFunctions.VariableFunction
				$return_value = ACFget::$name( $arguments[0], $arguments[2] );
				break;
			default:
				throw new \LogicException( sprintf( 'ACFget::%s needs 2 or 3 arguments.', $name ) );
		}

		// Restore post ID
		ACFget::$post_id = $previous_post_id;

		return $return_value;
	}
}
