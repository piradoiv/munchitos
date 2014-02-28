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
        $this->munchitos = new Munchitos;
    }

    /**
     * Proves we can add and get the HTML
     * on Munchitos.
     *
     * @return void
     */
    public function testCanAddAndGetHtml()
    {
        $this->munchitos->setHtml($this->html);
        $this->assertEquals($this->html, $this->munchitos->getHtml());
    }

    public function testCanUseHtmlAlias()
    {
        $this->munchitos->html($this->html);
        $this->assertEquals($this->html, $this->munchitos->getHtml());
        $this->assertEquals($this->html, $this->munchitos->html());
    }
}
