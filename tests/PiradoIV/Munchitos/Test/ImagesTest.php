<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class ImagesTest extends TestCase
{
    /**
     * Prepares the data for each test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html = <<<HTML
<!doctype html>
<html>
  <body>
    <a href="http://www.example.org/">
      <img src="images/testing.png" alt="Testing alt" />
      <img src="images/second-testing.png" />
    </a>
  </body>
</html>>
HTML;

        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    /**
     * Test if the library can fetch the
     * array of images.
     *
     * @return void
     */
    public function testCanFetchImages()
    {
        $images = $this->munchitos->images();
        $this->assertEquals(2, count($images));
    }

    /**
     * Tests if the library can fetch the
     * alternative text from the image.
     *
     * @return void
     */
    public function testImagesAltText()
    {
        $images = $this->munchitos->images();
        $this->assertEquals('Testing alt', $images[0]->altText());
        $this->assertEquals('Testing alt', $images[0]->alt());
    }

    /**
     * Tests if the library can fetch the
     * image source (URL).
     *
     * @return void
     */
    public function testCanFetchSrc()
    {
        $images = $this->munchitos->images();
        $this->assertEquals('images/testing.png', $images[0]->src());
    }

    /**
     * Tests if the library can detect if the
     * image is beign linked.
     *
     * @return void
     */
    public function testCheckIfLinkedImage()
    {
        $images = $this->munchitos->images();
        $this->assertTrue($images[0]->isLinked());
    }
}
