<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdvertisementModel;
use App\Models\MediaModel;
use App\Models\SettingModel;
use App\Models\UserModel;

class Media extends Controller
{

    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Media';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $modelMedia = new MediaModel();

                $data['media'] = $modelMedia->orderBy('id', 'DESC')->findAll();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('media', $data);
            }
        }
        
        return redirect()->to(base_url('login'));
    }

    /**
     * Edit Frequently Asked Question Page.
     * Allow the Administrator to Edit a Question.
     */
    public function edit($media_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Media';

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new UserModel();
                $data['faq'] = $model->where('id', $media_id)->first();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('edit-media', $data);
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
        $seo['title'] = 'Media';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);
                $model = new MediaModel();
                $media_id = $this->request->getVar('media_id');
                
                $data = [
                    'title' => $this->request->getVar('title'),
                    'alt' => $this->request->getVar('alt'),
                    'caption' => $this->request->getVar('caption'),
                    'featured' => $this->request->getVar('featured'),
                ];

                $save = $model->update($media_id,$data);
                
                return redirect()->to(base_url('media'))->with('msg','Successfully Updated Media');
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
        $seo['title'] = 'Media';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new MediaModel();
                $data['faq'] = $model->where('id', $media_id)->delete();

                return redirect()->to(base_url('media'))->with('msg', 'Successfully Deleted Media');
            }
        }

        return redirect()->to(base_url('login'));
    }



}