<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\SubcategoryModel;
 
class Subcategories extends Controller
{
 
    public function index()
    {    
        $model = new SubcategoryModel();
 
        $data['subcategories'] = $model->orderBy('sub_category_id', 'DESC')->findAll();
        
        return view('subcategories', $data);
    }    
 
    public function create()
    {    
        return view('create-subcategory');
    }
 
    public function store()
    {  
 
        helper(['form', 'url']);
         
        $model = new SubcategoryModel();
 
        $data = [
 
            'sub_category_name' => $this->request->getVar('sub_category_name'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('subcategories') );
    }
 
    public function edit($sub_category_id = null)
    {
      
     $model = new SubcategoryModel();

     $data['subcategory'] = $model->where('sub_category_id', $sub_category_id)->first();
 
     return view('edit-subcategory', $data);
    }
 
    public function update()
    {  
 
        helper(['form', 'url']);
         
        $model = new SubcategoryModel();
 
        $sub_category_id = $this->request->getVar('sub_category_id');
 
        $data = [
 
            'sub_category_name' => $this->request->getVar('sub_category_name'),
            ];
 
        $save = $model->update($sub_category_id,$data);
 
        return redirect()->to( base_url('subcategories') );
    }
 
    public function delete($sub_category_id = null)
    {
 
     $model = new SubcategoryModel();
 
     $data['subcategory'] = $model->where('sub_category_id', $sub_category_id)->delete();
      
     return redirect()->to( base_url('subcategories') );
    }
}