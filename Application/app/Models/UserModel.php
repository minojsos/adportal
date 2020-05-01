<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class UserModel extends Model
{
    protected $table = 'user';
 
    protected $allowedFields = ['username', 'password', 'email', 'fname', 'lname', 'dob', 'privilege', 'contact_no','description', 'status', 'nic', 'passport_no', 'address', 'country', 'city'];
}