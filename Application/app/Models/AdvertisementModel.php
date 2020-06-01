<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class AdvertisementModel extends Model
{
    protected $table = 'advertisement';
    protected $allowedFields = ['user_id', 'cat_id', 'subcat_id', 'post_date', 'end_date', 'status', 'title', 'description', 'price', 'location', 'report_count', 'customer_id', 'approved_date', 'views'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {

        return $data;
    }
    
    protected function beforeUpdate(array $data) {

        return $data;
    }

}