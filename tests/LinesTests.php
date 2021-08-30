<?php
namespace TPGwidget\Data;

use PHPUnit\Framework\TestCase;

class LinesTests extends TestCase
{
    /** @test */
    public function it_should_load_lines() {
        $lines = Lines::all();
        $this->assertIsArray($lines);
        $this->assertArrayHasKey('12', $lines);
    }

    /** @test */
    public function it_should_load_lines_by_color() {
        $whiteLines = Lines::withWhiteText();
        $this->assertIsArray($whiteLines);
        $this->assertArrayHasKey('47', $whiteLines);
        $this->assertArrayNotHasKey('42', $whiteLines);

        $blackLines = Lines::withBlackText();
        $this->assertIsArray($blackLines);
        $this->assertArrayHasKey('42', $blackLines);
        $this->assertArrayNotHasKey('47', $blackLines);
    }

    /** @test */
    public function it_should_load_lines_details() {
        $line = Lines::get('14');
        $this->assertEquals($line['name'], '14');
        $this->assertEquals('#663399', $line['background']);
        $this->assertEquals('#FFFFFF', $line['text']);
    }

    /** @test */
    public function it_should_return_a_default_result_for_unknown_lines() {
        $line = Lines::get('XX');
        $this->assertEquals('#FFFFFF', $line['background']);
        $this->assertEquals('#000000', $line['text']);
    }

    /** @test */
    public function all_lines_are_valid() {
        foreach (Lines::all() as $line) {
            $this->assertArrayHasKey('name', $line);
            $this->assertArrayHasKey('background', $line);
            $this->assertArrayHasKey('text', $line);
            $this->assertArrayHasKey('type', $line);
            $this->assertArrayHasKey('shape', $line);

            // Text color
            if ($line['text'] !== '#000000' && $line['text'] !== '#FFFFFF') {
                $this->fail('Line ‘'.$line['name'].'’ has an invalid text color.');
            }

            // Background color
            if (! preg_match('/^#[0-9A-F]{6}$/', $line['background'])) {
                $this->fail('Line ‘'.$line['name'].'’ has an invalid background color.');
            }

            // Shape
            $this->assertContains($line['type'], ['bus', 'tram', 'train']);
            $this->assertContains($line['shape'], ['tpg', 'noctambus', 'lex']);
        }
    }

    /** @test */
    public function there_are_no_line_duplicates() {
        $this->assertTrue(true); // Ensure at least one assertion on this test

        $lines = Datasets::load('lines');
        $lineNames = array_map(function($line) {
            return $line['name'];
        }, $lines);

        foreach (array_count_values($lineNames) as $line => $occurrences) {
            if ($occurrences > 1) {
                $this->fail("Line $line has $occurrences occurrences instead of one.");
            }
        }
    }

    /** @test */
    public function it_should_have_a_shape() {
        $this->assertEquals('tpg', Lines::get('12')['shape']);
        $this->assertEquals('tpg', Lines::get('5')['shape']);
        $this->assertEquals('noctambus', Lines::get('NC')['shape']);
        $this->assertEquals('lex', Lines::get('L4')['shape']);
        $this->assertEquals('tpg', Lines::get('unknown')['shape']);
    }

    /** @test */
    public function it_should_have_a_type() {
        $this->assertEquals('tram', Lines::get('12')['type']);
        $this->assertEquals('bus', Lines::get('5')['type']);
        $this->assertEquals('bus', Lines::get('NC')['type']);
        $this->assertEquals('train', Lines::get('L4')['type']);
        $this->assertEquals('bus', Lines::get('unknown')['type']);
    }
}
