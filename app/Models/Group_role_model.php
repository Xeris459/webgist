<?php
namespace App\Models;

use CodeIgniter\Model;

class Group_role_model extends Model
{

    protected $table      = 'auth_groups';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'name'];
}

/* file location: app\Models\Group_role_model.php */
/* Snipped by Xeris459 */