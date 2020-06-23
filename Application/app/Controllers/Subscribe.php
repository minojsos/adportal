<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Models\SubscribeModel;

class Subscribe extends Controller
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
        $seo['title'] = 'Subscribers';
        $seo['admin'] = true;

        session()->start();;

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                $modelSubscriber = new SubscribeModel();

                $data['subscriber'] = $modelSubscriber->orderBy('id','ASC')->findAll();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('subscribe', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Allow Administrator to Delete an Existing Subscriber.
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