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

		return array('studentInPromo' => $studentInPromo, 'coach' => $coach, 'promotion' => $_POST['promotion']);
	}

	public function createTeamAction()
	{

		$array_id = array();
		
		$coach = array('login' => $_POST['coach']);
		$coach = Model\User::find($coach);
		

		$chef = array('login' => $_POST['chef']);
		$chef = Model\User::find($chef);
		$array_id[] = $chef->getId(); 
		
		$student1 = array('login' => $_POST['student1']);
		$student1 = Model\User::find($student1);
		$array_id[] = $student1->getId(); 
		

		if ($_POST['student2']) {
			$student2 = array('login' => $_POST['student2']);
			$student2 = Model\User::find($student2);
			$array_id[] = $student2->getId(); 
		}
		if ($_POST['student3']) {
			$student3 = array('login' => $_POST['student3']);
			$student3 = Model\User::find($student3);			
			$array_id[] = $student3->getId(); 
		}
		
		//On récupère le dernière ID group utilisé
		$id_group = $this->getLastId();

		//On relie les étudiants pour former le groupes
		$this->insertNewGroup($coach, $array_id, $id_group);
		$this->updateGroupId($id_group, $array_id);
		$this->createProject($id_group, $coach->getId(), $_POST['nomprojet']);
		$this->redirect('equipe');
	}


	public function affDatatableAction()
	{
		$groupe_projet = array();
		$sql = "SELECT * FROM personne PERS
		JOIN groupe_projet GRP
		ON  PERS.id = GRP.id_personne
		JOIN projet PRO
		ON GRP.id_projet = PRO.id
		WHERE PERS.promotion = :promotion AND PERS.id_group IS NOT NULL AND PRO.deleted_at = '0000-00-00'";

		$stmt = $this->db->prepare($sql);

		$stmt->bindParam(':promotion', $_POST['promotion']);

 		$stmt->execute();
 		while ($row = $stmt->fetch()) {
 			$groupe_projet[$row['id_group']]['student'][] = $row;
 			$groupe_projet[$row['id_group']]['project'][] = $row['nom'];
		}
		return array('groupe_projet' => $groupe_projet);
	}


	public function deleteGroupAction()
	{
		$sql = "UPDATE groupe_projet SET deleted_at = NOW() WHERE id = :id_group";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':id_group', $_POST['id_group']);

 		$stmt->execute();

 		$sql = "UPDATE personne SET id_group = NULL WHERE id_group = :id_group";
 		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':id_group', $_POST['id_group']);

 		$stmt->execute();

 		$sql = "UPDATE projet SET deleted_at = NOW() WHERE id_group = :id_group";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':id_group', $_POST['id_group']);

 		$stmt->execute();
 		$this->redirect('equipe');
 	}


	private function createProject($id_group, $id_coach, $nomprojet)
	{
		$sql = "INSERT INTO projet (id_group, id_coach, nom, status_projet, created_at, updated_at) VALUES ($id_group, $id_coach, '$nomprojet', 0, CURDATE(), CURDATE() )";
		$this->db->query($sql);
		$sql = "SELECT * FROM projet WHERE nom = '$nomprojet'";

		$id_projet = $this->db->query($sql);
		$id_projet = $id_projet->fetchAll();

		$sql = "UPDATE groupe_projet SET id_projet = " . $id_projet[0]['id'] ." WHERE id = $id_group";
		$id_projet = $this->db->query($sql);
		return ;
	}

	private function updateGroupId($id_group, $array_id)
	{	
		$sql = "UPDATE personne SET id_group = $id_group WHERE id IN (";

		foreach ($array_id as $value) {
			$sql .= $value .',';
		}
		$sql[strlen($sql) -1] = ')';
		$this->db->query($sql);
	}


	private function insertNewGroup($coach, $array_id, $id_group)
	{
		$sql = "INSERT INTO groupe_projet (id, id_coach, id_personne, created_at, updated_at) VALUES " ;
		foreach ($array_id as $value) {
			$sql .= "($id_group, ".$coach->getId().", " .$value.", NOW(), NOW()),";
		}
		$sql[strlen($sql) -1] = '';

		$this->db->query($sql);
		return 0;
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