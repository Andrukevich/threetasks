<?php



function getData($key, $default=null)
{
    return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
}


