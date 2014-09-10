<?php

/**
 * Request.php
 *
 * @author      Thomas Muntaner
 * @version     1.0.0
 */

namespace Philasearch\Curl;

/**
 * Class PostRequest
 *
 * This class acts as a base for all requests
 *
 * @package Philasearch\Curl
 */

class Request
{
    protected $handle;

    /**
     * Initalizes a request
     * 
     * @param  string $url
     * 
     * @return null
     */
    public function init ( $url )
    {
        $this->handle = curl_init( $url );
    }

    /**
     * Sets a request option
     * 
     * @param string $name
     * @param string $value
     *
     * @return null
     */
    public function setOption ( $name, $value )
    {
        curl_setopt( $this->handle, $name, $value );
    }

    /**
     * Sets multiple options for a request
     * 
     * @param array $options
     *        - string -> string
     */
    public function setOptions ( $options=[] )
    {
        foreach ( $options as $key => $value )
            $this->setOption($key,$value);
    }

    /**
     * Executes a request
     * 
     * @param  array $opts
     * 
     * @return json or string
     */
    public function execute ( $opts = [] )
    {
        return ( array_key_exists('json_depth', $opts) ) ? json_decode( $this->exec(), $opts['json_depth'] ) : $this->exec();
    }

    /**
     * Gets the information for a curl
     * request
     * 
     * @param  string $name
     * 
     * @return string
     */
    public function getInfo ( $name )
    {
        return curl_getinfo( $this->handle, $name );
    }

    /**
     * Closes a curl connection
     * 
     * @return null
     */
    public function close ()
    {
        curl_close( $this->handle );
    }

    /**
     * Executes a request
     * 
     * @return string
     */
    protected function exec ()
    {
        return curl_exec( $this->handle );
    }
}
