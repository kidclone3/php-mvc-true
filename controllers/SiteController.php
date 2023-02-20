<?php
/**
 * User: TheCodeholic
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace app\controllers;


use app\models\UserDetails;
use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\middlewares\AuthMiddleware;
use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;

/**
 * Class SiteController
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home()
    {
        return $this->render('home', [
            'name' => 'TheCodeholic'
        ]);
    }

    public function login(Request $request)
    {
//        echo '<pre>';
//        var_dump($request->getBody(), $request->getRouteParam('id'));
//        echo '</pre>';
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new User();
        $registerUserDetails = new UserDetails();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            $registerUserDetails->loadData(['username'=>$request->getBody()['username']]);
            if ($registerModel->validate() && $registerModel->save() && $registerUserDetails->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }

        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function profile(Request $request)
    {
        if ($request->isPost()) {
            $request->getBody();
            $updateProfile = UserDetails::findOne(['username'=>Application::$app->user->username]);
            $request_body =  $request->getBody();
            unset($request_body['username']);
            $updateProfile->loadData($request_body);
            $updateProfile->update();
//            echo '<pre>';
//            var_dump($updateProfile);
//            echo '</pre>';
        }
        $this->setLayout('child');
        return $this->render('profile');
    }

    public function profileWithId(Request $request)
    {
        echo '<pre>';
        var_dump($request->getBody());
        echo '</pre>';
    }
}
