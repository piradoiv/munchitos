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

    /**
     * Extracts the alt text tag contents.
     *
     * @return String The alternative text of the image.
     */
    public function altText()
    {
        return $this->node->attr('alt');
    }

    /**
     * An alias for altText() method.
     *
     * @return String Same as altText() method.
     */
    public function alt()
    {
        return $this->altText();
    }

    /**
     * Extracts the image source URL.
     *
     * @return String The URL.
     */
    public function src()
    {
        return $this->node->attr('src');
    }
}
