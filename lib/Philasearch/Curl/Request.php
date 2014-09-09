<?php

namespace Philasearch\Curl;

class Request
{
    protected $handle;

    public function init ( $url )
    {
        $this->handle = curl_init( $url );
    }

    public function setOption ( $name, $value )
    {
        curl_setopt( $this->handle, $name, $value );
    }

    public function setOptions ( $options=[] )
    {
        foreach ( $options as $key => $value )
        {
            $this->setOption($key,$value);
        }
    }

    public function execute ( $opts = [] )
    {
        return ( array_key_exists('json_depth', $opts) ) ? json_decode( $this->exec(), $opts['json_depth'] ) : $this->exec();
    }

    public function getInfo ( $name )
    {
        return curl_getinfo( $this->handle, $name );
    }

    public function close ()
    {
        curl_close( $this->handle );
    }

    protected function exec ()
    {
        return curl_exec( $this->handle );
    }
}