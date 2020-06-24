<?php
namespace TPGwidget\Data;

class Lines
{
    /**
     * Get all the lines
     * @return array
     */
    public static function all(): array {
        $lines = [];
        foreach (Datasets::load('lines') as $line) {
            $lines[$line['name']] = $line;
        }

        return $lines;
    }

    /**
     * Get all the lines with white text
     * @return array
     */
    public static function withWhiteText(): array {
        $allLines = self::all();
        return array_filter($allLines, function($line) {
            return $line['text'] === '#FFFFFF';
        });
    }

    /**
     * Get all the lines with black text
     * @return array
     */
    public static function withBlackText(): array {
        $allLines = self::all();
        return array_filter($allLines, function($line) {
            return $line['text'] === '#000000';
        });
    }

    /**
     * Get a line from its name
     * (A default value will be returned if the line wasn’t found)
     * @param string $lineName Name of the line
     * @return array           Line details
     */
    public static function get(string $lineName) {
        $defaultValue = [
            'name' => strtoupper($lineName),
            'background' => '#FFFFFF',
            'text' => '#000000',
            'shape' => 'tpg',
            'type' => 'bus',
        ];

        $lines = Lines::all();
        return $lines[$lineName] ?? $defaultValue;
    }
}
