<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\SettingModel;
 
class Setting extends Controller
{
    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Settings';
        $seo['admin'] = true;

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $data['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('settings', $seo);
            }
        }

        return redirect()->to(base_url('login'));
    }

    public function update() {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Settings';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);
                $model = new SettingModel();
                
                $data = [
                    'option_name' => 'site_title',
                    'option_value' => $this->request->getVar('site_title'),
                ];

                $model->update(1,$data);
                
                $data = [
                    'option_name' => 'site_desc',
                    'option_value' => $this->request->getVar('site_desc'),
                ];

                $model->update(2,$data);

                $data = [
                    'option_name' => 'seo_desc',
                    'option_value' => $this->request->getVar('seo_desc'),
                ];

                $model->update(3,$data);

                $data = [
                    'option_name' => 'seo_keywords',
                    'option_value' => $this->request->getVar('seo_keywords'),
                ];

                $model->update(4,$data);

                $data = [
                    'option_name' => 'seo_authors',
                    'option_value' => $this->request->getVar('seo_authors'),
                ];

                $model->update(5,$data);

                $data = [
                    'option_name' => 'site_logo',
                    'option_value' => $this->request->getvar('site_logo'),
                ];

                $model->update(6,$data);

                $data = [
                    'option_name' => 'admin_email',
                    'option_value' => $this->request->getVar('admin_email'),
                ];

                $model->update(7,$data);

                $data = [
                    'option_name' => 'site_favicon',
                    'option_value' => $this->request->getVar('site_favicon'),
                ];

                $model->update(8,$data);

                return redirect()->to(base_url('setting'))->with('msg','Successfully Updated Settings');
            }
        }

        return redirect()->to(base_url('login'));
    }
}