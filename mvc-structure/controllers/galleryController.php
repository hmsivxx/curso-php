<?php

class galleryController extends Controller
{
    public function index()
    {
        $data = [
            'photos'  => 710,
        ];
        $this->loadTemplate('gallery', $data);
    }

    public function open($id, $name)
    {
        echo "Opening gallery: ".$id.". Mr ".$name.".";
    }
}
