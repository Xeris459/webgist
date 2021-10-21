<?php
namespace App\Controllers;

use \App\Controllers\BaseController;
use \App\Models\Group_role_model;

class User extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->controller = 'user';
    }

    public function index()
    {
        $Group_role_model   = new Group_role_model();
        $roles  = $Group_role_model->whereNotIn('auth_groups.name', ['super admin', 'admin'])->select('name')->findAll();

        $data = [
            'title'     => 'user Management || ' . TITLE,
            'titleH'    => 'user Management',
            'page'      => 'user',
            'roles'     => $roles
        ];

        return view('pages/user', $data);
    }
}

/* file location: app\Controllers\user.php */
/* Snipped by Xeris459 */