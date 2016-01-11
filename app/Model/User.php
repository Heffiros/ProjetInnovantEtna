<?php
namespace Model;
use PotterORM\Base;

class User extends Base
{
	static protected $table = 'personne';
	static protected $pk = 'id';
	static protected $fields = array('login', 'password', 'mail', 'role', 'skype', 'promotion', 'id_group');
    
    public function save()
    {
        if (!$this->exists())
            $this->values['password'] = $this->values['password'];
        parent::save();
    }

    public function getId()
    {
    	return $this->values['id'];
    }

    public function getLogin()
    {
    	return $this->values['login'];
    }

    public function getAll()
    {
    	return $this->values;
    }
}