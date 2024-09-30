<?php

class App
{
    public function __construct()
    {
        $url = $this->parse_URL();
        var_dump($url);
    }

    public function parse_URL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
