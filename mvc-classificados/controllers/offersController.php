<?php
class offersController extends Controller
{

    public function index()
    {
        $off = new Offer();
        $offers = $off->getMyOffers();
        $data = [];

        $data = [
            'url' => [],
            'title' => [],
            'price' => [],
            'id' => []
        ];

        foreach ($offers as $offer) {
            if (!$offer['url']) {
                array_push($data['url'], "no-image-icon.png");
            } else {
                array_push($data['url'], $offer['url']);
            } 
            array_push($data['title'], $offer['title']);
            array_push($data['price'], $offer['price']);
            array_push($data['id'], $offer['id']);
        }

        $this->loadTemplate('offers', $data);
    }
}
