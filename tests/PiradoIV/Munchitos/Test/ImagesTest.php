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
}
