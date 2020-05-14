<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class AdvertisementModel extends Model
{
    protected $table = 'advertisement';
 
    protected $allowedFields = ['user_id', 'cat_id', 'subcat_id', 'post_date', 'end_date', 'status', 'title', 'description','positive_rating', 'negative_rating', 'report_count', 'customer_id', 'approved_date'];
}