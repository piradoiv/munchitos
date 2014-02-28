<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class DescriptionTest extends TestCase
{
    /**
     * Prepares the same contents for all tests.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
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

    /**
     * If the description is present, Munchitos
     * should return it.
     *
     * @return void
     */
    public function testCanFetchDescription()
    {
        $this->assertEquals($this->description, $this->munchitos->description());
    }

    /**
     * If there isn't any meta description,
     * return null.
     *
     * @return void
     */
    public function testDescriptionReturnsNullIfNotPresent()
    {
        $this->munchitos->html('<html><body>Empty headers</body></html>');
        $this->assertEquals(null, $this->munchitos->description());
    }
}
