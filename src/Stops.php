<?php
namespace TPGwidget\Data;

class Stops
{
    //==========================================================================
    // Stop correction
    //==========================================================================

    /**
     * Corrects a stop name and adds some HTML markup when applicable.
     *
     * @param string $stopName The stop name returned by the TPG API
     *
     * @return string The corrected stop name
     *                (or the original $stopName parameter if no correction exists)
     *                The output can contain `<small>` HTML tags. To receive a stop name
     *                with no HTML markup, use Stops::correct().
     */
    public static function format(string $stopName): string
    {
        $stopName = htmlspecialchars($stopName);
        return Datasets::load('stopNames')[$stopName] ?? $stopName;
    }

    /**
     * Corrects a stop name.
     *
     * This method does not add HTML markup to the stop name. If your usage is compatible
     * with HTML markup, you should use Stops::format() instead.
     *
     * @param string $stopName The stop name returned by the TPG API
     *
     * @return string The corrected stop name
     *                (or the original $stopName parameter if no correction exists)
     */
    public static function correct(string $stopName): string
    {
        return preg_replace(
            '/<small>(.*)<\/small>/',
            '$1',
            self::format($stopName)
        );
    }

    //==========================================================================
    // Stop translation
    //==========================================================================

    /**
     * Converts a SBB (transport.opendata.ch) stop name to a TPG stop name.
     *
     * @param string $sbbStopName The stop name returned by the SBB API
     *
     * @return string The stop name, as the users are used to read it
     */
    public static function sbbToTpg(string $sbbStopName): string
    {
        return Datasets::load('stopTranslation')[$sbbStopName] ?? $sbbStopName;
    }

    /**
     * Converts a TPG stop name to a SBB stop name,
     * so the transport.opendata.ch API can read it.
     *
     * @param string $tpgStopName The stop name returned by the SBB API
     *
     * @return string The stop name, in the SBB format
     */
    public static function tpgToSbb(string $tpgStopName): string
    {
        return Datasets::loadReversed('stopTranslation')[$tpgStopName] ?? $tpgStopName;
    }
}
