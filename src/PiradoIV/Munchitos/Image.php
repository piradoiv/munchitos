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

    public function altText()
    {
        return $this->node->attr('alt');
    }

    public function alt()
    {
        return $this->altText();
    }
}
