<?php
namespace TPGwidget\Data;

use PHPUnit\Framework\TestCase;

class DatasetTest extends TestCase
{
    /** @test */
    public function it_should_load_datasets()
    {
        $output = Datasets::load('stopNames');
        $this->assertInternalType('array', $output);
    }
    
    /** @test */
    public function it_should_throw_an_error_when_we_load_an_unknown_dataset()
    {
        $this->expectException(\InvalidArgumentException::class);
        $output = Datasets::load('doesntexist');
    }
}
