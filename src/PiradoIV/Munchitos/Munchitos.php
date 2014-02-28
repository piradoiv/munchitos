<?php

namespace PiradoIV\Munchitos;

class Munchitos
{
    protected $html;

    /**
     * Create a new Munchitos Instance
     */
    public function __construct()
    {
    }

    /**
     * Sets the HTML contents.
     *
     * @param String $html The HTML to use.
     *
     * @return void
     */
    public function setHtml($html = null)
    {
        $this->html = $html;
    }

    /**
     * Returns the stored HTML.
     *
     * @return String The HTML.
     */
    public function getHtml()
    {
        return $this->html;
    }
}
