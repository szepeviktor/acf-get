<?php // phpcs:disable NeutronStandard.MagicMethods.RiskyMagicMethod.RiskyMagicMethod,NeutronStandard.Functions.LongFunction.LongFunction


declare(strict_types=1);

/**
 * Strongly typed Advanced Custom Fields get_field function variants with post ID.
 *
 * @author Viktor Szépe <viktor@szepe.net>
 * @license MIT https://opensource.org/licenses/MIT
 * @link https://github.com/szepeviktor/acf-get
 */

/**
 * Helper functions for getting strictly typed ACF field values by user ID.
 *
 * @method static string stringField( string $selector, int $postId, string $default = '' )
 * @method static int intField( string $selector, int $postId, int $default = 0 )
 * @method static float floatField( string $selector, int $postId, float $default = 0.0 )
 * @method static bool boolField( string $selector, int $postId, bool $default = false )
 * @method static bool|null trinaryField( string $selector, int $postId, bool $default = null )
 * @method static array arrayField( string $selector, int $postId, array $default = [] )
 * @method static \WP_Post|null postField( string $selector, int $postId )
 */
class ACFuser
{
    /**
     * Set user ID and call method of ACFget.
     *
     * Example: ACFuser::someField($selector, $userId [, $default]);
     *
     * @param string $name Method name.
     * @param array<mixed> $arguments Arguments for the method.
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
        ACFget::$postId = sprintf('user_%d', $arguments[1]);

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
