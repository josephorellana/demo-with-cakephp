<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class AuthController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Auth->allow(['login']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Correo o contraseña incorrectos.');
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}