<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class PageModel extends Model
{
    protected $table = 'page';
    protected $allowedFields = ['title','excerpt','content','featured_image','publish','created_on','updated_on'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {

        return $data;
    }
    
    protected function beforeUpdate(array $data) {

        return $data;
    }
    
}