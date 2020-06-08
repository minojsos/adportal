<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\LocationModel;
use App\Models\CustomerModel;
use App\Models\AdvertisementModel;
use App\Models\UserModel;
use App\Models\MediaModel;

class Home extends BaseController
{
	public function index($param=null)
	{
		$modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
		$seo['title'] = 'Home';
		$seo['admin'] = false;
		
		session()->start();

		// Check if Parameter 1 is set
		if ($param != null) {
			$modelAdvertisement = new AdvertisementModel();
			// If Parameter 1 is set, check if it is a advertisement
			$advertisement = $modelAdvertisement->where('slug',$param)->first();

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
				$seo['title'] = $advertisement['title'];

				echo view('Templates/Header', $seo);
				echo view('Templates/Navbar', $data);
				echo view('view-ad', $data);
			} else {
				// Redirect to Homepage to Load All Advertisements if Advertisement doesn't exist.
				redirect()->to(base_url('/'));
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
			foreach ($data['category'] as $cat) {
				$count=0;
				foreach($data['advertisement'] as $ad) {
					if ($ad['cat_id'] == $cat['id']) {
						$count=$count+1;
					}
				}
				$adcounts[] = ["id" => $cat['id'], "count" => $count];
			}
			$data['count'] = $adcounts;

			echo view('Templates/Header', $seo);
			echo view('Templates/Navbar', $data);
			echo view('home', $data);
		}
	}

	//--------------------------------------------------------------------

}
