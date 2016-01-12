<div class="row">

<table id="enregistrement" class="display" cellspacing="0" width="90%">


    <thead>
        <tr>
            <th>Nom du projet</th>
            <th>Groupe login</th>
            <th>Date de création du group</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($groupe_projet as  $value) {
        	

        	foreach ($value as $student) {
        		echo $student['login'];
        	}
	    }
        ?>
    </tbody>
</table>


</div>