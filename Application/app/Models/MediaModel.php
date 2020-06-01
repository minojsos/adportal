<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class MediaModel extends Model
{
    protected $table = 'media';
    protected $allowedFields = ['media_id', 'title', 'alt', 'caption', 'path', 'featured', 'uploaded_on', 'user_id', 'ad_id'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {

        return $data;
    }
    
    protected function beforeUpdate(array $data) {

        return $data;
    }
}