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

	public function createTeam()
	{
		$sql = "INSERT *
    		FROM personne
			WHERE promotion = :promotion AND deleted_at = '0000-00-00' AND role = 0 AND id_group IS NULL";


		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':promotion', $_POST['promotion']);

 		$stmt->execute();


	}
}