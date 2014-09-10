<?php

/**
 * GetRequest.php
 *
 * @author      Thomas Muntaner
 * @version     1.0.0
 */

namespace Philasearch\Curl;

/**
 * Class GetRequest
 *
 * This class uses the PHP curl function to make a get
 * request to a server
 *
 * @package Philasearch\Curl
 */

class GetRequest extends Request
{
    /**
     * Sets up a get request
     * 
     * @param  string $url
     * @param  array $params
     * 
     * @return null
     */
    public function get ( $url, $params=[] )
    {
        $param_string   = $this->buildParamString( $params );
        $url            = $url . $param_string;

        $this->init( $url );

        $options = [
            CURLOPT_FAILONERROR     => true,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_USERAGENT       => 'fake'
        ];

        $this->setOptions( $options );
    }

    /**
     * Builds a param string
     * 
     * @param  array $params
     * 
     * @return string
     */
    private function buildParamString ( $params )
    {
        $param_string = "?";

        foreach ( $params as $key => $value )
            $param_string .= $key . "=" . $value . "&";

        return $param_string;
    }
}
