<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $allowedFields = ['fname', 'lname', 'email', 'dob', 'contact_no', 'description', 'nic_no', 'address', 'city', 'passport_no', 'password'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {

        return $data;
    }
    
    protected function beforeUpdate(array $data) {

        return $data;
    }

}