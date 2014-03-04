<?php

/**
 * This file is part of the Munchitos Package,
 * please see LICENSE file for further information.
 *
 * Copyright 2014 Ricardo Cruz <ricardo@rcruz.es>
 */

namespace PiradoIV\Munchitos\Test;

use PiradoIV\Munchitos\Munchitos;

class HtmlTest extends TestCase
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
     * Tests we can use ->html($html) method as
     * getter and setter.
     *
     * @return void
     */
    public function testCanUseHtmlAlias()
    {
        $this->munchitos->html($this->html);
        $this->assertEquals($this->html, $this->munchitos->html());
    }
}
