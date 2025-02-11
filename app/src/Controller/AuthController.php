<?php
namespace App\Controller;

use App\Controller\AppController;

class AuthController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->modelClass = false;
    }


    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        return $this->render();
    }


    public function logout()
    {
        return $this->redirect(['action' => 'login']);
    }
}