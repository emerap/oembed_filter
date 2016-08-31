# Emerap oEmbed Filter library

## Synopsis

Replacement oEmbed service link to different types of content.

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
- amCharts Live Editor (http://live.amcharts.com)
- Animatron (https://www.animatron.com)
- Animoto (http://animoto.com)
- Blackfire.io (https://blackfire.io)
- Codepen (https://codepen.io)
- Coub (http://coub.com)
- Instagram (https://instagram.com)
- SoundCloud (http://soundcloud.com)
- Vimeo (https://vimeo.com)
- YouTube (http://www.youtube.com)

## Links

- oEmbed official page - (http://oembed.com)
- Emerap community - (https://vk.com/emerap)

## Credits
- [Alexander Pokhodyun](https://vk.com/karbunkul) - Developer

Copyright &copy; 2016 Alexander Pokhodyun
