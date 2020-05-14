<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class GalleryModel extends Model
{
    protected $table = 'gallery';
 
    protected $allowedFields = ['gallery_id', 'gallery_alt', 'pic_path', 'advertisement'];
}