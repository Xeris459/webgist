<?php
namespace App\Controllers\Api;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Irsyadulibad\DataTables\DataTables;
 
class Category extends ResourceController
{
    protected $Admin_model, $db;

    public function __construct()
    {
        $this->db          = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
        $this->Admin_model = $this->db->table('category');
    }

    public function index()
    {
        helper('auth');

        if($this->request->isAJAX()){
            return DataTables::use('category')->where(['users_id'=>user_id()])
            ->addColumn('action', function($data) {
                return "
                    <div class='input-group'>
                        <span class='input-group-btn'>
                            <button type='button' class='btn btn-secondary dropdown-toggle' aria-label='' data-toggle='dropdown'
                                aria-haspopup='true' aria-expanded='false'>
                                Action
                            </button>
                            <div class='dropdown-menu'>
                                <button class='dropdown-item edit' href='#' id='$data->id' data-toggle='modal' data-target='#modelId'
                                    onclick='edit(this.id)'>
                                    <span class='fas fa-edit' id='$data->id'>
                                    </span>
                                    Edit
                                </button>
                                <div role='separator' class='dropdown-divider'></div>
                                <button class='dropdown-item delete' onclick='deleteCurrentRow(this, $data->id)' data-type='Category'>
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
            helper('auth');
            $scrf_hash = csrf_hash();
            $model = new \App\Models\Category_model();
            $rules = [
                'title' => [
                    'rules' => 'required|alpha_numeric_space',
                    'label' => 'name category'
                ]

            ];

            if(!$this->validate($rules)){
                $massage = $this->validation->getErrors();

                return $this->fail($massage);
            }

            $data = [
                'title'     => esc($this->request->getVar('title')),
                'users_id'  => user_id()
            ];

            $q      = $model->save($data);

            if(!$q) return $this->fail('failed to save category');

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
                $model = new \App\Models\Category_model();
                $data = $model->select('title, id')->find($id);
        
                if($data){
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
                'title' => [
                    'rules' => 'required|alpha_numeric_space',
                    'label' => 'name category'
                ]

            ];

            if(!$this->validate($rules)){
                $massage = $this->validation->getErrors();

                return $this->fail($massage);
            }

            $data = [
                'title'     => esc($this->request->getVar('title')),
                'id' => $id
            ];

            $model = new \App\Models\Category_model();

            $q = $model->save($data);

            if(!$q) return $this->fail('failed to change category data');

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
                $model = new \App\Models\Category_model();
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