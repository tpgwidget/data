<?php
namespace TPGwidget\Data;

use PHPUnit\Framework\TestCase;

class StopsTest extends TestCase
{
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
}
