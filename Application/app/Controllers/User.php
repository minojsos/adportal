<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\SettingModel;
 
class User extends Controller
{

    /**
     * 
     */
    public function index()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Users';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new UserModel();
                $data['user'] = $model->orderBy('id', 'DESC')->findAll();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('user', $data);
            }
        }
        
        return redirect()->to(base_url('login'));
    }    
    
    /**
     * 
     */
    public function create()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Users';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-user');
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * 
     */
    public function store()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Users';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
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
                
                return redirect()->to(base_url('user/create'))->with('msg','Successfully Saved User');
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * 
     */
    public function edit($user_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Users';

        session()->start();
        
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new UserModel();
                $data['user'] = $model->where('id', $user_id)->first();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('edit-user', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }
    
    /**
     * 
     */
    public function update()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Users';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                helper(['form', 'url']);
                $model = new UserModel();
                $user_id = $this->request->getVar('user_id');
                $data = [
                    'username' => $this->request->getVar('username'),
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
                $msg = "Successfully Updated User";

                $password = $this->request->getVar('password');
                $confirmPassword = $this->request->getVar('confirmPassword');

                if (!empty($password)) {
                    if (!empty($confirmPassword) && ($password == $confirmPassword)) {
                        $data = [
                            'password' => $password,
                        ];
                        $save = $model->update($user_id,$data);
                        $msg = "Successfully Updated User and Password";

                        return redirect()->to(base_url('user'))->with($msg);

                    } else {
                        $error = "Passwords Don't Match";
                        return redirect()->to(base_url('user'))->with($msg, $error);
                    }
                }
                
                return redirect()->to(base_url('user'))->with($msg);
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * 
     */
    public function delete($user_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Users';

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true) && ($_SESSION['privilege'] == 1)) {
                $model = new UserModel();
                $data['user'] = $model->where('id', $user_id)->delete();

                return redirect()->to(base_url('user'))->with('msg','Successfully Deleted User');
            }
        }

        return redirect()->to(base_url('login'));
    }
}