<?php
	if (isset($_GET['email'])){
	require_once('nusoap.php');

	$soapclient = new nusoap_client("http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl",false);

	$emaitza= $soapclient->call('egiaztatuE',array( 'x'=>$_GET['email']));	
		if($emaitza == 'BAI'){
			echo "Posta zuzena";
		}else{
			echo "Posta hori ez dago ikasgaian";
		}
	}
?>