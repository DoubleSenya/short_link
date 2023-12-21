<?php

namespace Linker;

class ShortLinker
{

    private $key = 'qwertyuiopasdfghjklzxcvbnm1234567890';

    public function make()
    {
        $count = strlen($this->key);

        $intval = time();

        $result = '';
        for($i = 0; $i < 4; $i++) {
            $last = $intval % $count;
            $intval = ($intval - $last) / $count;
            $result .= $this->key[$last];
        }

        return $result;
    }
}