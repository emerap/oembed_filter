# Emerap oEmbed Filter library

## Synopsis

Replacement oembed service link to different types of content.

## Features

- Get oembed service response and parse them to array
- Parse text, find urls, find services to process url
- Implement API endpoint
- Implement API multiple schemes
- Customization html wrapper

## Basic usage

```
use Emerap\OembedFilter\OembedFilter;

....

// Create instance with constructor parameter.
$filter = new OembedFilter('any text with link');

// Apply oembed filter to source text.
$str = $filter->apply();
```

## Supported oEmbed services

- 23HQ (http://www.23hq.com)
- Alpha App Net (https://alpha.app.net/browse/posts)
- Codepen (https://codepen.io)
- SoundCloud (http://soundcloud.com)
- Vimeo (https://vimeo.com)
- YouTube (http://www.youtube.com)

## Links

- oEmbed official page - (http://oembed.com)
- Emerap community - (https://vk.com/emerap)

## Credits
- Alexander Pokhodyun - Developer

Copyright &copy; 2016 [ [Pokhodyun Alexander](https://vk.com/karbunkul)]
