<?php

namespace RubyRainbows\Curl;

class Request
{
    protected $handle;

    public function __construct($url)
    {
        $this->handle = curl_init($url);
    }

    public function setOption($name, $value) {
        curl_setopt($this->handle, $name, $value);
    }

    public function setOptions($options=[])
    {
        foreach ($options as $key => $value)
        {
            $this->setOption($key,$value);
        }
    }

    public function execute()
    {
        return curl_exec($this->handle);
    }

    public function getInfo($name)
    {
        return curl_getinfo($this->handle, $name);
    }

    public function close()
    {
        curl_close($this->handle);
    }


}