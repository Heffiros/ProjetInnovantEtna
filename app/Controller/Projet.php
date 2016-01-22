<?php 
namespace Controller;
use Minima\Controller\Base;
use Form;
use Model;

class Projet extends Base
{
	public function homeAction()
	{	
		$vals = array('id' => $_SESSION['user_id']);
		$user = Model\User::find($vals);
		
		$vals = array('id_group' => $_GET['projet']);
		$projet = Model\Projet::find($vals); 
		return array('user' => $user , 'projet' => $projet);
	}


	public function modifierProjetAction()
	{
		$sql = "UPDATE projet SET descriptif = :descriptif WHERE id = :id_projet";

		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':id_projet', $_POST['id_projet']);
		$stmt->bindParam(':descriptif', $_POST['descriptif']);
 		$stmt->execute();
 		echo BASEPATH . "index.php/projet/info?projet= " . $_POST['id_projet'];
 		$this->redirect("projet/info?projet=" . $_POST['id_projet']);
	}


}