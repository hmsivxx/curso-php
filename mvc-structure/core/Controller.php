<?php

class Controller
{
    public function loadView($viewName, $viewData = [])
    {
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
}
