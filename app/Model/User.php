<?php
namespace Model;
use PotterORM\Base;

class User extends Base
{
	static protected $table = 'esti_user';
	static protected $pk = 'id';
	static protected $fields = array('mail', 'password');
    
    public function save()
    {
        if (!$this->exists())
            $this->values['password'] = $this->values['password'];
        parent::save();
    }
}