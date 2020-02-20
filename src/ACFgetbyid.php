<?php // phpcs:disable NeutronStandard.MagicMethods.RiskyMagicMethod.RiskyMagicMethod,NeutronStandard.Functions.LongFunction.LongFunction


declare(strict_types=1);

/**
 * Strongly typed Advanced Custom Fields get_field function variants with post ID.
 *
 * @package ACFget
 */

/**
 * Helper functions for getting strictly typed ACF field values by post ID.
 *
 * @method static string string_field( string $selector, int $postId, string $default = '' )
 * @method static int int_field( string $selector, int $postId, int $default = 0 )
 * @method static float float_field( string $selector, int $postId, float $default = 0.0 )
 * @method static bool bool_field( string $selector, int $postId, bool $default = false )
 * @method static bool|null trinary_field( string $selector, int $postId, bool $default = null )
 * @method static array array_field( string $selector, int $postId, array $default = [] )
 * @method static \WP_Post|null post_field( string $selector, int $postId )
 */
class ACFgetbyid
{

    /**
     * Set post ID and call method of ACFget.
     *
     * Example: ACFgetbyid::someField($selector, $postId [, $default]);
     *
     * @param string $name Method name.
     * @param array<int, mixed> $arguments Arguments for the method.
     * @return mixed
     * @throws \LogicException
     */
    public static function __callStatic(string $name, array $arguments)
    {
        // Check static method name.
        if (! method_exists('ACFget', $name)) {
            throw new \LogicException(sprintf('Method does not exist: ACFget::%s', $name));
        }

        $argCount = count($arguments);
        $previousPostId = ACFget::$postId;
        ACFget::$postId = $arguments[1];

        switch ($argCount) {
            case 2:
                // Selector only
                // phpcs:ignore NeutronStandard.Functions.VariableFunctions.VariableFunction
                $fieldValue = ACFget::$name($arguments[0]);
                break;
            case 3:
                // Selector and default
                // phpcs:ignore NeutronStandard.Functions.VariableFunctions.VariableFunction
                $fieldValue = ACFget::$name($arguments[0], $arguments[2]);
                break;
            default:
                throw new \LogicException(sprintf('ACFget::%s needs 2 or 3 arguments.', $name));
        }

        // Restore post ID
        ACFget::$postId = $previousPostId;

        return $fieldValue;
    }
}
