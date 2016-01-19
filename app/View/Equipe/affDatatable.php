<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>	

<style type="text/css">
    #enregistrement_filter {
      margin-right:40%;
      margin-bottom: 10px;
    }
    #enregistrement_paginate {
        display: none;
    }
    .dataTables_length {
    display: none;
  }
  #menu {
    display: none;
  }
  #enregistrement {
    border: solid;
    border-color: #3B3A74;
    border-width: 5px;
    border-radius: 5px;
    box-shadow: 10px 10px 5px #888888;
  }
  th {
    text-align: center;
  }
  h1 {
    text-align: center;
  }
  thead {
    background-color: #3B3A74;
    color: white;
  }
</style>

</br>
<table id="enregistrement" class="display" cellspacing="0" width="90%">


    <thead>
        <tr>
            <th>Nom du projet</th>
            <th>Groupe login</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
       foreach ($groupe_projet as  $value) {
          $string = "";
        	echo "<tr>";
          $id = (int)$value['student'][0]['id_projet'];
        	echo "<th>".$value['project'][0]."</th>";
        	echo "<th>";
        	foreach ($value['student'] as $student) {
        		$string .=  $student['login'] . " - ";
        	}
          $string[strlen($string) - 2] = '';
          echo $string;
        	echo "</th>";
        	echo "<th><img src='".BASEPATH."app/Media/croix.png' onclick='delete_groupe($id)'></img>
                               <img src='".BASEPATH."app/Media/edit.png'></img>";
                    echo "</th>"; 
            echo "</tr>";
	    }
        ?>
    </tbody>
</table>

</div>

<!--<script>
    $(document).ready(function(){
    $('#enregistrement').DataTable({
        "ordering": false,
        "info":     false,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
      }
    });
});
</script>-->


<script type="text/javascript">
function delete_groupe(id_group) {

    var base = <?php echo BASEPATH ?>;
        var url_promo = base + 'index.php/equipe/delete';

        $.ajax({
        async: true,
        type: 'POST',
        data: {id_group : id_group},
        url: url_promo,
        success: function(data){
            var base = <?php echo BASEPATH ?>;
            var  url_redirect = base + 'index.php/equipe';
            window.location.replace(url_redirect);
            // $("#contenu_dyna3").html(data);
        }
        });
}
</script>