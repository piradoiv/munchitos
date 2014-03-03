# Munchitos

This library aims to make developer's life easier
while trying to parse the HTML contents.

## Features
At the moment, Munchitos currently have these features:

- Returns the title of the page.
- Extract Links and Images from the contents.
- Detects meta description.
- Gives the canonical URL, if present.
- List every linked stylesheet.
- Detects the charset encoding.

In the future, Munchitos aims to support:

- Semantic microformat.
- Work with relative URL routes on links, images,
stylesheets, etc.

## How to install

Composer is the easier way, just add the library
to the dependancies:

    require {
      "piradoiv/munchitos": "dev-master"
    }

Remember to call **composer install** or **composer
update** after adding composer.json file. There are
loads of information about setting up
[http://getcomposer.org](Composer) on your project.

Munchitos goal isn't to download the HTML itself, so
I recommend to also install a cURL wrapper, like
[https://packagist.org/packages/shuber/curl](shuber/curl).

## How to use

    <?php
    // First you'll have to load composer and create
    // a Munchitos instance.
    require 'vendor/autoload.php';
    $munchitos = new PiradoIV\Munchitos\Munchitos;

    // Fill it with the HTML
    $html = '<html><body><p>Hello World!</p></body></html>';
    $munchitos->html($html);

    // And start calling any information you need.
    echo $munchitos->title();

### $munchitos->title()
Returns the title of the page, trimming the spaces.

### $munchitos->description()
If there is any meta description tag, it returns its contents.

### $munchitos->canonical()
Some websites specifies a [https://support.google.com/webmasters/answer/139394?hl=en](canonical URL), there you go.

### $munchitos->stylesheets()
Returns a list (if any) of stylesheets urls used
on current HTML.

### $munchitos->charset()
Searchs for the charset tag and returns it content.

### $munchitos->links()
Returns an array of Link instances. Link class contains
these helpful methods:

- href()
- title()
- target()
- isNoFollow() / isFollow()

### $munchitos->images()
Returns an array of Image instances. Like with Link class,
it includes some methods:

- altText() or alt()
- src()
- isLinked()

## Acknowledges

I want to thank the Open Source community, specially
Composer guys, Symfony libraries and the PHP League
for their project template.

## Contribute

Simply send a pull request, but please ensure your
code doesn't breaks the tests and it's written
with the PSR-2 coding style.

## Contact

I'm [http://twitter.com/piradoiv/](@PiradoIV) on
Twitter, give me a shout if you need a hand with
this library.
