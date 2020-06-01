<?php
namespace App\Validation;

use App\Models\UserModel;

class UserRules {

    public function validateUser(String $str, String $fields, array $data) {
        $model = new UserModel();
        $user = $model->where('username', $data['username'])->first();

        // If a user is not present with the given username.
        if (!$user) {
            return false;
        }

        // If user is present, verify input password with actual password.
        return password_verify($data['password'], $user['password']);
    }
}
?>