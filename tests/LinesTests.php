<?php
namespace TPGwidget\Data;

use PHPUnit\Framework\TestCase;

class LinesTests extends TestCase
{
    /** @test */
    public function it_should_load_lines() {
        $lines = Lines::all();
        $this->assertInternalType('array', $lines);
        $this->assertArrayHasKey('12', $lines);
    }

    /** @test */
    public function it_should_load_lines_by_color() {
        $whiteLines = Lines::withWhiteText();
        $this->assertInternalType('array', $whiteLines);
        $this->assertArrayHasKey('47', $whiteLines);
        $this->assertArrayNotHasKey('42', $whiteLines);

        $blackLines = Lines::withBlackText();
        $this->assertInternalType('array', $blackLines);
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

            if ($line['text'] !== '#000000' && $line['text'] !== '#FFFFFF') {
                $this->fail('Line ‘'.$line['name'].'’ has an invalid text color.');
            }

            if (! preg_match('/^#[0-9A-F]{6}$/', $line['background'])) {
                $this->fail('Line ‘'.$line['name'].'’ has an invalid background color.');
            }
        }
    }
}
