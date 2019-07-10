<?php

class homeController extends Controller
{

    public function index()
    {
        $offers = new Offers();
        $user = new User('Hermes');
        
        $data = [
            'offersQuantity'  => $offers->getQuantity(),
            'name'            => $user->getName(),
            'todayTotalSales' => $offers->getTotalSales()
        ];
        $this->loadTemplate('home', $data);
    }

}
