<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdvertisementModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\MediaModel;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Models\LocationModel;
use App\Models\CustomerModel;
 
class Advertisement extends Controller
{

    /**
     * 
     */
    public function addGallery($ad_id = null)
    {
        $modelAdvertisement = new AdvertisementModel();
 
        // $data['advertisement'] = $modelAdvertisement->orderBy('ad_id', 'DESC')->findAll();
        // $data['advertisement'] = $modelAdvertisement->where('ad_id', $ad_id)->first();

        foreach($modelAdvertisement->orderBy('id', 'DESC')->findAll() as $advertisementObj):
            if($ad_id == $advertisementObj['id']){
                $data['advertisement'] = $advertisementObj;
            }
        endforeach;

        return view('create-gallery', $data);
    }

    /**
     * Save a Galleryto the FilePath
     */
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

    /**
     * Index Page for Advertisements.
     * Retrieve all Advertisements, Users, Cateogires and SubCategories so tha thte page to display advertisements can be generated.
     */
    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';

        session()->start();;

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                $modelAdvertisement = new AdvertisementModel();
                $modelCategory = new CategoryModel();
                $modelSubcategory = new SubcategoryModel();
                $modelAdmin = new UserModel();
                $modelLocation = new LocationModel();

                $data['advertisement'] = $modelAdvertisement->orderBy('id', 'DESC')->findAll();
                $data['admin'] = $modelAdmin->orderBy('id', 'ASC')->findAll();
                $data['category'] = $modelCategory->orderBy('id', 'ASC')->findAll();
                $data['subcategory'] =  $modelSubcategory->orderBy('id', 'ASC')->findAll();
                $data['location'] = $modelLocation->orderBy('id', 'ASC')->findAll();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('advertisement', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }    
    
    /**
     * Create New Advertisements.
     * Generate the Create Advertisement page. To do so, retrieve all Categories, Sub Categories and Locations from the Database
     * and Pass it to the Create Advertisement Page.
     */
    public function create()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                // Catgory
                $modelCategory = new CategoryModel();
                $data['category'] = $modelCategory->orderBy('category_name', 'ASC')->findAll();

                // Sub category
                $modelSubCategory = new SubcategoryModel();
                $data['subcategories'] = $modelSubCategory->orderBy('sub_category_name', 'ASC')->findAll();

                // Customer
                $modelCustomer = new CustomerModel();
                $data['customer'] = $modelCustomer->orderBy('id','ASC')->findAll();

                $data['step'] = 1;

                // User
                // $modelUser = new UserModel();
                // $data['user'] = $modelUser->orderBy('user_id', 'DESC')->findAll();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-advertisement', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * 
     */
    public function step2() 
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                helper(['form', 'url']);

                // Sub category
                $modelSubCategory = new SubcategoryModel();
                $data['subcategories'] = $modelSubCategory->orderBy('sub_category_name', 'ASC')->findAll();

                $data['cat_id'] = $this->request->getVar('cat_id');
                $data['subcat_id'] = $this->request->getVar('cat_'.$data['cat_id']);
                $data['step'] = 2;

                // Location
                $modelLocation = new LocationModel();
                $data['location'] = $modelLocation->orderBy('city','ASC')->findAll();
                $districts=array();
                foreach ($data['location'] as $loc) {
                    if (!in_array($loc['district'], $districts)) {
                        $districts[] = $loc['district'];
                    }
                }
                $data['district']=$districts;

                // Customer
                $modelCustomer = new CustomerModel();
                $data['customer'] = $modelCustomer->orderBy('id','ASC')->findAll();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-advertisement', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * 
     */
    public function step3()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                helper(['form', 'url']);

                // Sub category
                $modelSubCategory = new SubcategoryModel();
                $data['subcategories'] = $modelSubCategory->orderBy('sub_category_name', 'ASC')->findAll();

                $data['cat_id'] = $this->request->getVar('cat_id');
                $data['subcat_id'] = $this->request->getVar('subcat_id');
                $data['district'] = $this->request->getVar('location_id');
                $data['loc_id'] = $this->request->getVar($data['district']);
                $data['step'] = 3;

                // Location
                $modelLocation = new LocationModel();
                $data['location'] = $modelLocation->orderBy('city','ASC')->findAll();
                $districts=array();
                foreach ($data['location'] as $loc) {
                    if (!in_array($loc['district'], $districts)) {
                        $districts[] = $loc['district'];
                    }
                }
                $data['district']=$districts;

                // Customer
                $modelCustomer = new CustomerModel();
                $data['customer'] = $modelCustomer->orderBy('id','ASC')->findAll();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-advertisement', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Save a Created Advertisement.
     * Obtain the values input to create a new advertisement and save it to the database.
     * Save the Images uploaded after the Data related to the Advertisement has been saved to the database.
     */
    public function store()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==true) {
                helper(['form', 'url']);

                $advertisementModel=new AdvertisementModel();
                $mediaModel=new MediaModel();

                if (session()->get('privilege') == 1) {
                    $status = 1;
                    $approved_date = date("Y-m-d");
                } else {
                    $status = 0;
                    $approved_date = NULL;
                }

                // Load Advertisement Data from Form
                $data = [
                    'user_id' => session()->get('id'),
                    'cat_id' => $this->request->getVar('cat_id'),
                    'subcat_id' => $this->request->getVar('subcat_id'),
                    'post_date' => date("Y-m-d"),
                    'end_date' => $this->request->getVar('end_date'),
                    'status' => $status,
                    'title' => $this->request->getVar('title'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'location' => $this->request->getVar('loc_id'),
                    'customer_id' => $this->request->getVar('customer_id'),
                    'approved_date' => $approved_date,
                ];

                $save = $advertisementModel->insert($data);
                $inserted_id = $advertisementModel->insert_id();

                // Load Images
                $validated = $this->validate([
                    'img_one' => [
                        'uploaded[img_one]',
                        'mime_in[img_one,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[img_one,20000]',
                    ],
                    'img_two' => [
                        'mime_in[img_two,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[img_two,20000]',
                    ],
                    'img_three' => [
                        'mime_in[img_three,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[img_three,20000]',
                    ],
                    'img_four' => [
                        'mime_in[img_four,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[img_four,20000]',
                    ]
                ]);

                if ($validated) {
                    $featuredImg = $this->request->getFile('img_one');
                    $fileName = $featuredImg->getRandomName();
                    $featuredImg->move(ROOTPATH . 'public/assets/uploads', $fileName);

                    $data = [
                        'title' => $this->request->getVar('img_one_title'),
                        'alt' => $this->request->getVar('img_one_alt'),
                        'caption' => $this->request->getVar('img_one_caption'),
                        'path' => $fileName,
                        'featured' => 1,
                        'user_id' => $_SESSION['id'],
                        'ad_id' => $inserted_id,
                    ];

                    $save = $mediaModel->insert($data);

                    if (!empty($this->request->getFile('img_two'))) {
                        $imgTwo = $this->request->getFile('img_two');
                        $fileName = $imgTwo->getRandomName();
                        $imgTwo->move(ROOTPATH . 'public/assets/uploads', $fileName);

                        $data = [
                            'title' => $this->request->getVar('img_two_title'),
                            'alt' => $this->request->getVar('img_two_alt'),
                            'caption' => $this->request->getVar('img_two_caption'),
                            'path' => $fileName,
                            'featured' => 0,
                            'user_id' => $_SESSION['id'],
                            'ad_id' => $inserted_id,
                        ];

                        $save = $mediaModel->insert($data);
                    }

                    if (!empty($this->request->getFile('img_three'))) {
                        $imgThree = $this->request->getFile('img_three');
                        $fileName = $imgThree->getRandomName();
                        $imgThree->move(ROOTPATH . 'public/assets/uploads', $fileName);

                        $data = [
                            'title' => $this->request->getVar('img_three_title'),
                            'alt' => $this->request->getVar('img_three_alt'),
                            'caption' => $this->request->getVar('img_three_caption'),
                            'path' => $fileName,
                            'featured' => 0,
                            'user_id' => $_SESSION['id'],
                            'ad_id' => $inserted_id,
                        ];

                        $save = $mediaModel->insert($data);
                    }

                    if (!empty($this->request->getFile('img_four'))) {
                        $imgFour = $this->request->getFile('img_four');
                        $fileName = $imgFour->getRandomName();
                        $imgFour->move(ROOTPATH . 'public/assets/uploads', $fileName);

                        $data = [
                            'title' => $this->request->getVar('img_four_title'),
                            'alt' => $this->request->getVar('img_four_alt'),
                            'caption' => $this->request->getVar('img_four_caption'),
                            'path' => $fileName,
                            'featured' => 0,
                            'user_id' => $_SESSION['id'],
                            'ad_id' => $inserted_id,
                        ];

                        $save = $mediaModel->insert($data);
                    }
                    
                }

                return redirect()->to(base_url('advertisement/create'))->with('msg','Successfully Saved Advertisement');
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Allow Administrator to Delete an Existing Advertisement.
     */
    public function delete($ad_id = null)
    {
        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true)) { 
                $model = new AdvertisementModel(); 
                $data['advertisement'] = $model->where('id', $ad_id)->delete();
                
                return redirect()->to('advertisement')->with('msg','Successfully Deleted Advertisement');
            }
        }

        return redirect()->to(base_url('login'));
    }
}