<?php
namespace TPGwidget\Data;

class Stops {
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
}
