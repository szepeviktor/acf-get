<?php

declare(strict_types=1);

/**
 * Strongly typed Advanced Custom Fields get_field function variants.
 *
 * @author Viktor Szépe <viktor@szepe.net>
 * @license MIT https://opensource.org/licenses/MIT
 * @link https://github.com/szepeviktor/acf-get
 */

/**
 * Helper functions for getting strictly typed ACF field values.
 */
class ACFget
{
    /**
     * The post ID of which the value is saved against.
     *
     * @var int|string|false
     */
    public static $postId = false;

    /**
     * Return custom field value as an string.
     *
     * @param string $selector
     * @param string $default
     * @return string
     */
    public static function stringField(string $selector, string $default = ''): string
    {
        $rawValue = \get_field($selector, static::$postId);
        return ($rawValue === null) ? $default : $rawValue;
    }

    /**
     * Return custom field value as an integer.
     *
     * @param string $selector
     * @param int $default
     * @return int
     */
    public static function intField(string $selector, int $default = 0): int
    {
        $rawValue = \get_field($selector, static::$postId);
        return ($rawValue === null) ? $default : intval($rawValue);
    }

    /**
     * Return custom field value as a floating point number.
     *
     * @param string $selector
     * @param float $default
     * @return float
     */
    public static function floatField(string $selector, float $default = 0.0): float
    {
        $rawValue = \get_field($selector, static::$postId);
        return ($rawValue === null) ? $default : floatval($rawValue);
    }

    /**
     * Return custom field value as a boolean.
     *
     * @param string $selector
     * @param bool $default
     * @return bool
     */
    public static function boolField(string $selector, bool $default = false): bool
    {
        $rawValue = \get_field($selector, static::$postId);
        return ($rawValue === null) ? $default : boolval($rawValue);
    }

    /**
     * Return custom field value as a boolean or null.
     *
     * @param string $selector
     * @param bool|null $default
     * @return bool|null
     */
    public static function trinaryField(string $selector, ?bool $default = null): ?bool
    {
        $rawValue = \get_field($selector, static::$postId);
        return ($rawValue === null) ? $default : boolval($rawValue);
    }

    /**
     * Return custom field value as an array.
     *
     * @param string $selector
     * @param array<mixed> $default
     * @return array<mixed>
     */
    public static function arrayField(string $selector, array $default = []): array
    {
        $rawValue = \get_field($selector, static::$postId);
        if (is_array($rawValue)) {
            return $rawValue;
        }
        return ($rawValue === null) ? $default : [$rawValue];
    }

    /**
     * Return custom field value as instance of WP_Post.
     *
     * @param string $selector
     * @return \WP_Post|null
     */
    public static function postField(string $selector): ?\WP_Post
    {
        $rawValue = \get_field($selector, static::$postId);
        if (is_object($rawValue) && is_a($rawValue, '\WP_Post', false)) {
            return $rawValue;
        }
        // FIXME Need a better way.
        return null;
    }
}

/* TODO Add types.
Email, Url, Password
Image, File, Wysiwyg Editor, oEmbed, Gallery
Select, Checkbox, Radio Button, Button Group, True / False
Link, Page Link, Relationship, Taxonomy, User
Google Map, Date Picker, Date Time Picker, Time Picker, Color Picker
Message, Accordion, Tab, Group, Repeater, Flexible Content, Clone
*/
