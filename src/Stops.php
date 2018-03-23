<?php
namespace TPGwidget\Data;

class Stops {
    //==========================================================================
    // Stop correction
    //==========================================================================
    
    /**
     * Corrects a stop name
     * 
     * @param string $stopName The stop name returned by the TPG API
     * 
     * @return string The corrected stop name
     *                (or the original $stopName parameter if no correction exists)
     */
    public static function correct(string $stopName): string
    {
        return Datasets::load('stopNames')[$stopName] ?? $stopName;
    }
    
    //==========================================================================
    // Stop translation
    //==========================================================================

    /**
     * Converts a SBB (transport.opendata.ch) stop name to a TPG stop name
     * 
     * @param string $sbbStopName The stop name returned by the SBB API
     * 
     * @retur string The stop name, as the users are used to read it
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
