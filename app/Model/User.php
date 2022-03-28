<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Поле "Имя пользователя" обязательно к заполнению'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Поле "Электронная почта" обязательно к заполнению'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Поле "Пароль" обязательно к заполнению'
            )
        ),
        'vcode' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Поле "Идентификационный код" обязательно к заполнению'
            )
        )
    );
    
    public $belongsTo = 'Role';
    public $hasMany = 'UsersReward';
    
    public function beforeSave($options = array()) {
        
        if (isset($this->data[$this->alias]['password'])) {

            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }

        return true;
        
    }
    
}

?>