<?php

namespace PubNub;


class PubNubUtil
{
    /**
     * @param string $basePath generated by BasePathManager
     * @param string $path
     * @param array $params query elements
     * @return string url
     */
    public static function buildUrl($basePath, $path, $params)
    {
        return $basePath . $path . "?" . http_build_query($params);
    }

    public static function urlWrite($value)
    {
        return static::urlEncode(static::writeValueAsString($value));
    }

    public static function urlEncode($value)
    {
        return rawurlencode($value);
    }

    public static function writeValueAsString($value)
    {
        try {
            if (gettype($value) == 'string') {
                return "\"" . $value . "\"";
            } else {
                return json_encode($value);
            }
        } catch (\Exception $e) {
            return $value;
        }
    }
}