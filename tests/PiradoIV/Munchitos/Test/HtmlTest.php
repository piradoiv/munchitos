<?php

namespace PiradoIV\Munchitos\Test;

use PiradoIV\Munchitos\Munchitos;

class HtmlTest extends \PHPUnit_Framework_TestCase
{
    protected $html;

    public function setUp()
    {
        parent::setUp();
        $this->html = '<html><body>Hello World!</body></html>';
    }

    public function testCanAddAndGetHtml()
    {
        $munchitos = new \PiradoIV\Munchitos\Munchitos;
        $munchitos->setHtml($this->html);

        $this->assertEquals($this->html, $munchitos->getHtml());
    }
}
