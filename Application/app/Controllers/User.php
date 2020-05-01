<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class User extends Controller
{
 
    public function index()
    {    
        $model = new UserModel();
 
        $data['user'] = $model->orderBy('user_id', 'DESC')->findAll();
        
        return view('user', $data);
    }    
 
    public function create()
    {    
        return view('create-user');
    }
 
    public function store()
    {  
 
        helper(['form', 'url']);
         
        $model = new UserModel();
 
        $data = [
 
            'username' => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
            'email'  => $this->request->getVar('email'),
            'fname'  => $this->request->getVar('fname'),
            'lname'  => $this->request->getVar('lname'),
            'dob'  => $this->request->getVar('dob'),
            'privilege'  => $this->request->getVar('privilege'),
            'contact_no'  => $this->request->getVar('contact_no'),
            'description'  => $this->request->getVar('description'),
            'status'  => $this->request->getVar('status'),
            'nic'  => $this->request->getVar('nic'),
            'passport_no'  => $this->request->getVar('passport_no'),
            'address'  => $this->request->getVar('address'),
            'country'  => $this->request->getVar('country'),
            'city'  => $this->request->getVar('city'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('user') );
    }
 
    public function edit($user_id = null)
    {
      
     $model = new UserModel();
 
     $data['user'] = $model->where('user_id', $user_id)->first();
 
     return view('edit-user', $data);
    }
 
    public function update()
    {  
 
        helper(['form', 'url']);
         
        $model = new UserModel();
 
        $user_id = $this->request->getVar('user_id');
 
        $data = [
 
            'username' => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
            'email'  => $this->request->getVar('email'),
            'fname'  => $this->request->getVar('fname'),
            'lname'  => $this->request->getVar('lname'),
            'dob'  => $this->request->getVar('dob'),
            'privilege'  => $this->request->getVar('privilege'),
            'contact_no'  => $this->request->getVar('contact_no'),
            'description'  => $this->request->getVar('description'),
            'status'  => $this->request->getVar('status'),
            'nic'  => $this->request->getVar('nic'),
            'passport_no'  => $this->request->getVar('passport_no'),
            'address'  => $this->request->getVar('address'),
            'country'  => $this->request->getVar('country'),
            'city'  => $this->request->getVar('city'),
            ];
 
        $save = $model->update($user_id,$data);
 
        return redirect()->to( base_url('user') );
    }
 
    public function delete($user_id = null)
    {
 
     $model = new UserModel();
 
     $data['user'] = $model->where('user_id', $user_id)->delete();
      
     return redirect()->to( base_url('user') );
    }
}