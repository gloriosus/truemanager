<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {
    
    public $uses = array('User', 'Reward', 'Role');
    
    public function index() {
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
            return $this->render('/Admin/index');
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }
    
    public function rewards() {
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
            
            $rewards = $this->Reward->find('all');
            $this->set(compact('rewards'));
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }
    
    public function add_reward() {
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
        
            if ($this->request->is('post')) {
                
                $this->Reward->create();
                
                if ($this->Reward->save($this->request->data)) {
                    
                    $this->Flash->success(__('The reward has been added'));
                    return $this->redirect(array('action' => 'rewards'));
            }
                
                $this->Flash->error(
                    __('Произошла непредвиденная ошибка. Попробуйте снова')
                );
            }
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }
    
    public function edit_reward($id = null) {
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
            
            $this->Reward->id = $id;
            if (!$this->Reward->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Reward->save($this->request->data)) {
                    $this->Flash->success(__('Запись была успешно изменена'));
                    return $this->redirect(array('action' => 'rewards'));
                }
                $this->Flash->error(
                    __('Произошла ошибка. Попробуйте позже.')
                );
            } else {
                $this->request->data = $this->Reward->findById($id);
            }
            
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }
    
    public function delete_reward($id = null) {
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
        
            $this->Reward->id = $id;
            if (!$this->Reward->exists()) {
                throw new NotFoundException(__('Invalid reward'));
            }
            if ($this->Reward->delete()) {
                $this->Flash->success(__('Reward deleted'));
                return $this->redirect(array('action' => 'rewards'));
            }
            $this->Flash->error(__('Reward was not deleted'));
            return $this->redirect(array('action' => 'rewards'));
            
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }
    
    public function users($page = 1) {
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
            $rows = $this->User->find('count');

            if($rows % 10 != 0) {
                $totalpages = (($rows - ($rows % 10)) / 10) + 1;
            }
            else {
                $totalpages = ($rows - ($rows % 10)) / 10;
            }

            if($page >= 1 && $page <= $totalpages) {
                $users = $this->User->find('all', array(
                    'limit' => 10,
                    'offset' => ($page - 1) * 10
                ));
                
                $this->set(compact('users', 'page', 'totalpages'));
            }
            else {
                throw new NotFoundException('Такой страницы не существует');
            }
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }
    
    public function add_user() {
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
        
            if ($this->request->is('post')) {
                
                $role_id = $this->Role->find('all', array(
                    'fields' => array(
                        'id'
                    ),
                    'conditions' => array(
                        'Role.title' => $this->request->data['User']['role']
                    )
                ))[0]['Role']['id'];
                
                $this->request->data['User']['role_id'] = $role_id;
                
                $this->User->create();
                
                if ($this->User->save($this->request->data)) {
                    
                    $this->Flash->success(__('The user has been added'));
                    return $this->redirect(array('action' => 'users'));
            }
                
                $this->Flash->error(
                    __('Произошла непредвиденная ошибка. Попробуйте снова')
                );
            }
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }

    public function edit_user($id = null) {
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
            
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                $role_id = $this->Role->find('all', array(
                    'fields' => array(
                        'id'
                    ),
                    'conditions' => array(
                        'Role.title' => $this->request->data['User']['role']
                    )
                ))[0]['Role']['id'];
                
                $this->request->data['User']['role_id'] = $role_id;
                
                if ($this->User->save($this->request->data)) {
                    $this->Flash->success(__('The user has been saved'));
                    return $this->redirect(array('action' => 'users'));
                }
                $this->Flash->error(
                    __('The user could not be saved. Please, try again.')
                );
            } else {
                $this->request->data = $this->User->findById($id);
                unset($this->request->data['User']['password']);
            }
            
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }

    public function delete_user($id = null) {
        //$this->request->allowMethod('post');
        
        $role_id_admin = $this->Role->find('all', array(
            'fields' => array(
                'id'
            ),
            'conditions' => array(
                'Role.title' => 'admin'
            )
        ))[0]['Role']['id'];
        
        if ($this->Auth->user('role_id') == $role_id_admin) {
        
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->User->delete()) {
                $this->Flash->success(__('User deleted'));
                return $this->redirect(array('action' => 'users'));
            }
            $this->Flash->error(__('User was not deleted'));
            return $this->redirect(array('action' => 'users'));
            
        }
        else {
            throw new NotFoundException('У вас недостаточно прав для просмотра данной страницы');
        }
    }
    
    public function a_redirect() {
        return $this->redirect('/admin/users/page=1');
    }
    
}

?>