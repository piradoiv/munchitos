<?php

namespace PiradoIV\Munchitos;

class Link
{
    protected $node;

    public function __construct($node)
    {
        $this->node = $node;
    }

    public function href()
    {
        return $this->node->attr('href');
    }

    public function title()
    {
        return $this->node->attr('title');
    }

    public function target()
    {
        return $this->node->attr('target');
    }

    public function isNoFollow()
    {
        return strtolower($this->node->attr('rel')) == 'nofollow';
    }

    public function isFollow()
    {
        return !$this->isNoFollow();
    }

    public function isFollowed()
    {
        return $this->isFollow();
    }
}
