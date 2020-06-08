<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\LocationModel;
use App\Models\SettingModel;
 
class Location extends Controller
{
    /**
     * Index Page of Locations.
     * Lists all the locations with the ID, Name and Description.
     */
    public function index()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Locations';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new LocationModel();
                $data['location'] = $model->orderBy('country', 'ASC')->findAll();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('location', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }    
    
    /**
     * Create Page for Locations.
     * The Page provides a form to create a new location.
     */
    public function create()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Locations';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-location');
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Insert Categories to Database.
     * When a new category is created, it is to be inserted to the database.
     * Insert Category Name and Description to the database.
     */
    public function store()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Locations';
        $seo['admin'] = true;

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);

                $model = new LocationModel();

                $data = [
                    'country' => $this->request->getVar('country'),
                    'district' => $this->request->getVar('district'),
                    'city' => $this->request->getVar('city'),
                ];

                $save = $model->insert($data);
                
                return redirect()->to(base_url('location/create'))->with('msg','Successfully Saved Location');
            }
        }
        
        return redirect()->to(base_url('login'));
    }
    
    /**
     * Edit Page for editing an existing location.
     * The page provides a form to edit an existing location.
     * Given the Location ID, retrieve the location details and pass it to Edit Location Page.
     */
    public function edit($location_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Locations';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new LocationModel();
                $locations = $model->where('id', $location_id)->orderby('id', 'ASC')->findAll();
                
                foreach ($locations as $loc) {
                    $data['location'] = $loc;
                }

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('edit-category', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Update an Existing Category.
     * When an existing category is updated, update an existing category in the database.
     * The Description and the Name of the Category is updated.
     */
    public function update()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Locations';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);  
                $model = new LocationModel();
                $location_id = $this->request->getVar('location_id');
                $data = [
                    'country' => $this->request->getVar('country'),
                    'district' => $this->request->getVar('district'),
                    'city' => $this->request->getVar('city'),
                ];
                $save = $model->update($category_id,$data);
                
                return redirect()->to(base_url('location'))->with('msg','Successfully Updated Location');
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Delete an Existing Category.
     * When an existing category is deleted, it is deleted from the database.
     * Given the Category ID, delete the category from the database.
     */
    public function delete($location_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Categories';
        $seo['admin'] = true;

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new LocationModel();
                $data['location'] = $model->where('id', $location_id)->delete();

                return redirect()->to(base_url('location'));
            }
        }

        return redirect()->to(base_url('login'));
    }
}