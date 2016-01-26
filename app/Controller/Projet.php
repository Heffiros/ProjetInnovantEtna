<?php
namespace Controller;
use Minima\Controller\Base;
use Form;
use Model;

class Projet extends Base
{
	public function homeAction()
	{	
		$meeting = array();
		$vals = array('id' => $_SESSION['user_id']);
		$user = Model\User::find($vals);
		
		$vals = array('id_group' => $_GET['projet']);
		$projet = Model\Projet::find($vals); 
	
		$id_group = $projet['id_group'];
		$sql = "SELECT * FROM meeting WHERE id_group = $id_group ORDER BY updated_at";
		$meeting = $this->db->query($sql);
		$meeting = $meeting->fetchAll();
		
		return array('user' => $user , 'projet' => $projet, 'meeting' => $meeting);
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