<?php

namespace Form;
use Minima\Form\Base;
use Model;

class Login extends Base {
    protected $fields = array('login', 'password');
    protected $validations = array(
        'mandatory' => array('login', 'password')
    );
    protected function validate()
    {
        $this->fields[] = 'user_id'; // hack
        
        $vals = array('login' => $this->values['login'], 'password' => $this->values['password']);
        if ($user = Model\User::find($vals)) {
            return $this->values['user_id'] = $user->getPk();
        } else {
            $this->errors['email'][] = 'Mauvais nom de compte / mot de passe';
        }
    }
}