<?php
namespace Model;
use PotterORM\Base;

class Projet extends Base
{
	static protected $table = 'projet';
	static protected $pk = 'id';
	static protected $fields = array('id_group', 'id_coach', 'nom', 'descriptif', 'tag', 'status_projet', 'created_at', 'updated_at',  'deleted_at');
    
    public function save()
    {
        parent::save();
    }

    public function getId()
    {
    	return $this->values['id'];
    }
}