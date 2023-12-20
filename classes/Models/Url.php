<?php

namespace Models;

class Url
{
    private $original;
    private $short;

    public function setOriginal($value)
    {
        $this->original = $value;
    }

    public function setShort($value)
    {
        $this->short = $value;
    }

    public function getOriginal()
    {
        return $this->original;
    }

    public function getShort()
    {
        return $this->short;
    }

    public function save()
    {
        if (empty($this->original) || empty($this->short))
            return false;

        db()->insertUrls($this->original, $this->short);
        return true;
    }
}