<?php

namespace PiradoIV\Munchitos;

class Link
{
    protected $node;

    /**
     * Creates a new Link instance.
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
     * Returns the URL where the link goes.
     *
     * @return String The linked URL.
     */
    public function href()
    {
        return $this->node->attr('href');
    }

    /**
     * Returns the title of the link, if any.
     *
     * @return String Link title.
     */
    public function title()
    {
        return $this->node->attr('title');
    }

    /**
     * Returns the value for the target of the link.
     *
     * @return String link target.
     */
    public function target()
    {
        return $this->node->attr('target');
    }

    /**
     * Checks if a link has the "nofollow"
     * attribute.
     *
     * @return Boolean True if is nofollow, False otherwise.
     */
    public function isNoFollow()
    {
        return strtolower($this->node->attr('rel')) == 'nofollow';
    }

    /**
     * The opposite of isNoFollow()
     *
     * @return Boolean The opposite of isNoFollow().
     */
    public function isFollow()
    {
        return !$this->isNoFollow();
    }

    /**
     * An alias for isFollow() method.
     *
     * @return Boolean The same as isFollow() method.
     */
    public function isFollowed()
    {
        return $this->isFollow();
    }
}
