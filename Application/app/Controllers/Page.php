<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\PageModel;
use App\Models\AdvertisementModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Models\LocationModel;

class Page extends Controller
{

    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Pages';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $modelAdmin = new UserModel();
                $modelPage = new PageModel();

                $data['admin'] = $modelAdmin->orderBy('id', 'ASC')->findAll();
                $data['pages'] = $modelPage->orderBy('id', 'DESC')->findAll();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('pages', $data);
            }
        }
        
        return redirect()->to('login');
    }

}