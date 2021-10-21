<?php
namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{

    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'lat', 'long'];
}

/* file location: Demo\app\Models\User_model.php */
/* Snipped by Xeris459 */