<?php

namespace RubyRainbows\Curl;

class PostRequest extends Request
{
    public function __construct($url, $fields=[])
    {
        parent::__construct($url);

        $options = [
            CURLOPT_FAILONERROR     => true,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_USERAGENT       => 'fake',
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => $fields,
        ];

        $this->setOptions($options);

        $out = $this->execute();
        $this->close();

        return $out;
    }
}