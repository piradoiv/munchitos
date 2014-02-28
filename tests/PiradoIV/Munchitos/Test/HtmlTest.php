<?php

namespace PiradoIV\Munchitos\Test;

use PiradoIV\Munchitos\Munchitos;

class HtmlTest extends \PHPUnit_Framework_TestCase
{
    protected $html;

    /**
     * Configure every inner test with the same
     * structure.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html = '<html><body>Hello World!</body></html>';
    }

    /**
     * Proves we can add and get the HTML
     * on Munchitos.
     *
     * @return void
     */
    public function testCanAddAndGetHtml()
    {
        $munchitos = new \PiradoIV\Munchitos\Munchitos;
        $munchitos->setHtml($this->html);

        $this->assertEquals($this->html, $munchitos->getHtml());
    }
}
