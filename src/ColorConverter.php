<?php namespace Arcanedev\Color;

use Arcanedev\Color\Contracts\ColorConverter as ColorConverterContract;

/**
 * Class     ColorConverter
 *
 * @package  Arcanedev\Color
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ColorConverter implements ColorConverterContract
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use Converters\HEXTrait,
        Converters\HSVTrait;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Convert a HEX color to an HSV array (alias).
     *
     * @see    fromHexToHsv
     *
     * @param  string  $hex
     *
     * @return array
     */
    public static function hexToHsv($hex)
    {
        return (new static)->fromHexToHsv($hex);
    }

    /**
     * Convert a HEX color to an HSV array.
     *
     * @param  string  $hex
     *
     * @return array
     */
    public function fromHexToHsv($hex)
    {
        list($red, $green, $blue) = $this->fromHexToRgb($hex);

        return $this->fromRgbToHsv($red, $green, $blue);
    }

    /**
     * Convert an HSV to HEX color (alias).
     *
     * @see    fromHsvToHex
     *
     * @param  float|int  $hue
     * @param  float|int  $saturation
     * @param  float|int  $value
     *
     * @return string
     */
    public static function hsvToHex($hue, $saturation, $value)
    {
        return (new static)->fromHsvToHex($hue, $saturation, $value);
    }

    /**
     * Convert an HSV to HEX color.
     *
     * @param  float|int  $hue
     * @param  float|int  $saturation
     * @param  float|int  $value
     *
     * @return string
     */
    public function fromHsvToHex($hue, $saturation, $value)
    {
        list($red, $green, $blue) = $this->fromHsvToRgb($hue, $saturation, $value);

        return $this->fromRgbToHex($red, $green, $blue);
    }
}
