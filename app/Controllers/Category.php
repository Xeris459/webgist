<?php
namespace App\Controllers;

use \App\Controllers\BaseController;
use \App\Models\Category_model;

class Category extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->controller = 'category';
    }

    public function index()
    {
        $Category_model = new Category_model();
        $category       = $Category_model->findAll();

        $data = [
            'title'     => 'category Management || ' . TITLE,
            'titleH'    => 'category Management',
            'page'      => 'category',
            'category'  => $category
        ];

        return view('pages/category', $data);
    }
}

/* file location: app\Controllers\category.php */
/* Snipped by Xeris459 */