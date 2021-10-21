<?php
namespace App\Controllers;

use \App\Controllers\BaseController;

class Home extends BaseController
{
    protected $path = 'public/assets/';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->controller = 'home';
    }

    public function index()
    {
        $data = [
            'title'     => 'Dashboard || ' . TITLE,
            'titleH'    => 'Dashboard',
            'page'      => 'dashboard',
        ];

        return view('pages/dashboard', $data);
    }
}

/* file location: app\Controllers\ADMIN\Home.php */
/* Snipped by Xeris459 */