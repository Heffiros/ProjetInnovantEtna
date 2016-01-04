<?php
return array(
	'' => 'Misc#home',
	'backoffice' => 'Acceuil#home',
	'api/connect' => 'Api#connectApi',
	'api/inscription' => 'Api#createAccountApi',
	'api/check' => 'Api#checkEstiTypeApi',
	'api/aff' => 'Api#affWebViewApi',
	'api/addtime' => 'Api#addTimeConnexionApi',
	'api/list' => 'Api#getInfoApi',
	'stat/select' => 'Stat#home',
	'stat/delete_stat' => 'Stat#deleteBeacon',
	'stat/stat_chart_1/:id' => 'Stat#allBystanders',
	'email' => 'Email#home',
	'email/send' => 'Email#send',
	'fidelite' => 'Fidelite#home',
	'fidele/historique' => 'Fidelite#historiqueAchat',
	'modif/:id' => 'Acceuil#modif'
);