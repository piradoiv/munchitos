<?php

namespace PiradoIV\Munchitos\Test;

use PiradoIV\Munchitos\Munchitos;

class TitleTest extends TestCase
{
    /**
     * Prepares the contents for every test.
     *
     * @return void
     */
    public function setUp()
    {
        $this->title = 'Hello World!';
        $this->html = <<<HTML
<!doctype html>
<html>
  <head>
    <title>
      {$this->title}
    </title>
  </head>
</html>
HTML;

        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    /**
     * Test we can get the title and it's exactly
     * the same.
     *
     * @return void
     */
    public function testCanGetTitle()
    {
        $title = $this->munchitos->title();
        $this->assertEquals($this->title, $title);
    }

    /**
     * Test the library handles the
     * InvalidArgumentException when there isn't
     * a title present on the HTML.
     *
     * @return void
     */
    public function testReturnEmptyOnTitleException()
    {
        $this->munchitos->html('<html><body>Empty head!</body></html>');
        $this->assertEquals(null, $this->munchitos->title());
    }
}
