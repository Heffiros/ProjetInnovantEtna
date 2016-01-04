<?php 
namespace Controller;
use Minima\Controller\Base;
use Form;
use Model;

//Il contiendra le formulaire d'inscription et de connexion
//Cette page pourrait être diviser en plusieurs partie comme la vitrine de la solution
// - Premère partie comme avant
// - Deuxième partie présentation de ce que l'on offre
// - Troisème partie Tarif etc
class Misc extends Base
{
	public function homeAction()
	{

		$form = new Form\Register($_POST, array('db' => $this->db));
		$form_login = new Form\Login($_POST, array('db' => $this->db));
        
        if ($this->method == 'POST' && $form->isValid()) {
            $user = new Model\User($form->getValues());
            $user->save();
            $_SESSION['user_id'] = $user->getPk();

            $this->redirect('backoffice');
        }

 		if ($this->method == 'POST' && $form_login->isValid()) {
 			$_SESSION['user_id'] = $form_login->getValues()['user_id'];
            $this->redirect('backoffice');
 		}
        return array('form' => $form, 'form_login' => $form_login);
	}
}