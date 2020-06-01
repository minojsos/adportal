<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AdvertisementModel;
use App\Models\CategoryModel;
use App\Models\LocationModel;
use App\Models\SettingModel;
use App\Models\SubcategoryModel;

class Login extends Controller
{
	/**
	 * Load Login Page with all the required content
	 * If a POST request is sent to the page, process the request to log the user into their account.
	 */
	public function index()
	{
		$encrypter = \Config\Services::encrypter();

        // Retrieve Website Settings and Title.
        $modelSetting = new SettingModel();
        $seo['settings'] = $modelSetting->orderBy('id', 'ASC')->findAll();
        $seo['title'] = 'Login';

		session()->start();
		
		// Check if the User has already logged In.
		// If User has already logged in, redirect to dashboard.
        if (isset($_SESSION)) {
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
				return redirect()->to('admin');
            }
        }

		// If a POST request has been recieved, then process the request.
		// The POST request should be login request.
        $data = [];
		helper(['form']);
		if ($this->request->getMethod() == 'post') {

			//let's do the validation here
			$rules = [
				'username' => 'required|min_length[6]|max_length[25]',
				'password' => 'required|min_length[6]|max_length[255]|validateUser[username,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Invalid Username or Password'
				]
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				
				$model = new UserModel();
				$user = $model->where('username', $this->request->getVar('username'))->first();
				
				if ($user['status'] == 1) {
					$this->setUserSession($user);
					return redirect()->to(base_url('admin'));
				}

				return redirect()->to(base_url('login'))->with('error','Inactive Account');
			}
		}

        echo view('Templates/Header', $seo);
        echo view('login_form', $data);

	}

	private function setUserSession($user){
		
		// if (!isset($_SESSION)) {
		// 	session()->start();
		// } else {
		// 	session()->destroy();
		// }
		session()->start();

		$data = [
            'id' => $user['id'],
            'username' => $user['username'],
			'firstname' => $user['fname'],
			'lastname' => $user['lname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
			'privilege' => $user['privilege'],
		];

		session()->set($data);
		return true;
	}

	public function logout(){
		session()->destroy();
		return redirect()->to(base_url('login'));
	}

	//--------------------------------------------------------------------

}