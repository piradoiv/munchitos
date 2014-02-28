<?php

namespace PiradoIV\Munchitos\Test;

use \PiradoIV\Munchitos\Munchitos;

class LinksTest extends TestCase
{
    /**
     * Prepares the data shared with all of
     * the tests.
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
    <p>
      This is an example of
      <a href="http://www.example.org/" target="_blank">
        a link
      </a>
    </p>
    <p>This is <a href="internal-page.html">another link</a>.
  </body>
</html>
HTML;

        $this->munchitos = new Munchitos;
        $this->munchitos->html($this->html);
    }

    /**
     * Test if the library can get an array
     * of links.
     *
     * @return void
     */
    public function testCanFetchLinks()
    {
        $links = $this->munchitos->links();
        $this->assertEquals(2, count($links));
    }

    /**
     * Tests if the library can extract the
     * href attribute from the links.
     *
     * @return void
     */
    public function testLinksCanExtractHref()
    {
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $this->assertGreaterThan(0, strlen($link->href()));
        }
    }

    /**
     * Tests if the library can extract the
     * title attribute from the link.
     *
     * @return void
     */
    public function testLinksCanExtractTitle()
    {
        $this->munchitos->html('<a href="#" title="Testing">Testing Title</a>');
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $this->assertEquals('Testing', $link->title());
        }
    }

    /**
     * Tests if the library can extract the
     * target attribute from the link.
     *
     * @return void
     */
    public function testLinksCanExtractTarget()
    {
        $this->munchitos->html('<a href="#" target="_blank">Blank target</a>');
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $this->assertEquals('_blank', $link->target());
        }
    }

    /**
     * Tests if the library can detect if a link
     * is followed or not.
     *
     * @return void
     */
    public function testLinksDetectsNofollow()
    {
        $this->munchitos->html('<a href="#" rel="NoFollow">No followed link</a>');
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $this->assertTrue($link->isNoFollow());
            $this->assertFalse($link->isFollow());
            $this->assertFalse($link->isFollowed());
        }
    }

    /**
     * Ensures the Link object doesn't fails
     * on unexpected empty anchors.
     *
     * @return void
     */
    public function testDoesntFailsOnEmptyLinks()
    {
        $html = <<<HTML
<!doctype html>
<html>
  <body>
    <a name="#" />
    <a href="www.example.org">Second link</a>
  </body>
</html>
HTML;
        $this->munchitos->html($html);
        $links = $this->munchitos->links();
        foreach ($links as $link) {
            $link->title();
            $link->href();
            $link->target();
            $link->isNoFollow();
        }

        $this->assertEquals(2, count($links));
    }
}
