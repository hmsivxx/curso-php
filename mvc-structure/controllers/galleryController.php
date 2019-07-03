<?php

class galleryController
{
    public function index()
    {
        echo "Gallery page";
    }

    public function open($id, $name)
    {
        echo "Opening gallery: ".$id.". Mr ".$name.".";
    }
}
