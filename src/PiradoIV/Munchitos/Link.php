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
}
