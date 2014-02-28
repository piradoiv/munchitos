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

    public function setHtml($html = null)
    {
        $this->html = $html;
    }

    public function getHtml()
    {
        return $this->html;
    }
}
