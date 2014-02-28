<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class CharsetTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->munchitos = new Munchitos;
    }

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
}
