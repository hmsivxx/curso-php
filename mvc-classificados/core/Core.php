<?php

//   mywebsite.com/controller/action/parameters/parameters/parameters/parameters....

class Core
{
    public function run()
    {
        $url = '/';
        $params = [];
        if (isset($_GET['url'])) {
            $url .= strtolower($_GET['url']);
        }

        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0].'Controller';
            array_shift($url);

            if (isset($url[0]) && $url[0] != '/') {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if (count($url) > 0) {
                $params = $url;
            }

        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }


        $controller = new $currentController();

        call_user_func_array([$controller, $currentAction], $params);
    }
}
