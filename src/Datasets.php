<?php
namespace TPGwidget\Data;

class Datasets
{
    private static $datasets = [];
    private static $reversedDatasets = [];

    /**
     * Loads a dataset file
     *
     * @param string $datasetName The name of the file that should be loaded
     *
     * @throws \InvalidArgumentException if the file couldn't be loaded (e.g. it doesn't exist)
     * @throws \DomainException if the file couldn't be parsed (e.g. invalid JSON content)
     *
     * @return array The JSON-decoded dataset (associative array form)
     */
    public static function load(string $datasetName): array
    {
        // Use the datasets cache
        if (array_key_exists($datasetName, self::$datasets)) {
            return self::$datasets[$datasetName];
        }

        // Load the file
        $file = @file_get_contents(__DIR__.'/../data/'.$datasetName.'.json5');
        if ($file === false) {
            throw new \InvalidArgumentException('Dataset file `'.$datasetName.'.json5` couldn’t be loaded.');
        }

        // Parse the JSON content
        $content = json5_decode($file, true);
        if (is_null($content)) {
            throw new \DomainException('Dataset file `'.$datasetName.'.json5` contains invalid data.');
        }

        self::$datasets[$datasetName] = $content;
        return $content;
    }

    public static function loadReversed(string $datasetName): array
    {
        // Use the reversed datasets cache
        if (array_key_exists($datasetName, self::$reversedDatasets)) {
            return self::$reversedDatasets[$datasetName];
        }

        $dataset = array_flip(self::load($datasetName));
        self::$reversedDatasets[$datasetName] = $dataset;
        return $dataset;
    }
}
