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
        $this->crawler()->clear();
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

    /**
     * Returns a singleton of the Symfony's
     * DomCrawler component.
     *
     * @return Crawler The DomCrawler.
     */
    public function crawler()
    {
        if (!$this->crawler) {
            $this->crawler = new Crawler;
        }

        return $this->crawler;
    }

    /**
     * Returns the title, trimming the spaces.
     *
     * @return String the Title.
     */
    public function title()
    {
        try {
            $title = $this->crawler()->filter('title')->text();
            $title = trim($title);
            return $title;
        } catch (\InvalidArgumentException $exception) {
            return null;
        }
    }

    /**
     * If present, returns the description value.
     *
     * @return String The description of the page.
     */
    public function description()
    {
        try {
            $title = $this->crawler()
                ->filter('meta[name="description"]')
                ->attr('value');

            return $title;
        } catch (\InvalidArgumentException $exception) {
            return null;
        }
    }

    /**
     * Returns the canonical URL, if present,
     * returns null otherwise.
     *
     * @return String The Canonical URL.
     */
    public function canonical()
    {
        try {
            $canonical = $this->crawler()
                ->filter('head link[rel="canonical"]')->attr('href');

            return $canonical;
        } catch (\InvalidArgumentException $exception) {
            return null;
        }
    }

    /**
     * Returns a list (if any) of stylesheets
     * urls used on current HTML.
     *
     * @return Array The stylesheets URLs array.
     */
    public function stylesheets()
    {
        $stylesheets = array();
        $filter = 'head link[rel=stylesheet]';
        $this->crawler()
            ->filter($filter)
            ->each(
                function ($node) use (&$stylesheets) {
                    $stylesheets[] = $node->attr('href');
                }
            );

        if (empty($stylesheets)) {
            return null;
        }

        return $stylesheets;
    }

    /**
     * Tries to find the charset of the document,
     * if specified.
     *
     * @return String The charset.
     */
    public function charset()
    {
        try {
            $charset = $this->crawler()
                ->filter('head meta[charset]')
                ->attr('charset');
            return $charset;
        } catch (\InvalidArgumentException $exception) {
            // Just continues.
        }

        try {
            $content = $this->crawler()
                ->filter('head meta[http-equiv]')
                ->attr('content');

            $needle = 'charset=';
            $position = strpos($content, $needle);
            $charset = substr($content, $position + strlen($needle));

            return $charset;
        } catch (\InvalidArgumentException $exception) {
            // Just continues.
        }

        return null;
    }

    public function links()
    {
        $links = array();
        $this->crawler()->filter('a')->each(
            function ($node) use (&$links) {
                $link = new Link($node);
                $links[] = $link;
            }
        );

        return $links;
    }
}
