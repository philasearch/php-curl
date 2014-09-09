<?php

namespace Philasearch\Curl;

class PostRequest extends Request
{
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