<?php
namespace TPGwidget\Data;

use PHPUnit\Framework\TestCase;

class StopsTests extends TestCase
{
    //==========================================================================
    // Stop correction
    //==========================================================================

    /** @test */
    public function it_should_return_the_input_when_its_unknown()
    {
        $output = Stops::correct('xyz');
        $this->assertEquals('xyz', $output);
    }

    /** @test */
    public function it_should_correct_wrong_stop_names()
    {
        $output = Stops::correct('Gd-Saconnex-Place');
        $this->assertEquals('Grand-Saconnex-Place', $output);

        $output = Stops::correct('Vernier-Parf.');
        $this->assertEquals('Vernier-Parfumerie', $output);
    }

    /** @test */
    public function it_should_format_some_stop_names()
    {
        $output = Stops::format('Thoiry-Pl. en Poulet');
        $this->assertEquals('Thoiry-<small>Place en Poulet</small>', $output);

        $output = Stops::correct('Thoiry-Pl. en Poulet');
        $this->assertEquals('Thoiry-Place en Poulet', $output);
    }

    /** @test */
    public function it_should_escape_html_from_the_input()
    {
        $input = '<b>XSS!</b>';

        $output = Stops::correct($input);
        $this->assertThat($output, $this->logicalNot($this->stringContains('<b>')));

        $output = Stops::format($input);
        $this->assertThat($output, $this->logicalNot($this->stringContains('<b>')));
    }

    //==========================================================================
    // Stop translation
    //==========================================================================

    /** @test */
    public function it_should_translate_stop_names_from_sbb_to_tpg()
    {
        $output = Stops::sbbToTpg('Genève, Bel-Air');
        $this->assertEquals('Bel-Air', $output);
    }

    /** @test */
    public function it_should_translate_stop_names_from_tpg_to_sbb()
    {
        $output = Stops::tpgToSbb('Les Esserts');
        $this->assertEquals('Petit-Lancy, Les Esserts', $output);
    }

}
