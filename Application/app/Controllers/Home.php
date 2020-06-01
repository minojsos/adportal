<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\CategoryModel;
use App\Models\LocationModel;
use App\Models\AdvertisementModel;

class Home extends BaseController
{
	public function index()
	{
		$modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
		$seo['title'] = 'Home';

		session()->start();

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
		
		echo view('Templates/Header', $seo);
		echo view('Templates/Navbar', $data);
		echo view('home', $data);
	}

	//--------------------------------------------------------------------

}
