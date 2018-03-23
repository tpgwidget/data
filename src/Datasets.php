<?php
namespace TPGwidget\Data;

class Datasets {
    private static $datasets = [];
    
    public static function load(string $datasetName): array
    {
        if (array_key_exists($datasetName, self::$datasets)) { // Already loaded
            return self::$datasets[$datasetName];
        }
        
        $file = @file_get_contents(__DIR__.'/../data/'.$datasetName.'.json');
        
        if ($file === false) {
            throw new \InvalidArgumentException('Dataset file `'.$datasetName.'.json` couldn’t be loaded.');
        }
        
        $content = json_decode($file, true);
        self::$datasets[$datasetName] = $content;
        return $content;
    }
}
