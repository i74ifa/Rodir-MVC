<?php


class Route
{
    public static function get($pattern, $callback)
    {
        self::map(['GET'], $pattern, $callback);
    }
    public static function post($pattern, $callback, $require_ajax = false)
    {
        self::map(['POST'], $pattern, $callback);
    }
    public static function put($pattern, $callback)
    {
        self::map(['PUT'], $pattern, $callback);
    }
    public static function delete($pattern, $callback)
    {
        self::map(['DELETE'], $pattern, $callback);
    }
    public static function patch($pattern, $callback)
    {
        self::map(['PATCH'], $pattern, $callback);
    }
    public static function options($pattern, $callback)
    {
        self::map(['OPTIONS'], $pattern, $callback);
    }
    public static function Ajax($pattern, $callback)
    {
        self::map(['AJAX'], $pattern, $callback);
    }
    public static function any($pattern, $callback)
    {
        self::map(['GET','POST','PUT','DELETE','PATCH','OPTIONS','AJAX','ANY'], $pattern, $callback);
    }

    public static function map($matches, $pattern, $callback, $require_ajax = false)
    {
        if (!in_array(strtoupper($_SERVER['REQUEST_METHOD']), $matches)) {
            return;
        }
        //if ($require_ajax && strtoupper($_SERVER['HTTP_X_REQUESTED_BY'] != 'XMLHTTPREQUEST')) {
        //    return;
        //}

        $pattern_regex = preg_replace("/\{(.*?)\}/", "(?P<$1>[\w-]+)", $pattern);
        $pattern_regex = "#^" . trim($pattern_regex, '/') . "$#";


        preg_match($pattern_regex, trim($_SERVER['REQUEST_URI'], "/"), $matches);
        if ($matches && is_callable($callback)) {

            call_user_func($callback, (object) $matches);
        }
    }
}
