<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdvertisementModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\UserModel;
 
class AdvertisementController extends Controller
{

    public function addGallery($ad_id = null)
    {
        $modelAdvertisement = new AdvertisementModel();
 
        // $data['advertisement'] = $modelAdvertisement->orderBy('ad_id', 'DESC')->findAll();
        // $data['advertisement'] = $modelAdvertisement->where('ad_id', $ad_id)->first();

        foreach($modelAdvertisement->orderBy('ad_id', 'DESC')->findAll() as $advertisementObj):
            if($ad_id == $advertisementObj['ad_id']){
                $data['advertisement'] = $advertisementObj;
            }
        endforeach;

        return view('create-gallery', $data);
    }

    public function uploadGallery()
    {
        if(isset($_FILES["image_file"]["name"]))  
        {  
            
             $config['upload_path'] = 'C:/xampp/htdocs/Advertisement/adportal/Application/upload';  
            //  $config['upload_path'] = './upload/';  
             $config['allowed_types'] = 'jpg|jpeg|png|gif';  
             $this->load->library('upload', $config);  
             if(!$this->upload->do_upload('image_file'))  
             {  
                  echo $this->upload->display_errors();  
             }  
             else  
             {  
                  $data = $this->upload->data();  
                  echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
             }  
        }  
    }

    public function index()
    {    
        $modelAdvertisement = new AdvertisementModel();
        $modelCategory = new CategoryModel();
        $modelSubcategory = new SubcategoryModel();
        $modelAdmin = new UserModel();

        $data['advertisement'] = $modelAdvertisement->orderBy('ad_id', 'DESC')->findAll();
        $data['admin'] = $modelAdmin->orderBy('user_id', 'DESC')->findAll();
        $data['category'] = $modelCategory->orderBy('category_id', 'DESC')->findAll();
        $data['subcategory'] =  $modelSubcategory->orderBy('sub_category_id', 'DESC')->findAll();

        return view('advertisement', $data);
    }    
 
    public function create()
    {
        // Catgory
        $modelCategory = new CategoryModel();
        $data['category'] = $modelCategory->orderBy('category_id', 'DESC')->findAll();

        // Sub category
        $modelSubCategory = new SubcategoryModel();
        $data['subcategories'] = $modelSubCategory->orderBy('sub_category_id', 'DESC')->findAll();

        // // Customer
        // $modelUser = new UserModel();
        // $data['user'] = $modelUser->orderBy('user_id', 'DESC')->findAll();
        

        session_start();
        $_SESSION["user_id"] = 1;

        // return view('create-advertisement', $data);
        return view('create-advertisement', $data);
    }
 
    public function store()
    {  
 
        helper(['form', 'url']);
         
        $model = new AdvertisementModel();
 
        $data = [
 
            'user_id' => $this->request->getVar('user_id'),
            'cat_id' => $this->request->getVar('cat_id'),
            'subcat_id' => $this->request->getVar('subcat_id'),
            'post_date' => date("Y-m-d"),
            'end_date' => $this->request->getVar('end_date'),
            'status' => $this->request->getVar('status'),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'positive_rating' => 0,
            'negative_rating' => 0,
            'report_count' => 0,
            'customer_id' => $this->request->getVar('customer_id'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('advertisementController'));
    }
 
    // public function edit($ad_id = null)
    // {
      
    //  $model = new AdvertisementModel();
 
    //  $data['advertisementObj'] = $model->where('ad_id', $ad_id)->first();

    //  return view('edit-advertisement', $data);
    // }
 
    // public function update()
    // {  
 
    //     helper(['form', 'url']);
         
    //     $model = new AdvertisementModel();
 
    //     $ad_id = $this->request->getVar('ad_id');
 
    //     $data = [
    //         'user_id' => $this->request->$_SESSION["user_id"],
    //         'cat_id' => $this->request->getVar('cat_id'),
    //         'subcat_id' => $this->request->getVar('subcat_id'),
    //         'post_date' => $this->request->getVar('post_date'),
    //         'end_date' => $this->request->getVar('end_date'),
    //         'status' => $this->request->getVar('status'),
    //         'title' => $this->request->getVar('title'),
    //         'description' => $this->request->getVar('description'),
    //         'positive_rating' => $this->request->getVar('positive_rating'),
    //         'negative_rating' => $this->request->getVar('negative_rating'),
    //         'report_count' => $this->request->getVar('report_count'),
    //         'customer_id' => $this->request->getVar('customer_id'),
    //         'approved_date' => $this->request->getVar('approved_date'),
    //         ];
 
    //     $save = $model->update($ad_id,$data);
 
    //     return redirect()->to( base_url('advertisement') );
    // }
 
    public function delete($ad_id = null)
    {
 
     $model = new AdvertisementModel();
 
     $data['advertisementObj'] = $model->where('ad_id', $ad_id)->delete();
      
     return redirect()->to( base_url('advertisementController') );
    }
}