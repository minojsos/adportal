<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use \Config\Database;
 
class AdvertisementModel extends Model
{
    protected $table = 'advertisement';
    protected $allowedFields = ['user_id', 'cat_id', 'subcat_id', 'post_date', 'end_date', 'status', 'title', 'slug', 'description', 'price', 'negotiate', 'location', 'report_count', 'customer_id', 'approved_date', 'views'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        $db      = \Config\Database::connect();
        return $data;
    }
    
    protected function beforeUpdate(array $data) {

        return $data;
    }

}