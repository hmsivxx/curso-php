<?php
class notfoundController extends controller
{

    public function index()
    {
        $this->loadVoe('404', []);
    }
}