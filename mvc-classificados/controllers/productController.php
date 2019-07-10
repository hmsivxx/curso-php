<?php
class productController extends Controller
{

    public function index()
    {
        echo "index";
    }

    public function open($id)
    {
        $off = new Offer();
        $usr = new User();
        $data = [];


        $data = $off->getOffer($id);
        $data['user'] = $usr->getUser((int)$data['id_user']);

        $this->loadTemplate('product', $data);
    }
}