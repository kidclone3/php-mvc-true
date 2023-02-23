<?php
/**
 * User: TheCodeholic
 * Date: 7/8/2020
 * Time: 9:15 AM
 */

namespace app\models;


use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\UserModel;

/**
 * Class Register
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\models
 */
class User extends UserModel
{
    public int $id = 0;
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $username = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public string $created_at = '';


    public static function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {
        return ['username', 'email', 'password'];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Password Confirm'
        ];
    }

    public function rules()
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'passwordConfirm' => [[self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }

    public function getDisplayName(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getRole(): string
    {
        return 'Owner';
    }
}