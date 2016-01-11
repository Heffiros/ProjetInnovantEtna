<?php 
namespace Controller;
use Minima\Controller\Base;
use Form;
use Model;

class Equipe extends Base
{
	public function homeAction()
	{	
		$vals = array('id' => $_SESSION['user_id']);
		$user = Model\User::find($vals);

		$sql = "SELECT DISTINCT promotion FROM personne";

		foreach  ($this->db->query($sql) as $row) {
        	$allPromotion[] = $row['promotion'];
  		}
		return array('user' => $user, 'allPromotion' => $allPromotion);
	}


	public function getPromotionAction()
	{
		//Récuperation des étudiants en fonction de la promo
		$studentInPromo = array();
		$sql = "SELECT *
    		FROM personne
			WHERE promotion = :promotion AND deleted_at = '0000-00-00' AND role = 0 AND id_group IS NULL";


		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':promotion', $_POST['promotion']);

 		$stmt->execute();
 		while ($row = $stmt->fetch()) {
 			$studentInPromo[] = $row;
		}

		//Recuperation des coachs
		$sql = "SELECT *
    		FROM personne
			WHERE deleted_at = '0000-00-00' AND role = 1";


		$stmt = $this->db->prepare($sql);

 		$stmt->execute();
 		while ($row = $stmt->fetch()) {
 			$coach[] = $row;
		}

		return array('studentInPromo' => $studentInPromo, 'coach' => $coach);
	}

	public function createTeamAction()
	{
		$coach = array('login' => $_POST['coach']);
		$chef = array('login' => $_POST['chef']);
		$student1 = array('login' => $_POST['student1']);
		$student2 = array('login' => $_POST['student2']);
		$student3 = array('login' => $_POST['student3']);

		$coach = Model\User::find($coach);
		$chef = Model\User::find($chef);
		$student1 = Model\User::find($student1);
		$student2 = Model\User::find($student2);
		$student3 = Model\User::find($student3);


		$id_group = $this->getLastId();

		$sql = "INSERT INTO groupe_projet (id, id_coach, id_personne, created_at, updated_at) 
		VALUES ($id_group, ".$coach->getId().", " .$chef->getId().", NOW(), NOW()),
		($id_group, ".$coach->getId().", ".$student1->getId().", NOW(), NOW()),
		($id_group, ".$coach->getId().", ".$student2->getId().", NOW(), NOW()),
		($id_group, ".$coach->getId().", ".$student3->getId().", NOW(), NOW())
		";
		$this->db->query($sql);

		$sql = "UPDATE personne SET id_group = $id_group WHERE login IN (:chef, :student1, :student2, :student3)";

		$stmt = $this->db->prepare($sql);
	}

	private function getLastId()
	{
		$sql = "SELECT MAX(id) as maxID FROM groupe_projet WHERE 1";
		$maxID = $this->db->query($sql);
		$maxID = $maxID->fetchAll();
		if ($maxID[0]['maxID'] == NULL)
			return (1);
		else
			return ($maxID[0]['maxID'] + 1);
		exit();
	}

}