<?php

namespace PiradoIV\Munchitos\Test;

use PiradoIV\Munchitos\Munchitos;

class TitleTest extends TestCase
{
    public function setUp()
    {
        $this->title = 'Hello World!';
        $this->html = "<html><head><title>{$this->title}</title></head></html>";
        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    public function testCanGetTitle()
    {
        $title = $this->munchitos->title();
        $this->assertEquals($this->title, $title);
    }
}
