<?php

class Controller
{

    public function loadTemplate($viewName, $viewData = [])
    {
        require 'views/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData = [])
    {
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }


}
