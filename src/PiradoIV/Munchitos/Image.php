<?php

namespace PiradoIV\Munchitos;

class Image
{
    protected $node;

    /**
     * Creates a new Image instance.
     *
     * @param DOMNode $node A DOMNode instance.
     *
     * @return void
     */
    public function __construct($node)
    {
        $this->node = $node;
    }
}
