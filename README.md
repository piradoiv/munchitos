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
- Works with relative URL routes on links, images,
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

## How to use

...

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
