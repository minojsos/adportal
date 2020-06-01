<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\SettingModel;
 
class Subcategories extends Controller
{
    /**
     * Index Page of SubCategories.
     * Lists all the subcategories with the ID, Name and Description.
     */
    public function index()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Subcategories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $subcategoryModel = new SubcategoryModel();
                $categoryModel = new CategoryModel();
                
                $data['subcategories'] = $subcategoryModel->orderBy('sub_category_name', 'ASC')->findAll();
                $data['category'] = $categoryModel->orderBy('category_name', 'ASC')->findAll();


                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('subcategories', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }    
    
    /**
     * Create Page for SubCategories.
     * The Page provides a form to create a new subcategory.
     */
    public function create()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Subcategories';

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new CategoryModel();
                $data['category'] = $model->orderBy('category_name','ASC')->findAll();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-subcategory', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Insert SubCategories to Database.
     * When a new subcategory is created, it is to be inserted to the database.
     * Insert SubCategory Name and Description to the database.
     */
    public function store()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Subcategories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);
                $model = new SubcategoryModel();
                $data = [
                    'sub_category_name' => $this->request->getVar('sub_category_name'),
                    'sub_category_desc' => $this->request->getVar('sub_category_desc'),
                    'category_id' => $this->request->getVar('category_id'),
                    ];
                $save = $model->insert($data);
                
                return redirect()->to(base_url('subcategories/create'))->with('msg','Successfully Saved SubCategory');
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Edit Page for editing an existing subcategory.
     * The page provides a form to edit an existing subcategory.
     * Given the SubCategory ID, retrieve the subcategory details and pass it to Edit SubCategory Page.
     */
    public function edit($sub_category_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Subcategories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new SubcategoryModel();
                $categoryModel = new CategoryModel();

                $subcategories = $model->where('id', $sub_category_id)->findAll();
                $data['category'] = $categoryModel->orderBy('category_name','ASC')->findAll();

                foreach ($subcategories as $subcat) {
                    $data['subcategory'] = $subcat;
                }
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('edit-subcategory', $data);
            }
        }
        
        return redirect()->to(base_url('login'));
    }
    
    /**
     * Update an Existing SubCategory.
     * When an existing subcategory is updated, update an existing subcategory in the database.
     * The Description and the Name of the SubCategory is updated.
     */
    public function update()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'SubCategories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);  
                $model = new SubcategoryModel();
                $sub_category_id = $this->request->getVar('sub_category_id');
                $data = [
                    'sub_category_name' => $this->request->getVar('sub_category_name'),
                    'sub_category_desc' => $this->request->getVar('sub_category_desc'),
                ];
                $save = $model->update($sub_category_id,$data);
                
                return redirect()->to(base_url('subcategories'))->with('msg','Successfully Updated SubCategory');
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Delete an Existing SubCategory.
     * When an existing subcategory is deleted, it is deleted from the database.
     * Given the SubCategory ID, delete the subcategory from the database.
     */
    public function delete($sub_category_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'SubCategories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new SubcategoryModel();
                $data['subcategory'] = $model->where('id', $sub_category_id)->delete();
                
                return redirect()->to(base_url('subcategories'))->with('msg','Successfully Deleted SubCategory');
            }
        }

        return redirect()->to('login');
    }
}