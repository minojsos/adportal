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
     * Index Page for Advertisements.
     * Retrieve all Advertisements, Users, Cateogires and SubCategories so tha thte page to display advertisements can be generated.
     */
    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';
        $seo['admin'] = true;

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
     * Activate an inactive/deactivated advertisement.
     * Only the Administrator can activate an inactive/deactivated advertisement.
     * The Advertismeent should already be inactive/deactivated to be able to activate it.
     * If Successfully activated, show success message else show error message.
     */
    public function activate($ad_id=null) {
        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && session()->get('privilege') == 1) {
                $modelAdvertisement = new AdvertisementModel();

                $advertisement = $modelAdvertisement->where(['id'=>$ad_id, 'status'=>0])->find();
                if($advertisement != NULL) {
                    $data = [
                        'status' => 1,
                    ];
                    $save = $modelAdvertisement->update($ad_id,$data);

                    if ($save) {
                        return redirect()->to(base_url('advertisement'))->with('msg','Successfully Activated Advertisement');
                    }

                    return redirect()->to(base_url('advertisement'))->with('error','Failed to Activate Advertisement');
                }
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * Deactivate an Active Advertisement
     * Only the Administrator can deactive an active advertisement.
     * The Advertisement should already be active to be able to deactive it.
     * If Successfully deactivated, show success message else show error message.
     */
    public function deactivate($ad_id = null) {
        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && session()->get('privilege') == 1) {
                $modelAdvertisement = new AdvertisementModel();

                $advertisement = $modelAdvertisement->where(['id'=>$ad_id, 'status'=>1])->find();
                if ($advertisement != NULL) {
                    $data = [
                        'status' => 0,
                    ];

                    $save = $modelAdvertisement->update($ad_id,$data);

                    if ($save) {
                        return redirect()->to(base_url('advertisement'))->with('msg','Successfully Deactivated Advertisement');
                    }

                    return redirect()->to(base_url('advertisement'))->with('error','Failed to Deactivate Advertisement');
                }
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * Renew an advertisement.
     * If the advertisement has been expired, it can be renewed.
     * Administrator or Poster can do the renewel.
     */
    public function renew($ad_id = null) {
        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                $modelAdvertisement = new AdvertisementModel();

                $advertisement = $modelAdvertisement->where('id',$ad_id)->find();
                if ($advertisement != NULL) {
                    // Load Renew Advertisement Page
                }
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
        $seo['admin'] = true;

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
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                helper(['form', 'url']);

                // Category
                $modelCategory = new CategoryModel();
                $category = $modelCategory->where('id', $this->request->getVar('cat_id'))->first();
                
                // Sub category
                $modelSubCategory = new SubcategoryModel();
                $subcategory = $modelSubCategory->where('id', $this->request->getVar('cat_'.$this->request->getVar('cat_id')))->first();

                // Customer
                $modelCustomer = new CustomerModel();

                $data['cat_id'] = $this->request->getVar('cat_id');
                $data['subcat_id'] = $this->request->getVar('cat_'.$data['cat_id']);
                $data['cat_name'] = $category['category_name'];
                $data['subcat_name'] = $subcategory['sub_category_name'];
                $data['customer'] = $modelCustomer->orderBy('id','ASC')->findAll();
                $data['step'] = 2;

                // Location
                $modelLocation = new LocationModel();
                $data['location'] = $modelLocation->orderBy('district','ASC')->findAll();
                $districts=array();
                foreach ($data['location'] as $loc) {
                    if (!in_array($loc['district'], $districts)) {
                        $districts[] = $loc['district'];
                    }
                }
                $data['district']=$districts;

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
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                helper(['form', 'url']);
                
                // Category
                $modelCategory = new CategoryModel();
                $category = $modelCategory->where('id', $this->request->getVar('cat_id'))->first();

                // Sub category
                $modelSubCategory = new SubcategoryModel();
                $subcategory = $modelSubCategory->where('id', $this->request->getVar('subcat_id'))->first();

                // Location
                $modelLocation = new LocationModel();

                // Customer
                $modelCustomer = new CustomerModel();

                $data['cat_id'] = $this->request->getVar('cat_id');
                $data['subcat_id'] = $this->request->getVar('subcat_id');
                $data['district'] = $this->request->getVar('location_id');
                $data['cat_name'] = $category['category_name'];
                $data['subcat_name'] = $subcategory['sub_category_name'];
                $data['loc_id'] = $this->request->getVar($data['district']);
                $location = $modelLocation->where('id', $this->request->getVar($data['district']))->first();
                $data['dist_name'] = $location['district'];
                $data['city_name'] = $location['city'];

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
        $seo['admin'] = true;

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

                // 1 = Negotiable | 0 = Not Negotiable
                $negotiate = $this->request->getVar('negotiate');
                if ($negotiate == null) {
                    $negotiate = 0;
                } else {
                    $negotiate = 1;
                }

                $urlFromTitle = url_title($this->request->getVar('title'), '-', true);
                $length = 10;
                $slug = $urlFromTitle.'-'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);

                // Load Advertisement Data from Form
                $data = [
                    'user_id' => session()->get('id'),
                    'cat_id' => $this->request->getVar('cat_id'),
                    'subcat_id' => $this->request->getVar('subcat_id'),
                    'post_date' => date("Y-m-d"),
                    'end_date' => $this->request->getVar('end_date'),
                    'status' => $status,
                    'title' => $this->request->getVar('title'),
                    'slug' => strval($slug),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'negotiable' => $negotiate,
                    'location' => $this->request->getVar('loc_id'),
                    'customer_id' => $this->request->getVar('customer_id'),
                    'approved_date' => $approved_date,
                ];

                $inserted_id = $advertisementModel->insert($data);

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
                        'alt' => $this->request->getVar('img_one_alt_text'),
                        'path' => $fileName,
                        'featured' => 1,
                        'user_id' => $_SESSION['id'],
                        'ad_id' => $inserted_id,
                    ];

                    $save = $mediaModel->insert($data);

                    if (!empty($this->request->getVar('img_two_title')) && !empty($this->request->getVar('img_two_alt_text'))) {
                        $imgTwo = $this->request->getFile('img_two');
                        $fileName = $imgTwo->getRandomName();
                        $imgTwo->move(ROOTPATH . 'public/assets/uploads', $fileName);

                        $data = [
                            'title' => $this->request->getVar('img_two_title'),
                            'alt' => $this->request->getVar('img_two_alt_text'),
                            'path' => $fileName,
                            'featured' => 0,
                            'user_id' => $_SESSION['id'],
                            'ad_id' => $inserted_id,
                        ];

                        $save = $mediaModel->insert($data);
                    }

                    if (!empty($this->request->getVar('img_three_title')) && !empty($this->request->getVar('img_three_alt_text'))) {
                        $imgThree = $this->request->getFile('img_three');
                        $fileName = $imgTwo->getRandomName();
                        $imgThree->move(ROOTPATH . 'public/assets/uploads', $fileName);

                        $data = [
                            'title' => $this->request->getVar('img_three_title'),
                            'alt' => $this->request->getVar('img_three_alt_text'),
                            'path' => $fileName,
                            'featured' => 0,
                            'user_id' => $_SESSION['id'],
                            'ad_id' => $inserted_id,
                        ];

                        $save = $mediaModel->insert($data);
                    }

                    if (!empty($this->request->getVar('img_four_title')) && !empty($this->request->getVar('img_four_alt_text'))) {
                        $imgFour = $this->request->getFile('img_four');
                        $fileName = $imgTwo->getRandomName();
                        $imgFour->move(ROOTPATH . 'public/assets/uploads', $fileName);

                        $data = [
                            'title' => $this->request->getVar('img_four_title'),
                            'alt' => $this->request->getVar('img_four_alt_text'),
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
     * Edit Page for editing an existing advertisement.
     * The page provides a form to edit an existing advertisement.
     * Given the Advertisement ID, retrieve the advertisement details and pass it to Edit Advertisement Page.
     */
    public function edit($ad_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true)) {
                $model = new AdvertisementModel();
                $modelCategory = new CategoryModel();
                $modelSubCategory = new SubcategoryModel();
                $modelLocation = new LocationModel();
                $modelUser = new UserModel();

                $advertisements = $model->where('id', $ad_id)->orderby('id', 'ASC')->findAll();
                
                foreach ($advertisements as $advertisement) {
                    $data['advertisement'] = $advertisement;
                }
                
                if ($data['advertisement'] != NULL) {
                    // Retrieve Categories
                    $data['category'] = $modelCategory->orderBy('category_name','ASC')->findAll();
                    // Retrieve Subcategories
                    $data['subcategory'] = $modelSubCategory->orderBy('sub_category_name','ASC')->findAll();
                    // Retrieve All Locations
                    $data['location'] = $modelLocation->orderBy('city','ASC')->findAll();
                    // Obtain Districts
                    $districts=array();
                    foreach ($data['location'] as $loc) {
                        if (!in_array($loc['district'], $districts)) {
                            $districts[] = $loc['district'];
                        }
                    }
                    $data['district']=$districts;

                    $selectedLocation = $modelLocation->where('id',$data['advertisement']['location'])->first();

                    // Selected District
                    $data['selectedDistrict'] = $selectedLocation['district'];
                    // Selected Location
                    $data['selectedLocation'] = $selectedLocation['city'];

                    // Selected Category
                    $data['selectedCategory'] = $data['advertisement']['cat_id'];

                    echo view('Templates/Header',$seo);
                    echo view('Templates/Navigation');
                    return view('edit-advertisement',$data);
                }
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * Update an Existing Advertisement.
     * When an existing advertisement is updated, update an existing advertisement in the database.
     * The details of the advertisement is updated.
     */
    public function update()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['privilege'] == 1) {
                helper(['form', 'url']);  
                $modelAdvertisement = new AdvertisementModel();
                $ad_id = $this->request->getVar('advertisement_id');

                // 1 = Negotiable | 0 = Not Negotiable
                $negotiate = $this->request->getVar('negotiate');
                if ($negotiate == null) {
                    $negotiate = 0;
                } else {
                    $negotiate = 1;
                }

                $urlFromTitle = url_title($this->request->getVar('title'), '-', true);
                $length = 10;
                $slug = $urlFromTitle.'-'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);

                $data = [
                    'cat_id' => $this->request->getVar('category'),
                    'subcat_id' => $this->request->getVar('subcategory'),
                    'end_date' => $this->request->getVar('end_date'),
                    'title' => $this->request->getVar('title'),
                    'slug' => $slug,
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'negotiate' => $negotiate,
                    'location' => $this->request->getVar('location')
                ];

                $save = $modelAdvertisement->update($ad_id,$data);
                return redirect()->to(base_url('advertisement'))->with('msg','Successfully Updated Advertisement');
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