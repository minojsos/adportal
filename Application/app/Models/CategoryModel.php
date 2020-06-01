<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CategoryModel extends Model
{
    protected $table = 'category';
    protected $allowedFields = ['category_name','category_desc','category_icon'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {

        return $data;
    }
    
    protected function beforeUpdate(array $data) {

        return $data;
    }
}