<div class="row">
	<div id="contenu_data"></div>
	<div class="container">
		<fieldset class="form-group">
    	<label for="team">Nom Equipe</label>
    	<input type="text" class="form-control" id="team" placeholder="Entrer nom equipe">
  		</fieldset>


  		<fieldset class="form-group">
    	<label for="team">Coach</label>
    	<select name="carlist" class="form-control">
			<?php
			foreach ($coach as $value) {
				echo "<option value='".$value['login']."'>".$value['login']."</option>";
		}
			?>
		</select>
  		</fieldset>


  		<fieldset class="form-group">
    	<label for="team">Chef de groupe</label>
		<input class="form-control" list="allStudent" type="text" id="chef" multiple required>
		</fieldset>


		<fieldset class="form-group">
    	<label for="team">Etudiant 1</label>
		<input class="form-control" list="allStudent" type="text" id="student1" multiple required>
		</fieldset>


		<fieldset class="form-group">
    	<label for="team">Etudiant 2</label>
		<input class="form-control" list="allStudent" type="text" id="student2" multiple required>
		</fieldset>


		<fieldset class="form-group">
    	<label for="team">Etudiant 3</label>
		<input class="form-control" list="allStudent" type="text" id="student3" multiple required>
		</fieldset>


		<button type="submit" class="btn btn-success" onclick="enregistrer()">Créer Equipe</button>

	<datalist id="allStudent">
	<?php
	foreach ($studentInPromo as $value) {
		echo "<option>" .  $value['login'] . "</option>";
	}
	?>
	</datalist>	 
  </div>
</div>




<script>
	function enregistrer() {

		var team_name = $( "#team" ).val();
		var team_chef = $( "#chef" ).val();
		var team_student1 = $( "#student1" ).val();
		var team_student2 = $( "#student2" ).val();
		var team_student3 = $( "#student3" ).val();

		var base = <?php echo BASEPATH ?>;
        var url_create = base + 'index.php/equipe/create';

        $.ajax({
        async: true,
        type: 'POST',
        data: {team_name : team_name, team_chef : team_chef, team_student1 : team_student1, team_student2 : team_student2, team_student3 : team_student3},
        url: url_create,
        success: function(data){
          $("#contenu_data").html(data);
        }
        });
	}
</script>