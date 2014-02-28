<?php

namespace PiradoIV\Munchitos;

use \Symfony\Component\DomCrawler\Crawler;

class Munchitos
{
    protected $html;
    protected $crawler;

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
        $this->crawler()->addHtmlContent($this->html);
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

    public function crawler()
    {
        if (!$this->crawler) {
            $this->crawler = new Crawler;
        }

        return $this->crawler;
    }

    public function title()
    {
        $title = $this->crawler()->filter('title')->text();
        return $title;
    }
}
