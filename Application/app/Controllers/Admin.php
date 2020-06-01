<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdvertisementModel;
use App\Models\MediaModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Models\LocationModel;

class Admin extends Controller
{

    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Dashboard';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true)) {
                $modelAdvertisement = new AdvertisementModel();
                $modelCustomer = new CustomerModel;
                $modelCategory = new CategoryModel();
                $modelAdmin = new UserModel();
                $modelLocation = new LocationModel();

                $data['advertisement'] = $modelAdvertisement->orderBy('id', 'DESC')->findAll();
                $data['countAd'] = count($data['advertisement']);
                $data['customer'] = $modelCustomer->orderBy('id','DESC')->findAll();
                $data['countCust'] = count($data['customer']);
                $data['category'] = $modelCategory->orderBy('id', 'ASC')->findAll();
                $data['countCat'] = count($data['category']);

                $data['admin'] = $modelAdmin->orderBy('id', 'ASC')->findAll();

                $districts=array();
                $data['location'] = $modelLocation->findAll();
                foreach ($data['location'] as $loc) {
                    if (!in_array($loc['district'], $districts)) {
                        $districts[] = $loc['district'];
                    }
                }
                $data['district']=$districts;
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('admin', $data);
            }
        }
        
        return redirect()->to(base_url('login'));
    }

}