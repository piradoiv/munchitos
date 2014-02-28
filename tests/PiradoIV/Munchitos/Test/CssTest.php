<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class CssTest extends TestCase
{
    public function setUp()
    {
        $this->html = <<<HTML
<!doctype html>
<html>
  <head>
    <link href='/fonts/entypo.css' rel='stylesheet' type='text/css' />
    <link href='css/app.css' rel="stylesheet" type="text/css" />
  </head>
</html>
HTML;

        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    /**
     * It should return an array of CSS URLs
     *
     * @return void
     */
    public function testCanFetchListOfStyleSheets()
    {
        $stylesheets = $this->munchitos->stylesheets();
        $this->assertEquals(2, count($stylesheets));
    }

    /**
     * It should return null if there aren't CSSs.
     *
     * @return void
     */
    public function testReturnNullOnEmpty()
    {
        $html = '<html><body>Empty HTML</body></html>';
        $this->munchitos->html($html);
        $stylesheets = $this->munchitos->stylesheets();
        $this->assertEquals(null, $stylesheets);
    }
}
