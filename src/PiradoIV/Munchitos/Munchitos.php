<?php

/**
 * This file is part of the Munchitos Package,
 * please see LICENSE file for further information.
 *
 * Copyright 2014 Ricardo Cruz <ricardo@rcruz.es>
 */

namespace PiradoIV\Munchitos;

use \Symfony\Component\DomCrawler\Crawler;

class Munchitos
{
    protected $html;
    protected $crawler;
    protected $url;

    /**
     * Sets or gets the Html string, If $html
     * is set, it will store the html.
     *
     * @param String $html Stores the HTML.
     *
     * @return String The stored HTML.
     */
    public function html($html = null)
    {
        if ($html) {
            $this->html = $html;
            $this->crawler()->clear();
            $this->crawler()->addHtmlContent($this->html);
        }

        return $this->html;
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
                ->filter('head link[rel="canonical"]')
                ->attr('href');

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

    /**
     * Sets the URL were the HTML was downloaded.
     *
     * @return String The URL.
     */
    public function url($url = null)
    {
        if ($url) {
            $this->url = $url;
        }

        return $this->url;
    }

    /**
     * Returns an array of Link objects.
     *
     * @return Array The array.
     */
    public function links()
    {
        $links = array();
        $baseUrl = $this->url();
        $this->crawler()->filter('a')->each(
            function ($node) use (&$links, $baseUrl) {
                $link = new Link($node, $baseUrl);
                $links[] = $link;
            }
        );

        return $links;
    }

    /**
     * Returns an array of Image objects.
     *
     * @return Array The array.
     */
    public function images()
    {
        $images = array();
        $this->crawler()->filter('img')->each(
            function ($node) use (&$images) {
                $image = new Image($node);
                $images[] = $image;
            }
        );

        return $images;
    }
}
