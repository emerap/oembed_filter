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
- Cacoo (https://cacoo.com)
- ChartBlocks (http://www.chartblocks.com)
- CircuitLab (https://www.circuitlab.com)
- Clyp (http://clyp.it)
- Codepen (https://codepen.io)
- Codepoints (https://codepoints.net)
- CollegeHumor (http://www.collegehumor.com)
- Coub (http://coub.com)
- Daily Mile (http://www.dailymile.com)
- Dailymotion (http://www.dailymotion.com)
- Deviantart.com (http://www.deviantart.com)
- Didacte (https://www.didacte.com)
- Dipity (http://www.dipity.com)
- Docs (https://www.docs.com)
- Dotsub (http://dotsub.com)
- EgliseInfo (http://egliseinfo.catholique.fr)
- Flickr (http://www.flickr.com)
- FunnyOrDie (http://www.funnyordie.com)
- Geograph Britain and Ireland (https://www.geograph.org.uk)
- Instagram (https://instagram.com)
- Kickstarter (http://www.kickstarter.com)
- MathEmbed (http://mathembed.com)
- MixCloud (http://mixcloud.com)
- SoundCloud (http://soundcloud.com)
- Ted (http://ted.com)
- Vimeo (https://vimeo.com)
- Vine (https://vine.co)
- YouTube (http://www.youtube.com)

## Links

- oEmbed official page - (http://oembed.com)
- Emerap community - (https://vk.com/emerap)

## Credits
- [Alexander Pokhodyun](https://vk.com/karbunkul) - Developer

Copyright &copy; 2016 Alexander Pokhodyun
