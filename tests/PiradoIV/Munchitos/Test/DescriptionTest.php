<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class DescriptionTest extends TestCase
{
    public function setUp()
    {
        $this->description = 'Hello World!';
        $this->html = <<<HTML
<!doctype html>
<html>
  <head>
    <meta name="description" value="{$this->description}" />
  </head>
</html>
HTML;

        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    public function testCanFetchDescription()
    {
        $this->assertEquals($this->description, $this->munchitos->description());
    }

    public function testDescriptionReturnsNullIfNotPresent()
    {
        $this->munchitos->html('<html><body>Empty headers</body></html>');
        $this->assertEquals(null, $this->munchitos->description());
    }
}
