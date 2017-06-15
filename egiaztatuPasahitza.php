<?php 
	require_once('nusoap.php');
	require_once('class.wsdlcache.php');
	
	$server = new soap_server;
	
	$server->register('egiaztatu');

	
	function egiaztatu($pass){
		$fitx = fopen("toppasswords.txt", "r");
		$aurkitua = false;
		
		if($pass=''){
			$aurkitua = true;
		}
		
		//if ($fitx){
			while (($hitza = fgets($fitx)) !== false && $aurkitua == false){
				$hitza = rtrim($hitza, "\r\n");
				if(strcmp($hitza,$pass)==0){
					$aurkitua = true;
				}
			}
		//}
		fclose($fitx);
		if (aurkitua==true){			
			return "BALIOGABEA";
		}
		else{
			return "BALIOZKOA";
		}
	
	}

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>