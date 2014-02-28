<?php

/**
 * This file is part of the Munchitos Package,
 * please see LICENSE file for further information.
 *
 * Copyright 2014 Ricardo Cruz <ricardo@rcruz.es>
 */

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class CharsetTest extends TestCase
{
    /**
     * Prepares the default values for every
     * test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->munchitos = new Munchitos;
    }

    /**
     * Tests if the library can fetch the charset
     * from meta charset.
     *
     * @return void
     */
    public function testCanFetchCharsetFromMetaCharset()
    {
        $html = <<<HTML
<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
  </head>
</html>
HTML;
        $this->munchitos->html($html);

        $this->assertEquals('utf-8', $this->munchitos->charset());
    }

    /**
     * Tests if the library can fetch the charset
     * from the content type.
     *
     * @return void
     */
    public function testCanFetchCharsetFromContentType()
    {
        $html = <<<HTML
<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  </head>
</html>
HTML;
        $this->munchitos->html($html);
        $this->assertEquals('iso-8859-1', $this->munchitos->charset());
    }

    /**
     * Library should return null if it can't
     * find the charset. Don't throw Exception.
     *
     * @return void
     */
    public function testReturnsNullIfCantFindCharset()
    {
        $this->munchitos->html('<html><body>Empty HTML!</body></html>');
        $this->assertEquals(null, $this->munchitos->charset());
    }
}
