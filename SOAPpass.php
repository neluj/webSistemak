<?php
	if (isset($_GET['pass'])){


		require_once('nusoap.php');
	    require_once('class.wsdlcache.php');



		$soapclient = new nusoap_client('file://localhost/quizz/egiaztatuPasahitza.php?wsdl', false);
				
		$emaitza = $soapclient->call('egiaztatu',array($_GET['pass']));



			if($emaitza=="BALIOZKOA"){
				echo "Pasahitz egokia";
			}
			if($emaitza=="BALIOGABEA"){
				echo "Aukeratu beste pasahitz bat";
			}
			else{
				echo "emaitza";
			}
		

	}
	
?>