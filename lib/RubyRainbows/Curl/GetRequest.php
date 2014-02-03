<?php

namespace RubyRainbows\Curl;

class GetRequest extends Request
{
    public function __construct($url, $params=[])
    {
        $param_string   = $this->buildParamString($params);
        $url            = $url . $param_string;

        parent::__construct($url);

        $options = [
            CURLOPT_FAILONERROR     => true,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_USERAGENT       => 'fake'
        ];

        $this->setOptions($options);
    }

    private function buildParamString($params)
    {
        $param_string = "?";

        foreach ($params as $key => $value)
            $param_string .= $key . "=" . $value . "&";

        return $param_string;
    }
}