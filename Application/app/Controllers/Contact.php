<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\LocationModel;
use App\Models\SettingModel;
use App\Models\CategoryModel;
 
class Contact extends Controller
{
    /**
     * Index Page of Locations.
     * Lists all the locations with the ID, Name and Description.
     */
    public function index()
    {
        // Load Validation Service
        $validation =  \Config\Services::validation();
        // Load Email Service
        $email = \Config\Services::email();
    
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Contact Us';
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
        $validation->setRules([
            'name' => 'required|min_length[4]|max_length[25]',
            'email' => 'required|valid_email|min_length[6]|max_length[60]',
            'subject' => 'required|min_length[5]|max_length[50]',
            'message' => 'required|min_length[12]|max_length[200]'
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            echo view('Templates/Header', $seo);
            echo view('Templates/Navbar', $seo);
            return view('contact-us', $data);
        } else {
            // Read Form Data
            $name = $this->request->getVar('name');
            $fromemail = $this->request->getVar('email');
            $subject = $this->request->getVar('subject');
            $message = $this->request->getVar('message');

            // Load Administrator Email
            $admin_email = "";
            foreach ($seo['settings'] as $setting) {
                if ($setting['option_name'] == 'admin_email') {
                    $admin_email = $setting['option_value'];
                }
            }
            echo $admin_email;

            // Set Email Properties
            $email->setFrom($fromemail,$name);
            $email->setTo($admin_email);
            $email->setSubject('[Beluxa][Contact Form]'.$subject);
            $email->setMessage($message);

            if ($email->send()) {
                $data['success'] = "Successfully sent message!";
            } else {
                echo $email->printDebugger();
                $data['error'] = "Failed to send message!";
            }

        }
        
        echo view('Templates/Header', $seo);
        echo view('Templates/Navbar',$seo);
        return view('contact-us',$data);
    }
}