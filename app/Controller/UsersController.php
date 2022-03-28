<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
    
    public $uses = array('User', 'Reward', 'UsersReward');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'confirm', 'login', 'restore', 'test'); //Помечаем те действия, которые может выполнять неавторизованный пользователь
    }
    
    public function test(){
        /*$options['conditions'] = array(
            'Reward.id' => 1
        );
        
        $users = $this->Reward->find('all', $options);*/
        
        $userid = $this->User->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'User.username' => 'vecryd'
            )
        ))[0]['User']['id'];
        
        $ur = $this->UsersReward->find('all', array(
            'conditions' => array(
                'UsersReward.user_id' => $userid
            )
        ));
        
        debug($this->Auth->user('rewards'));
        
        $this->set(compact('ur'));
    }

    /*public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }*/

    public function register() {
        $this->layout = 'authform';
        
        if ($this->request->is('post')) {
            
            $date = new DateTime();
            $vcode = $date->getTimestamp();
            $this->request->data['User']['vcode'] = $vcode;
            $this->User->create();
            
            if ($this->User->save($this->request->data)) {
                
                $email = new CakeEmail('gmail');
                $email->from('vecryd@gmail.com');
                $email->to($this->request->data['User']['email']);
                $email->subject('Подтверждение регистрации');
                $email->viewVars(array(
                    'vcode' => $vcode,
                    'username' => $this->request->data['User']['username']
                ));
                $email->template('decor');
                $email->emailFormat('html');
                $email->send();
                
                $this->Flash->success(__('Вы успешно зарегистрировались. Проверьте ваш почтовый ящик, на который было выслано письмо с подтверждением регистрации'));
                return $this->redirect(array('action' => 'login'));
            }
            
            $this->Flash->error(
                __('Произошла непредвиденная ошибка. Попробуйте снова')
            );
        }
    }

    /*public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }*/
    
    public function login() {
        $this->layout = 'authform';
        
        if ($this->request->is('post')) {
            
            $arr = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $this->request->data['User']['username']
                ),
                'fields' => array(
                    'is_confirmed'
                )
            ));
            
            if ($arr['User']['is_confirmed'] == true) {
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error(__('Неправильный пароль или имя пользователя'));
            }
            else {
                $this->Flash->error(__('Ваш аккаунт еще не подтвержден'));
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    public function confirm() {     
        $this->layout = 'authform';
        
        if ($this->request->is('post')) {
            $arr = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $this->request->data['User']['username']
                )
            ));
            
            if ($this->request->data['User']['vcode'] == $arr['User']['vcode']) {
                
                $this->User->id = $arr['User']['id'];
                $this->request->data['User']['is_confirmed'] = true;
                
                if ($this->User->save($this->request->data)) {
                    $this->Flash->success(__('Ваш аккаунт успешно подтвержден'));
                    return $this->redirect(array('action' => 'login'));
                }
                else {
                     $this->Flash->error(__('Произошла непредвиденная ошибка. Попробуйте снова'));
                }
            }
            else {
                $this->Flash->error(__('Введен неверный идентификационный код'));
            }
        }
    }
    
    public function restore() {
        $this->layout = 'authform';
        
        if ($this->request->is('post')) {
            
            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $this->request->data['User']['username']
                )
            ));
            
            if ($user['User']['id'] != null) {
                $this->User->id = $user['User']['id'];
                
                $date = new DateTime();
                $pass = $date->getTimestamp();
                $this->request->data['User']['password'] = $pass;
                
                if ($this->User->save($this->request->data)) {
                    
                    $email = new CakeEmail('gmail');
                    $email->from('vecryd@gmail.com');
                    $email->to($user['User']['email']);
                    $email->subject('Восстановление пароля');
                    $email->viewVars(array(
                        'password' => $this->request->data['User']['password'],
                        'username' => $this->request->data['User']['username']
                    ));
                    $email->template('restore');
                    $email->emailFormat('html');
                    $email->send();
                    
                    $this->Flash->success(__('На ваш почтовый ящик '.$user['User']['email'].' был выслан новый пароль'));
                    return $this->redirect(array('action' => 'login'));
                }
                else {
                     $this->Flash->error(__('Произошла непредвиденная ошибка. Попробуйте снова'));
                }
            }
            else {
                $this->Flash->error(__('Такого пользователя не существует'));
            }
        }
    }

}

?>