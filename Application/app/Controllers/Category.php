<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\CategoryModel;
 
class Category extends Controller
{
 
    public function index()
    {    
        $model = new CategoryModel();
 
        $data['category'] = $model->orderBy('category_id', 'DESC')->findAll();
        
        return view('category', $data);
    }    
 
    public function create()
    {    
        return view('create-category');
    }
 
    public function store()
    {  
 
        helper(['form', 'url']);
         
        $model = new CategoryModel();
 
        $data = [
 
            'category_name' => $this->request->getVar('category_name'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('category') );
    }
 
    public function edit($category_id = null)
    {
      
     $model = new CategoryModel();
 
     $data['categoryObj'] = $model->where('category_id', $category_id)->first();

     return view('edit-category', $data);
    }
 
    public function update()
    {  
 
        helper(['form', 'url']);
         
        $model = new CategoryModel();
 
        $category_id = $this->request->getVar('category_id');
 
        $data = [
            'category_name'  => $this->request->getVar('category_name'),
            ];
 
        $save = $model->update($category_id,$data);
 
        return redirect()->to( base_url('category') );
    }
 
    public function delete($category_id = null)
    {
 
     $model = new CategoryModel();
 
     $data['categoryObj'] = $model->where('category_id', $category_id)->delete();
      
     return redirect()->to( base_url('category') );
    }
}