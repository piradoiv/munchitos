<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class CanonicalTest extends TestCase
{
    public function setUp()
    {
        $this->canonical = 'http://www.example.org/';
        $this->html = <<<HTML
<!doctype html>
<html>
  <head>
    <link rel="canonical" href="{$this->canonical}" />
  </head>
</html>
HTML;

        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    public function testCanFetchCanonicalUrl()
    {
        $this->assertEquals($this->canonical, $this->munchitos->canonical());
    }

    public function testReturnsNullOnEmptyCanonical()
    {
        $this->munchitos->html('<html></html>');
        $this->assertEquals(null, $this->munchitos->canonical());
    }
}
