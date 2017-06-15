<?php
	$esteka = mysqli_connect("localhost", "root",  "", "quiz");

	
	$zenbakia=$_GET['zenbakia'];
	$gaia=$_POST['gaia'];
	$galderaTestua=$_POST['galderaText'];
	$erantzunTestua=$_POST['erantzunText'];
	$zailtasuna=$_POST['zailtasuna'];


	
	$doc=new SimpleXMLElement("galderak.xml",null,true);
	$assessmentItems=$doc->xpath('//assessmentItem[@questionId='.$zenbakia.']');
	if (count($assessmentItems)>=1) {
    	$assessmentItemZ=$assessmentItems[0];
    	$dom=dom_import_simplexml($assessmentItemZ);
    	$dom->parentNode->removeChild($dom);
	}
	$doc->asXml("galderak.xml");
	
	$xml = new DOMDocument('1.0',"UTF-8");
	$xml->load('galderak.xml');
	$root = $xml->documentElement;
	$assessmentItem = $xml->createElement('assessmentItem');

	$atrgalderaId = $xml->createAttribute("questionId");
	$atrgalderaId->value=$zenbakia;
	$assessmentItem->appendChild($atrgalderaId);

	$atrZailtasuna = $xml->createAttribute("complexity");
	$atrZailtasuna->value=$zailtasuna;
	$assessmentItem->appendChild($atrZailtasuna);

	$atrArloa = $xml->createAttribute("subject");
	$atrArloa->value=$gaia;
	$assessmentItem->appendChild($atrArloa);
	
	$itemBody=$xml->createElement('itemBody');
	$p=$xml->createElement('p',$galderaTestua);
	$itemBody->appendChild($p);
	
	$correctResponse=$xml->createElement('correctResponse');
	$value=$xml->createElement('value',$erantzunTestua);
	$correctResponse->appendChild($value);
	
		
	$assessmentItem->appendChild($itemBody);
	$assessmentItem->appendChild($correctResponse);

	$root->appendChild($assessmentItem);
	$xml->appendChild($root);
	$xml->save("galderak.xml");


	$sqlekintza="UPDATE galderak SET Gaia='$gaia', GalderarenTestua='$galderaTestua', ErantzunTestua='$erantzunTestua', Zailtasuna='$zailtasuna' WHERE GalderaZenbakia='$zenbakia'";
	$emaitza=$esteka->query($sqlekintza);
	if(!$emaitza) {
		echo("Ezin izan da galdera eguneratu: ".$esteka->error);
	} else {
		header("Location:zhandlingQuizes.php");
	}

	mysqli_close($esteka);
?>