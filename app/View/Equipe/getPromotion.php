<div class="row">
	<div id="contenu_data"></div>
	<div class="container">
		<?php  echo "<form method='POST' action='equipe/create'>" ?> 
  		<fieldset class="form-group">
    	<label for="team">Coach</label>
    	<select class="form-control" name="coach">
			<?php
			foreach ($coach as $value) {
				echo "<option value='".$value['login']."'>".$value['login']."</option>";
		}
			?>
		</select>
  		</fieldset>

  		<fieldset class="form-group">
    	<label for="team">Nom Projet</label>
		<input class="form-control" type="text" name="nomprojet" multiple required>
		</fieldset>

  		<fieldset class="form-group">
    	<label for="team">Chef de groupe</label>
		<input class="form-control" list="allStudent" type="text" name="chef" multiple required>
		</fieldset>


		<fieldset class="form-group">
    	<label for="team">Etudiant 1</label>
		<input class="form-control" list="allStudent" type="text" name="student1" multiple required>
		</fieldset>


		<fieldset class="form-group">
    	<label for="team">Etudiant 2</label>
		<input class="form-control" list="allStudent" type="text" name="student2" multiple>
		</fieldset>


		<fieldset class="form-group">
    	<label for="team">Etudiant 3</label>
		<input class="form-control" list="allStudent" type="text" name="student3" multiple>
		</fieldset>


		<input type="submit" class="btn btn-success" value="Créer Equipe"></button>

	<datalist id="allStudent">
	<?php
	foreach ($studentInPromo as $value) {
		echo "<option>" .  $value['login'] . "</option>";
	}
	?>
	</datalist>	 
		</form>
  </div>
</div>