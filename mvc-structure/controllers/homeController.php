<?php

class homeController extends Controller
{

    public function index()
    {
        $data = [
            'offersQuantity'  => 420,
            'name'            => 'Jhon',
            'todayTotalSales' => 42
        ];
        $this->loadTemplate('home', $data);
    }

}
