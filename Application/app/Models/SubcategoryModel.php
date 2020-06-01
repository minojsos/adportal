<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class SubcategoryModel extends Model
{
    protected $table = 'sub_category';
    protected $allowedFields = ['sub_category_name','sub_category_desc','category_id'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {

        return $data;
    }
    
    protected function beforeUpdate(array $data) {

        return $data;
    }
}