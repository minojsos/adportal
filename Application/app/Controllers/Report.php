<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdvertisementModel;
use App\Models\ReportModel;
use App\Models\SettingModel;
use App\Models\UserModel;

class Report extends Controller
{
    /**
     * Display all Reports Made
     */
    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Reported Ads';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $modelReport = new ReportModel();

                $data['report'] = $modelReport->orderBy('id', 'DESC')->findAll();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('reports', $data);
            }
        }
        
        return redirect()->to(base_url('login'));
    }

    /**
     * Delete a Report made on an Advertisement
     */
    public function delete($report_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Reports';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new ReportModel();
                $data['report'] = $model->where('id', $report_id)->delete();

                return redirect()->to(base_url('report'))->with('msg', 'Successfully Deleted Report for an Advertisemnet');
            }
        }

        return redirect()->to(base_url('login'));
    }



}