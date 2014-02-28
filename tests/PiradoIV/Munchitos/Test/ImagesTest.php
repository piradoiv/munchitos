<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class ImagesTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->html = <<<HTML
<!doctype html>
<html>
  <body>
    <a href="http://www.example.org/">
      <img src="images/testing.png" alt="Testing alt" />
    </a>
  </body>
</html>>
HTML;

        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    public function testCanFetchImages()
    {
        $images = $this->munchitos->images();
        $this->assertEquals(1, count($images));
    }

    public function testImagesAltText()
    {
        $images = $this->munchitos->images();
        $this->assertEquals('Testing alt', $images[0]->altText());
        $this->assertEquals('Testing alt', $images[0]->alt());
    }

    public function testCanFetchSrc()
    {
        $images = $this->munchitos->images();
        $this->assertEquals('images/testing.png', $images[0]->src());
    }
}
