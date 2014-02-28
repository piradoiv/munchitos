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

    /**
     * Sets or gets the Html string, acts like
     * an alias. If $html is set, it will
     * store the html.
     *
     * @param String $html Stores the HTML.
     *
     * @return String The stored HTML.
     */
    public function html($html = null)
    {
        if ($html) {
            $this->setHtml($html);
        }

        return $this->getHtml();
    }
}
