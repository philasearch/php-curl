<?php

/**
 * PostRequest.php
 *
 * @author      Thomas Muntaner
 * @version     1.0.0
 */

namespace Philasearch\Curl;

/**
 * Class PostRequest
 *
 * This class uses the PHP curl function to make a post
 * request to a server
 *
 * @package Philasearch\Curl
 */

class PostRequest extends Request
{
    /**
     * Sets up a post request
     * 
     * @param  string $url
     * @param  array $fields
     * 
     * @return null
     */
    public function post ( $url, $fields=[] )
    {
        $this->init( $url );

        $options = [
            CURLOPT_FAILONERROR     => true,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_USERAGENT       => 'fake',
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => $fields,
        ];

        $this->setOptions( $options );
    }
}
