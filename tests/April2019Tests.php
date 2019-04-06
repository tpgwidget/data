<?php

namespace TPGwidget\Data;

use PHPUnit\Framework\TestCase;

/**
 * Verifies that tpgwidget/data correct the new April 2019 stops
 */
class April2019Tests extends TestCase
{
    /** @test */
    public function it_should_format_new_stop_names() {
        $replacements = [
            'Les longets' => 'Sergy-Les Longets',
            'Cote du moralay' => 'Cessy-<small>Côte du Moralay</small>',
            'Cessy-st-denis' => 'Cessy-Saint-Denis',
        ];

        foreach ($replacements as $wrongName => $replacement) {
            $this->assertEquals($replacement, Stops::format($wrongName));
        }
    }
}
