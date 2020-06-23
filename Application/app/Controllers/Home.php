<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\LocationModel;
use App\Models\CustomerModel;
use App\Models\AdvertisementModel;
use App\Models\UserModel;
use App\Models\MediaModel;
use App\Models\SubscribeModel;

class Home extends BaseController
{
	public function index($param=null)
	{
		$modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
		$seo['title'] = 'Home';
		$seo['admin'] = false;
		
		session()->start();
		helper(['form', 'url']);

		if ($param != null) {
			$modelAdvertisement = new AdvertisementModel();
			// If Parameter 1 is set, check if it is a advertisement
			$advertisement = $modelAdvertisement->where(['slug' => $param, 'status' => 1])->first();

			if ($advertisement) {
				$modelCategory = new CategoryModel();
				$modelSubcategory = new SubcategoryModel();
				$modelLocation = new LocationModel();
				$modelCustomer = new CustomerModel();
				$modelUser = new UserModel;
				$modelMedia = new MediaModel;

				$data['category'] = $modelCategory->where('id',$advertisement['cat_id'])->first();
				$data['subcategory'] = $modelSubcategory->where('id',$advertisement['subcat_id'])->first();
				$data['location'] = $modelLocation->where('id',$advertisement['location'])->first();
				$data['customer'] = $modelCustomer->where('id',$advertisement['customer_id'])->first();
				$data['media'] = $modelMedia->where('ad_id', $advertisement['id'])->orderBy('featured','DESC')->findAll();

				$data['advertisement'] = $advertisement;

				// Retrieve advertisements from same category
				$data['advertisements'] = $modelAdvertisement->where('cat_id',$advertisement['cat_id'])->findAll();
				$media=array();
				foreach ($data['advertisements'] as $ad) {
					$media[]=$modelMedia->where(['ad_id' => $ad['id'], 'featured' => 1])->first();
				}
				$data['medias']=$media;
				$data['location'] = $modelLocation->where('id',$advertisement['location'])->first();

				// Load Distinct Districts
				$location = $modelLocation->orderBy('district','ASC')->findAll(); 
				$districts=array();
				$data['locations'] = $modelLocation->findAll();
				foreach ($data['locations'] as $loc) {
					if (!in_array($loc['district'], $districts)) {
						$districts[] = $loc['district'];
					}
				}
				$data['district'] = $districts;

				// Load Distinct Categories
				$data['categories'] = $modelCategory->orderBy('category_name','ASC')->findAll();

				// Set Page Title
				$seo['title'] = $advertisement['title'];

				// Update Views
				$viewCount = [
					'views' => $data['advertisement']['views'] + 1,
				];

				$modelAdvertisement->update($data['advertisement']['id'], $viewCount);

				echo view('Templates/Header', $seo);
				echo view('Templates/Navbar', $seo);
				echo view('view-ad', $data);
			} else {
				// Redirect to Homepage to Load All Advertisements if Advertisement doesn't exist.
				return redirect()->to(base_url('/'));
			}
		} else {
			// Categories
			$modelCategory = new CategoryModel();
			$data['category'] = $modelCategory->orderBy('category_name','ASC')->findAll();

			// Locations
			$modelLocation = new LocationModel();
			$location = $modelLocation->orderBy('district','ASC')->findAll(); 
			$districts=array();
			$data['location'] = $modelLocation->findAll();
			foreach ($data['location'] as $loc) {
				if (!in_array($loc['district'], $districts)) {
					$districts[] = $loc['district'];
				}
			}
			$data['district'] = $districts;

			// Advertisements
			$modelAdvertisement = new AdvertisementModel();
			$data['advertisement'] = $modelAdvertisement->orderBy('id','DESC')->findAll();

			// Count for Each Advertisements
			$adcounts=array();
			foreach($data['category'] as $cat) {
				$query = $this->countByCategory($cat['id']);
				foreach ($query->getResult() as $row) {
        			$count=$row->cat_id;
				}
				
				$adcounts[]=["id" => $cat['id'], "count" => $count];
			}
			$data['count']=$adcounts;

			echo view('Templates/Header', $seo);
			echo view('Templates/Navbar', $seo);
			echo view('home', $data);
		}
	}

	public function subscribe() {
		// Check if Parameter 1 is set
		if ($this->request->getVar('email')) {
			$email = $this->request->getVar('email');
			$modelSubscribe = new SubscribeModel();

			$exists = $modelSubscribe->where('email',$email)->first();

			if ($exists == null) {
				$data = ['email' => $this->request->getVar('email')];
				$save = $modelSubscribe->insert($data);
					
				if ($save) {
					echo 'Successfully Subscribed to Newsletters';
				}
			} else {
				echo 'Already Subscribed to Newsletters';
			}
        }
	}

	/**
	 * How It Works Page.
	 */
	public function how_it_works() {
		$modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
		$seo['title'] = 'How It Works';
		$seo['admin'] = false;

		$modelCategory = new CategoryModel();
        $modelLocation = new LocationModel();

        // Load Distinct Districts
        $location = $modelLocation->orderBy('district','ASC')->findAll(); 
        $districts=array();
        $data['location'] = $modelLocation->findAll();
        foreach ($data['location'] as $loc) {
            if (!in_array($loc['district'], $districts)) {
                $districts[] = $loc['district'];
            }
        }
        $data['district'] = $districts;

        // Load All Distinct Categories
		$data['categories'] = $modelCategory->orderBy('category_name','ASC')->findAll();

		echo view('Templates/Header',$seo);
		echo view('Templates/Navbar',$seo);
		return view('how-it-works',$data);
	}

	/**
	 * About Us Page
	 */
	public function about_us() {
		$modelSetting = new SettingModel();
		$seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
		$seo['title'] = 'About Us';
		$seo['admin'] = false;

		$modelCategory = new CategoryModel();
		$modelLocation = new LocationModel();

		// Load Distrinct District
		$location = $modelLocation->orderBy('district','ASC')->findAll();
		$districts=array();
		$data['location'] = $modelLocation->findAll();
		foreach ($data['location'] as $loc) {
			if (!in_array($loc['district'], $districts)) {
				$districts[] = $loc['district'];
			}
		}
		$data['district'] = $districts;

		// Load All Distinct Categories
		$data['categories'] = $modelCategory->orderBy('category_name','ASC')->findAll();

		echo view('Templates/Header',$seo);
		echo view('Templates/Navbar',$seo);
		return view('about-us',$data);
	}

	// Get Count of Advertisements for each Category
    public function countByCategory($cat_id) {
		// Initialize Database
        $db = \Config\Database::connect();
        $builder = $db->table('advertisement');
        // Select Count of Advertisements for given Category
        $builder->selectCount('cat_id');
		$builder->where('cat_id', $cat_id);
		$builder->where('status', 1);
        $query = $builder->get();
        return $query;
	}

	// Get Advertisements in Given Category while Excluding current advertisement
	public function getAdsByCategory($cat_id, $ad_id) {
		// Initialize Database
		$db = \Config\Database::connect();
		$builder = $db->table('advertisement');
		$builder->where('id !=',$ad_id);
		$builder->where('cat_id',$cat_id);
		$builder->where('status',1);
		$query = $builder->get();

		return $query;
	}	

	public function report($param=null) {
		$modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Advertisements';
		$seo['admin'] = false;

		session()->start();
		helper(['form', 'url']);

		if ($param != null) {
			// Retrive all Advertisements
			$modelAdvertisement = new AdvertisementModel();
			// If Parameter is set, check if it is an advertisement
			$advertisement = $modelAdvertisement->where('id',$param)->first();

			if ($advertisement) {
				$modelCategory = new CategoryModel();
				$modelSubcategory = new SubcategoryModel();
				$modelLocation = new LocationModel();
				$modelCustomer = new CustomerModel();
				$modelUser = new UserModel;
				
				$data['category'] = $modelCategory->where('id',$advertisement['cat_id'])->first();
				$data['subcategory'] = $modelSubcategory->where('id',$advertisement['subcat_id'])->first();
				$data['location'] = $modelLocation->where('id',$advertisement['location'])->first();
				$data['advertisement'] = $advertisement;

				// Load Distinct Districts
				$location = $modelLocation->orderBy('district','ASC')->findAll(); 
				$districts=array();
				$data['location'] = $modelLocation->findAll();
				foreach ($data['location'] as $loc) {
					if (!in_array($loc['district'], $districts)) {
						$districts[] = $loc['district'];
					}
				}
				$data['district'] = $districts;

				// Load Distinct Categories
				$data['categories'] = $modelCategory->orderBy('category_name','ASC')->findAll();

				// Set Page Title
				$seo['title'] = 'Report '.$advertisement['title'];

				echo view('Templates/Header',$seo);
				echo view('Templates/Navbar');
				echo view('report',$data);
			} else {
				return redirect()->to(base_url('/'));
			}
		} else {
			return redirect()->to(base_url('/'));
		}
	}

    /**
     * Save the report in the database.
     */
    public function save_report(){
        $modelReport = new ReportModel();
		$ad_id = $this->request->getVar('ad_id');
		$reason = $this->request->getVar('reason');

        $data = [
            'ad_id' => $ad_id,
            'reason'  => $reason,
        ];
        $save = $modelReport->insert($data);

		// Redirect user
		return redirect()->to(base_url('/report/'.$ad_id));
    }

    /**
     * View all Reports.
     */
    public function view_report($ad_id = null){
        $modelReport = new ReportModel();

        $data['report'] = $modelReport->where('ad_id', $ad_id)->find();

        return view('view_report', $data);
    }

}
