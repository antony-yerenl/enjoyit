<?php
namespace App\Models;
use CodeIgniter\Model;

class DocentesModel extends Model{
    protected $table = "docentes";
    protected $primaryKey = "iddocente";
    protected $returnType = 'array';
    //protected $allowedFields = ['nombres', 'apellidos'];
}
?>