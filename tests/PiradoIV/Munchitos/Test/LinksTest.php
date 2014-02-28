<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class LinksTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->html = <<<HTML
<!doctype html>
<html>
  <body>
    <p>This is an example of <a href="http://www.example.org/" target="_blank">a link</a></p>
    <p>This is <a href="internal-page.html">another link</a>.
  </body>
</html>
HTML;

        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    public function testCanFetchLinks()
    {
        $links = $this->munchitos->links();
        $this->assertEquals(2, count($links));
    }

    public function testLinksCanExtractHref()
    {
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $this->assertGreaterThan(0, strlen($link->href()));
        }
    }

    public function testLinksCanExtractTitle()
    {
        $this->munchitos->html('<a href="#" title="Testing">Testing Title</a>');
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $this->assertEquals('Testing', $link->title());
        }
    }

    public function testLinksCanExtractTarget()
    {
        $this->munchitos->html('<a href="#" target="_blank">Blank target</a>');
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $this->assertEquals('_blank', $link->target());
        }
    }

    public function testLinksDetectsNofollow()
    {
        $this->munchitos->html('<a href="#" rel="nofollow">No followed link</a>');
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $this->assertTrue($link->isNoFollow());
            $this->assertFalse($link->isFollow());
            $this->assertFalse($link->isFollowed());
        }
    }
}
