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
}
