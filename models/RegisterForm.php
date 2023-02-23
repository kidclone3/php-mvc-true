<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 9:36 AM
 */

namespace app\models;


use thecodeholic\phpmvc\Model;

/**
 * Class LoginForm
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\models
 */
class RegisterForm extends Model
{
    public string $email = '';
    public string $username = '';
    public string $firstname = '';
    public string $lastname = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function rules()
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => User::class]],
            'username' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => User::class]],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels()
    {
        return [
            'email' => 'Email',
            'username' => 'Username',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'password' => 'Password',
            'passwordConfirm' => 'Confirm Password'
        ];
    }

    public function placeholders()
    {
        return [
            'email' => 'Your email or username',
            'password' => 'Your password',
            'username' => 'Your username',
            'firstname' => 'Your first name',
            'lastname' => 'Your last name',
            'passwordConfirm' => 'Repeat your password'
        ];
    }

    public function register()
    {
//        $user = User::findOne(['email' => $this->email]);
//        if ($user) {
//            $this->addError('email', 'There is already an account with this email address');
//                return false;
//        }
//        $user = User::findOne(['username' => $this->username]);
//        if ($user) {
//            $this->addError('username', 'There is already an account with this username');
//            return false;
//        }
        if ($this->password !== $this->passwordConfirm) {
            $this->addError('confirmPassword', 'Passwords do not match');
            return false;
        }
        $registerUser = new User();
        $registerUserDetails = new UserDetails();
        $registerUser->loadData(['email'=>$this->email, 'username'=>$this->username, 'password'=>$this->password]);
        $registerUserDetails->loadData(['username'=>$this->username, 'firstname'=>$this->firstname, 'lastname'=>$this->lastname]);
        $registerUser->save();
        $registerUserDetails->save();
        return true;
    }
}