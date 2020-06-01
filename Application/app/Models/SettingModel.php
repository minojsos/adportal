<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class SettingModel extends Model
{
    protected $table = 'setting';
    protected $allowedFields = ['option_id','option_name','option_value'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {

        return $data;
    }
    
    protected function beforeUpdate(array $data) {

        return $data;
    }
}