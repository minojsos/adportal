<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class SubcategoryModel extends Model
{
    protected $table = 'subcategories';
 
    protected $allowedFields = ['sub_category_name'];
}