<?php
namespace App\Controllers;

use \App\Controllers\BaseController;
use \App\Models\Group_role_model;
use CodeIgniter\HTTP\RequestInterface;

class Admin extends BaseController
{
    protected $Admin_model, $db;
    protected $request;
    
    public function __construct()
    {
        $this->db          = \Config\Database::connect();
        $this->Admin_model = $this->db->table('users');
        $this->request     = service('request');
        $this->validation  = \Config\Services::validation();

    }
    
    public function index()
    {
        $Group_role_model   = new Group_role_model();
        $roles  = $Group_role_model->whereIn('auth_groups.name', ['super admin', 'admin'])->select('name')->findAll();

        $data = [
            'title'     => 'Admin Management || ' . TITLE,
            'titleH'    => 'Admin Management',
            'page'      => 'admin',
            'roles'     => $roles
        ];

        return view('pages/admin', $data);
    }

    public function save(){      
        if(!empty($this->request->getPost('submit'))){

            $rules = [
                        'name' => [
                            'rules' => 'required',
                        ],
                        'email' => [
                            'rules' => 'required|valid_email',
                        ],
                        'password' => [
                            'rules' => 'required|min_length[8]|strong_password',
                        ],
                        'repassword' => [
                            'rules' => 'required|matches[password]',
                        ],
                        'level' => [
                            'rules' => 'required',
                        ]

                    ];

            
            if($this->request->getMethod() == 'post'){
                
                if(!$this->validate($rules)){
                    $massage = $this->validation->getErrors();
    
                    session()->setFlashdata('error', $massage);
    
                    return redirect()->back();
                }
                
                $role = esc($this->request->getVar('level'));
                $data = [
                    'fullname'      => esc($this->request->getVar('name')),
                    'username'      => esc($this->request->getVar('name')),
                    'email'         => esc($this->request->getVar('email')),
                    'active'        => 1,
                    'password'      => esc($this->request->getVar('password')),
                ];
                $users = new \Myth\Auth\Entities\User($data);
                $model = new \Myth\Auth\Models\UserModel();
                
                $q = $model->withGroup($role)->save($users);
                
                if($q){
                    $massage = "Admin baru berhasil di tambah";
                    session()->setFlashdata('success', $massage);
    
                    return redirect()->back();
                } else {
                    $massage = $model->errors();
                    session()->setFlashdata('error', $massage);
    
                    return redirect()->back();
                }
            } else {
                $massage = "illegal method";
                session()->setFlashdata('error', $massage);
    
                return redirect()->back();
            }
        } else {
            $massage = "illegal method";
            session()->setFlashdata('error', $massage);

            return redirect()->back();
        }
    }

    public function change_password(){
        if($this->request->getMethod() == 'post'){
            $id   = (int) esc($this->request->getVar('id'));

            $rules = [
                'cpass' => [
                    'rules' => 'required|min_length[8]|strong_password',
                ],
                'cpass2' => [
                    'rules' => 'required|matches[cpass]',
                ]
            ];

            if(!$this->validate($rules)){
                $massage = $this->validation->getErrors();

                session()->setFlashdata('error', $massage);

                return redirect()->back();
            }

            $pass    = esc($this->request->getVar('cpass'));

            $data = [
                // 'password' => password_hash($pass, PASSWORD_DEFAULT),
                'password' => $pass,
                'id' => $id
            ];

            $users = new \Myth\Auth\Entities\User($data);
            $model = new \Myth\Auth\Models\UserModel();
            $q = $model->save($users);

            if($q){
                $massage = "password berhasil diubah";
                session()->setFlashdata('success', $massage);

                return redirect()->back();
            } else {
                $massage = "password tidak berhasil diubah";
                session()->setFlashdata('error', $massage);

                return redirect()->back();
            }
        } else {
            $massage = "illegal method";
            session()->setFlashdata('error', $massage);

            return redirect()->back();
        }
    }

    public function edit(){
        if(!empty($this->request->getPost('submit'))){

            $rules = [
                        'name' => [
                            'rules' => 'required',
                            'label' => 'full name'
                        ],
                        'email' => [
                            'rules' => 'required|valid_email',
                        ],
                        'level' => [
                            'rules' => 'required',
                        ]

                    ];

            
            if($this->request->getMethod() == 'post'){
                if(!$this->validate($rules)){
                    $massage = $this->validation->getErrors();
    
                    session()->setFlashdata('error', $massage);
    
                    return redirect()->back();
                }

                $role = $this->request->getVar('level');
                $data = [
                    'fullname'      => esc($this->request->getVar('name')),
                    'email'         => esc($this->request->getVar('email')),
                    'id'            => esc($this->request->getVar('id')),
                ];

                
                $model = new \Myth\Auth\Models\UserModel();
    
                $q = $model->withGroup($role)->save($data);
                
                if($q){
                    $massage = "Admin baru berhasil di ubah";
                    session()->setFlashdata('success', $massage);
    
                    return redirect()->back();
                } else {
                    $massage = "gagal mengubah admin";
                    session()->setFlashdata('error', $massage);
    
                    return redirect()->back();
                }
            }
        } else {
            $massage = "illegal method";
            session()->setFlashdata('error', $massage);

            return redirect()->back();
        }
    }

}