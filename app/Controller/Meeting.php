<?php 
namespace Controller;
use Minima\Controller\Base;
use Form;
use Model;

class Meeting extends Base
{
	public function homeAction()
	{	
		$vals = array('id' => $_SESSION['user_id']);
		$user = Model\User::find($vals);
		return array('user' => $user);
	}
}