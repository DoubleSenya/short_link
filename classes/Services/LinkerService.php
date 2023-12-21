<?php

namespace Services;

use Linker\ShortLinker;
use Models\Url;

class LinkerService
{
    public function handle($link)
    {
        $linker = new ShortLinker($link);
        $shortLink = $linker->make();

        $url = new Url();
        $url->setOriginal($link);
        $url->setShort($shortLink);
        $url->save();

        return $shortLink;
    }
}