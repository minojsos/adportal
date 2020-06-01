<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['username', 'password', 'email', 'fname', 'lname', 'dob', 'privilege', 'contact_no','description', 'status', 'nic', 'passport_no', 'address', 'country', 'district', 'city', 'created'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }
    
    protected function beforeUpdate(array $data) {
        if (isset($data['password'])) {
            $data = $this->passwordHash($data);
        }
        return $data;
    }

    protected function passwordHash(array $data) {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        return $data;
    }
}