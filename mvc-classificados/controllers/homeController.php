<?php

class homeController extends Controller
{

    public function index()
    {
        
        $off = new Offer();
        $users = new User();
        $cat = new Category();

        $filters = [
            'category'  => '',
            'price'     => '',
            'condition' => ''
        ];

        if (isset($_GET['filters'])) {
            $filters = $_GET['filters'];
        }

        $categories = $cat->getList();
        $totalOffers = $off->getTotalOffers($filters);
        $totalUsers = $users->getTotalUsers();

        $page = 1;
        $perPage = 3;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $page = addslashes($_GET['page']);
        }

        $totalPages = ceil($totalOffers / $perPage);
        $offers = $off->getLastOffers($page, $perPage, $filters);

        $data = [
            'categories'  => $categories,
            'totalOffers' => $totalOffers,
            'totalUsers'  => $totalUsers,
            'totalPages'  => $totalPages,
            'offers'      => $offers,
            'page'        => $offers,
            'filters'     => $filters
        ];

        $this->loadTemplate('home', $data);
    }

}
