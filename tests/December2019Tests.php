<?php

namespace TPGwidget\Data;

use PHPUnit\Framework\TestCase;

/**
 * Test that tpgwidget/data is compatible with December 2019 TPG network changes.
 */
class December2019Tests extends TestCase
{
    /** @test */
    public function it_should_know_new_lines() {
        $lines = Lines::all();

        $newLines = ['17', '32', '37', '38', '39', '50', '52', '55', '59', '70', '71', '72', '73', '74', '75', '76', '77', '78'];
        foreach ($newLines as $line) {
            $this->assertArrayHasKey($line, $lines);
        }
    }
}
