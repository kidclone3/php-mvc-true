<?php
namespace app\models;

use thecodeholic\phpmvc\Model;

class ProfileForm extends Model {

    public function updateProfile() {
        $user = UserDetails::findOne(['id' => $_SESSION['user']]);
        if (!$user) {
            $this->addError('id', 'User does not exist with this id');
            return false;
        }

        return $user->save();
    }
}