<?php
namespace App\Controllers\Api;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Irsyadulibad\DataTables\DataTables;
 
class User extends ResourceController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        if($this->request->isAJAX()){
            return DataTables::use('users')->orWhere(['auth_groups.name !='=>'admin'])->Where(['auth_groups.name !='=>'super admin'])
            ->select('users.id as admin_id, fullname, email, auth_groups.name as role, created_at')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
            ->addColumn('action', function($data) {
                return "
                    <div class='input-group'>
                        <span class='input-group-btn'>
                            <button type='button' class='btn btn-secondary dropdown-toggle' aria-label='' data-toggle='dropdown'
                                aria-haspopup='true' aria-expanded='false'>
                                Action
                            </button>
                            <div class='dropdown-menu'>
                                <button class='dropdown-item edit' href='#' id='$data->admin_id' data-toggle='modal' data-target='#modelId'
                                    onclick='edit(this.id)'>
                                    <span class='fas fa-edit' id='$data->admin_id'>
                                    </span>
                                    Edit
                                </button>
                                <button class='dropdown-item' onclick='changePassword(this, $data->admin_id)' data-toggle='modal' data-target='#passwordID'>
                                    <span class='fas fa-key'>
                                    </span>
                                    Change Password
                                </button>
                                <div role='separator' class='dropdown-divider'></div>
                                <button class='dropdown-item delete' onclick='deleteCurrentRow(this, $data->admin_id)' data-type='User'>
                                    <span class='fa fa-trash'>
                                    </span>
                                    Delete
                                </button>
                            </div>
                        </span>
                    </div>
                    ";
            })
            ->rawColumns(['action'])
            ->make(true);
        } else {
            return $this->fail('You do not have authorization to enter this page', 401);
        }
    }

    public function create()
    {
            $scrf_hash = csrf_hash();
            $model = new \Myth\Auth\Models\UserModel();
            $rules = [
                'name' => [
                    'rules' => 'required',
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'errors' => [
                        'is_unique'=>'Email already used'
                    ]
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

            if(!$this->validate($rules)){
                $massage = $this->validation->getErrors();

                return $this->fail($massage);
            }

            $role = esc($this->request->getVar('level'));
            $data = [
                'fullname'      => esc($this->request->getVar('name')),
                'username'      => esc($this->request->getVar('name')),
                'email'         => esc($this->request->getVar('email')),
                'active'        => 1,
                'password'      => esc($this->request->getVar('password')),
            ];

            $users  = new \Myth\Auth\Entities\User($data);
            $q      = $model->withGroup($role)->insert($users);

            if(!$q) return $this->fail('failed to save user');

            $response = [
                'csrf_hash' => $scrf_hash,
                'result' => $q
            ];
            
            return $this->respondCreated($response);
    }

    public function read($id = null)
    {
        if($this->request->isAJAX()){
            if(!is_null($id)){
                $model = new \Myth\Auth\Models\UserModel();
                $data = $model
                            ->select('email, fullname, users.id as userid, group_id, auth_groups.name as role')
                            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                            ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
                            ->find($id);
        
                if($data){
                    // $model->delete($id);
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'result' => $data
                    ];
                    
                    return $this->respond($response);
                }else{
                    return $this->fail('No Data Found with id '.$id, 200, 400);
                }
            } else {
                return $this->fail('bad request', 200, 401);
            }
        } else {
            return $this->fail('You do not have authorization to enter this page', 401);
        }
    }

    public function update($id = null)
    {
        if($this->request->isAJAX()){
            $scrf_hash  = csrf_hash();
            $role       = $this->request->getVar('level');
            
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

            if(!$this->validate($rules)){
                $massage = $this->validation->getErrors();

                return $this->fail($massage);
            }

            $data = [
                'fullname'      => esc($this->request->getVar('name')),
                'email'         => esc($this->request->getVar('email')),
                'id' => $id
            ];

            $model = new \Myth\Auth\Models\UserModel();

            $q = $model->withGroup($role)->save($data);

            if(!$q) return $this->fail('failed to change user data');

            $response = [
                'csrf_hash' => $scrf_hash,
                'result' => $q
            ];

            return $this->respond($response);
        } else {
            return $this->fail('You do not have authorization to enter this page', 401);
        }
    }

    public function updatePassword($id = null)
    {
        if($this->request->isAJAX()){
            $scrf_hash = csrf_hash();
            $rules = [
                'password' => [
                    'rules' => 'required|min_length[8]|strong_password',
                ],
                'repassword' => [
                    'rules' => 'required|matches[password]',
                ]
            ];

            if(!$this->validate($rules)){
                $massage = $this->validation->getErrors();

                return $this->fail($massage);
            }

            $pass    = esc($this->request->getVar('password'));

            $data = [
                'password' => $pass,
                'id' => $id
            ];
            $users = new \Myth\Auth\Entities\User($data);
            $model = new \Myth\Auth\Models\UserModel();

            $q = $model->save($users);

            if(!$q) return $this->fail('failed to change user password');

            $response = [
                'csrf_hash' => $scrf_hash,
                'result' => $q
            ];

            return $this->respond($response);
        } else {
            return $this->fail('You do not have authorization to enter this page', 401);
        }
    }

    public function delete($id = null)
    {
        if($this->request->isAJAX()){
            if(!is_null($id)){
                $model = new \Myth\Auth\Models\UserModel();
                $data = $model->find($id);
        
                if($data){
                    $model->delete($id);
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'Data Deleted',
                            'message' => $model->errors()
                        ]
                    ];
                    
                    return $this->respondDeleted($response);
                }else{
                    return $this->fail('No Data Found with id '.$id, 200, 400);
                }
            } else {
                return $this->fail('bad request', 200, 401);
            }
        } else {
            return $this->fail('You do not have authorization to enter this page', 401);
        }
    }
}