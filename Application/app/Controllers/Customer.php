<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdvertisementModel;
use App\Models\MediaModel;
use App\Models\SettingModel;
use App\Models\UserModel;
use App\Models\CustomerModel;
use App\Models\LocationModel;

class Customer extends Controller
{

    /**
     * Index Page that Lists all the Customers
     */
    public function index()
    {
        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Customers';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true)) {
                $modelCustomer = new CustomerModel();

                $data['customer'] = $modelCustomer->orderBy('id', 'DESC')->findAll();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('customer', $data);
            }
        }
        
        return redirect()->to('login');
    }

    /**
     * Create Customers Page.
     * Allow Administrator to Create a New Customer.
     */
    public function create() {

        // Retrieve Website Settings and Title
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Customers';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == true)) {
                $modelLocation = new LocationModel();
                $data['location'] = $modelLocation->orderBy('city','ASC')->findAll();

                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('create-customer', $data);
            }
        }

        return redirect()->to(base_url('/login'));
    }

    /**
     * Fetch a Customer Given the name.
     */
    public function fetch() {
        $customerModel = new CustomerModel();
        $customers = $customerModel->orderBy('id','ASC')->findAll();
        $query = $this->request->getVar('query');
        
        if ($query != null) {
            foreach($customers as $customer) {
                $fullname = $customer['fname'].' '.$customer['lname'];
                if (strpos($fullname, $query) !== false) {
                    $data[] = array(
                        'fname' => $customer['fname'],
                        'lname' => $customer['lname'],
                        'phone' => $customer['contact_no']
                    );
                }
            }
            
            if (isset($data)) {
                echo json_encode($data);
            }
        } else {
            foreach($customers as $customer) {
                $data[] = array(
                    'fname' => $customer['fname'],
                    'lname' => $customer['lname'],
                    'phone' => $customer['contact_no']
                );
            }

            if (isset($data)) {
                echo json_encode($data);
            }
        }
    }

    /**
     * Store the New Customer and Display a Success Message.
     */
    public function store() {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Customers';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                helper(['form', 'url']);
                $model = new CustomerModel();
                $data = [
                    'fname' => $this->request->getVar('fname'),
                    'lname'  => $this->request->getVar('lname'),
                    'email'  => $this->request->getVar('email'),
                    'dob'  => $this->request->getVar('dob'),
                    'contact_no'  => $this->request->getVar('contact_no'),
                    'description'  => $this->request->getVar('description'),
                    'nic_no'  => $this->request->getVar('nic_no'),
                    'address'  => $this->request->getVar('address'),
                    'city' => $this->request->getVar('city'),
                    'passport_no'  => $this->request->getVar('passport_no'),
                    'password'  => $this->request->getVar('password'),
                ];
                $save = $model->insert($data);
                
                return redirect()->to(base_url('customer/create'))->with('msg','Successfully Saved Customer');
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * Edit Customer Page.
     * Allow Administrator to Edit an Existing Customer.
     */
    public function edit($customer_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Customers';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                $model = new CustomerModel();
                $data['customer'] = $model->where('id', $customer_id)->first();
                
                echo view('Templates/Header', $seo);
                echo view('Templates/Navigation');
                return view('edit-customer', $data);
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * Update a Customer and Display a Success Message.
     */
    public function update()
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Customers';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                helper(['form', 'url']);
                $model = new CustomerModel();
                $customer_id = $this->request->getVar('customer_id');
                
                $data = [
                    'fname' => $this->request->getVar('fname'),
                    'lname'  => $this->request->getVar('lname'),
                    'email'  => $this->request->getVar('email'),
                    'dob'  => $this->request->getVar('dob'),
                    'contact_no'  => $this->request->getVar('contact_no'),
                    'description'  => $this->request->getVar('description'),
                    'nic_no'  => $this->request->getVar('nic_no'),
                    'address'  => $this->request->getVar('address'),
                    'country' => $this->request->getVar('country'),
                    'district' => $this->request->getVar('district'),
                    'city' => $this->request->getVar('city'),
                    'passport_no'  => $this->request->getVar('passport_no'),
                ];

                $save = $model->update($customer_id,$data);

                $password = $this->request->getVar('password');
                $confirmPassword = $this->request->getVar('confirmPassword');

                if (!empty($password)) {
                    if (!empty($confirmPassword) && ($password == $confirmPassword)) {
                        $data = [
                            'password' => $password,
                        ];
                        
                        $save = $model->update($customer_id,$data);
                        $msg = "Successfully Updated Customer and Password";

                        return redirect()->to(base_url('customer'))->with($msg);

                    } else {
                        $error = "Passwords Don't Match";
                        return redirect()->to(base_url('customer'))->with($msg, $error);
                    }
                }
                
                return redirect()->to(base_url('customer'))->with('msg','Successfully Updated Customer');
            }
        }

        return redirect()->to(base_url('login'));
    }

    /**
     * Delete a Customer and Display a Success Message.
     */
    public function delete($customer_id = null)
    {
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Customers';
        $seo['admin'] = true;

        session()->start();

        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
                $model = new CustomerModel();
                $data['customer'] = $model->where('id', $customer_id)->delete();

                return redirect()->to(base_url('customer'))->with('msg', 'Successfully Deleted Customer');
            }
        }

        return redirect()->to(base_url('login'));
    }

}