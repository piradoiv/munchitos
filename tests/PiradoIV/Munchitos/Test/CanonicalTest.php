<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class CanonicalTest extends TestCase
{
    /**
     * Prepares the base contents for each
     * test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

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

    /**
     * Tests if it returns the Canonical URL.
     *
     * @return void
     */
    public function testCanFetchCanonicalUrl()
    {
        $this->assertEquals($this->canonical, $this->munchitos->canonical());
    }

    /**
     * If the canonical URL isn't present, it
     * should return null.
     *
     * @return void
     */
    public function testReturnsNullOnEmptyCanonical()
    {
        $this->munchitos->html('<html></html>');
        $this->assertEquals(null, $this->munchitos->canonical());
    }
}
