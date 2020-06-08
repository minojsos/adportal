<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdvertisementModel;
use App\Models\MediaModel;
use App\Models\SettingModel;
use App\Models\UserModel;
use App\Models\CustomerModel;

class Customer extends Controller
{

    /**
     * Index Page that lists all the Frequently Asked Questions.
     */
    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Frequently Asked Questions';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $modelFAQ = new FAQModel();

                $data['faq'] = $modelFAQ->orderBy('id', 'DESC')->findAll();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('faq', $data);
            }
        }
        
        return redirect()->to(base_url('login'));
    }

    /**
     * Create Frequently Asked Question Page.
     * Allow the Administrator to Add a New Question.
     */
    public function create() {

        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Frequently Asked Questions';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-faq');
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * Store a Frequently Asked Question and Display a Success Message.
     */
    public function store() {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Frequently Asked Questions.';
        $seo['admin'] = true;

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);  
                $model = new FAQModel();
                $data = [
                    'question' => $this->request->getVar('question'),
                    'answer' => $this->request->getVar('answer'),
                ];
                $save = $model->insert($data);
                
                return redirect()->to(base_url('faq/create'))->with('msg','Successfully Saved FAQ');
            }
        }
        
        return redirect()->to(base_url('login'));
    }

    /**
     * Edit Frequently Asked Question Page.
     * Allow the Administrator to Edit a Question.
     */
    public function edit($faq_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Frequently Asked Questions';
        $seo['admin'] = true;

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new UserModel();
                $data['faq'] = $model->where('id', $faq_id)->first();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('edit-faq', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Update a Frequently Asked Question and Display a Success Message.
     */
    public function update()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Users';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);
                $model = new FAQModel();
                $faq_id = $this->request->getVar('faq_id');
                
                $data = [
                    'question' => $this->request->getVar('question'),
                    'answer' => $this->request->getVar('answer'),
                ];

                $save = $model->update($faq_id,$data);
                
                return redirect()->to(base_url('faq'))->with('msg','Successfully Updated FAQ');
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * Delete a Frequently Asked Question and Display a Success Message.
     */
    public function delete($faq_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Users';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new FAQModel();
                $data['faq'] = $model->where('id', $faq_id)->delete();

                return redirect()->to(base_url('faq'))->with('msg', 'Successfully Deleted FAQ');
            }
        }

        return redirect()->to(base_url('login'));
    }

}