<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\CategoryModel;
use App\Models\SettingModel;
 
class Category extends Controller
{
    /**
     * Index Page of Categories.
     * Lists all the categories with the ID, Name and Description.
     */
    public function index()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Categories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['privilege'] == 1) {
                $model = new CategoryModel();
                $data['category'] = $model->orderBy('category_name', 'ASC')->findAll();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('category', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }    
    
    /**
     * Create Page for Categories.
     * The Page provides a form to create a new category.
     */
    public function create()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Categories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['privilege'] == 1) {

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-category');
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
        $seo['title'] = 'Categories';

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['privilege'] == 1) {
                helper(['form', 'url']);

                $validated = $this->validate([
                    'category_icon' => [
                        'uploaded[category_icon]',
                        'mime_in[category_icon,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[category_icon,10000]',
                    ],
                ]);

                if ($validated) {
                    $model = new CategoryModel();
                    
                    $img = $this->request->getFile('category_icon');
                    $img->move(ROOTPATH . 'public/assets/uploads');

                    $data = [
                        'category_name' => $this->request->getVar('category_name'),
                        'category_desc' => $this->request->getVar('category_desc'),
                        'category_icon' => $img->getClientName(),
                    ];

                    $save = $model->insert($data);
                    
                    return redirect()->to(base_url('category/create'))->with('msg','Successfully Saved Category');
                } else {
                    return redirect()->to(base_url('category/create'))->with('error','Failed to Create Category');
                }
            }
        }
        
        return redirect()->to(base_url('login'));
    }
    
    /**
     * Edit Page for editing an existing category.
     * The page provides a form to edit an existing category.
     * Given the Category ID, retrieve the category details and pass it to Edit Category Page.
     */
    public function edit($category_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Categories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['privilege'] == 1) {
                $model = new CategoryModel();
                $categories = $model->where('id', $category_id)->orderby('id', 'ASC')->findAll();
                
                foreach ($categories as $cat) {
                    $data['categoryObj'] = $cat;
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
        $seo['title'] = 'Categories';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['privilege'] == 1) {
                helper(['form', 'url']);  
                $model = new CategoryModel();
                $category_id = $this->request->getVar('category_id');
                $data = [
                    'category_name' => $this->request->getVar('category_name'),
                    'category_desc' => $this->request->getVar('category_desc'),
                ];
                $save = $model->update($category_id,$data);
                
                return redirect()->to(base_url('category'))->with('msg','Successfully Updated Category');
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * Delete an Existing Category.
     * When an existing category is deleted, it is deleted from the database.
     * Given the Category ID, delete the category from the database.
     */
    public function delete($category_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Categories';

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true && $_SESSION['privilege'] == 1) {
                $model = new CategoryModel();
                $data['category'] = $model->where('id', $category_id)->delete();

                return redirect()->to(base_url('category'));
            }
        }

        return redirect()->to(base_url('login'));
    }
}