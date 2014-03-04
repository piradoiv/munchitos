<?php

/**
 * This file is part of the Munchitos Package,
 * please see LICENSE file for further information.
 *
 * Copyright 2014 Ricardo Cruz <ricardo@rcruz.es>
 */

namespace PiradoIV\Munchitos;

use \webignition\AbsoluteUrlDeriver\AbsoluteUrlDeriver;

class Link
{
    protected $node;
    protected $url;

    /**
     * Creates a new Link instance.
     *
     * @param DOMNode $node A DOMNode instance.
     *
     * @return void
     */
    public function __construct($node, $url = null)
    {
        $this->node = $node;
        $this->url  = $url;
    }

    /**
     * Returns the URL where the link goes.
     *
     * @return String The linked URL.
     */
    public function href()
    {
        $url = $this->node->attr('href');

        if ($this->url) {
            $deriver = new AbsoluteUrlDeriver;
            $deriver->init($url, $this->url);
            $url = $deriver->getAbsoluteUrl();
        }

        return $url;
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
