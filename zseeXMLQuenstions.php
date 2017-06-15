<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="zIndex.php">Home</a></li>
                        <li class="active"><a href="zseeXMLQuenstions.php">Quizzes <span class="sr-only">(current)</span></a></li>   
                        <li><a href="zCredits.php">Credits</a></li>  
                    </ul>                   
                     <ul class="nav navbar-nav navbar-right">
                        <?php
                            session_start();
                            	 
                            	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
                            	{
                            	
                                       echo '<li class="dropdown">';
                                       echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">', $_SESSION['username'], '<span class="caret"></span></a>';
                                       echo '<ul class="dropdown-menu">';
                                       echo   '<li><a href=zhandlingQuizes.php>My Quizzes</a></li>';
                                       echo   '<li><a href=zInsertQuestion.php>New Quizz</a></li>';
                                       echo   '<li role="separator" class="divider"></li>';
                                       echo   '<li><a href=zLogout.php>LogOut</a></li>';
                                       echo  '</ul>';
                                       echo    '</li>';
                                
                            	} else {
                                       echo '<li class="dropdown">';
                                       echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Panel <span class="caret"></span></a>';
                                       echo '<ul class="dropdown-menu">';
                                       echo   '<li><a href="zSignIn.php">LogIn</a></li>';
                                       echo   '<li><a href="javascript:void(0)" data-toggle="modal" data-target="#responsive">Sign Up</a></li>';
                                       echo  '</ul>';
                                       echo    '</li>'; 
                            	}
                         ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </head>
    
    <body>
         <body>

        <div class="container-fluid">
            <?php	
            		$xslDoc = new DOMDocument();
            	$xslDoc->load('galderakErakutsi.xsl');
            	$xmlDoc = new DOMDocument();
            	$xmlDoc->load('galderak.xml');
            	$proc = new XSLTProcessor();
            	$proc->importStylesheet($xslDoc);
            	echo $proc->transformToXML($xmlDoc);
            ?>
          </div>
          
          
          
                  <div class="container">
        
        <!--class="modal fade"=> lehioa eskutatuta egotea egiten du -->
        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <!--class="modal-dialog" => lehioaren "forma"-->
            <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Erabiltzailearen datuak</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span a href='IkusiErabiltzaileak.php'> erregistro berri bat gauzatu da</span>
                </div>
                <!--<form action="Enroll.php" enctype="multipart/form-data" method="post" id = "erregistro" name = "erregistro" onSubmit = "return egiaztatu()">-->
                <form action="Enroll.php" enctype="multipart/form-data" class="form-horizontal"  method="post" id = "erregistro" name = "erregistro" onSubmit = "return egiaztatu()">
                  <div class="form-group">
                    <label for="name" class="control-label col-xs-5">Izena :</label>
                    <div class="col-xs-5">
                      <input id="name" name="name" type="text" class="form-control" placeholder="Sartu zure izena">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lastname1" class="control-label col-xs-5">Lehenengo abizena :</label>
                    <div class="col-xs-5">
                      <input id="lastname1" name="lastname1"  type="text" class="form-control" placeholder="Sartu zure lehenengo abizena">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lastname2" class="control-label col-xs-5">Bigarren abizena :</label>
                    <div class="col-xs-5">
                      <input id="lastname2" name="lastname2"  type="text" class="form-control" placeholder="Sartu zure bigarren abizena">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="control-label col-xs-5">Posta elektonikoa :</label>
                    <div class="col-xs-5">
                        <input id="email" name="email" type="text" class="form-control" placeholder="Sartu posta elektronikoa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="passwd" class="control-label col-xs-5">Pasahitza :</label>
                    <div class="col-xs-5">
                        <input id="passwd" name="passwd" type="password" class="form-control" placeholder="Sartu pasahitza">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="passwdR" class="control-label col-xs-5">Errepikatu pasahitza :</label>
                    <div class="col-xs-5">
                        <input id="passwdR" name="passwdR" type="password" class="form-control" placeholder="Errepikatu pasahitza">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telnum" class="control-label col-xs-5">Telefono zenbakia :</label>
                    <div class="col-xs-5">
                        <input id="telnum" name="telnum" type="text" class="form-control" placeholder="Sartu zure telefono zenbakia">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="espe" class="control-label col-xs-5">Espezialitatea :</label>
                    <div class="col-xs-5">
                        <select class="form-control" name="espe" id="espe">
                        <option value="Software Ingenieritza">Software Ingenieritza</option>
                            <option value="Konputagailuen Ingenieritza">Konputagailuen Ingenieritza</option>
                            <option value="Konputazioa">Konputazioa</option>
                            <option value="best">Besterik</option>  
                        </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="besterik" class="control-label col-xs-5">Besterik bada :</label>
                    <div class="col-xs-5">
                      <input id="besterik" name="besterik"  type="text" class="form-control" placeholder="Adierazi hemen besterik bada...">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="interesak" class="control-label col-xs-5">Interesa duzun teknologiak eta erremintak :</label>
                    <div class="col-xs-5">
                      <textarea id="interesak" name="interesak"  type="text" class="form-control" placeholder="Adierazi hemen interesa dituzun teknologiak eta erremintak..." rows="4" ></textarea>
                    </div>
                  </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Itxi</button>
                <button type="submit" class="btn btn-success">Erregistratu</button>     
                </form>
              </div>
              <div class="modal-footer">  
   
                      
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    <script>   
         function egiaztatu(){
	 	var nam = document.getElementById("name").value;
	 	if (nam == null|| nam == "") {
	 		alert("Izenaren atala hau ezin da hutsik egon");
	 		return false;
	 	}
	 	var abi1 = document.getElementById("lastname1").value;
	 	if (abi1 == null|| abi1 == "") {
	 		alert("Lehenengo abizenaren atala hau ezin da hutsik egon");
	 		return false;
	 	}
	 	var abi2 = document.getElementById("lastname2").value;
	 	if (abi2 == null|| abi2 == "") {
	 		alert("Bigarren abizenaren atala hau ezin da hutsik egon");
	 		return false;
	 	}
	 	var ema = document.getElementById("email").value;
	 	if (ema == null|| ema == "") {
	 		alert("Posta elektronikoaren atala hau ezin da hutsik egon");
	 		return false;
	 	}
	 	var pass = document.getElementById("passwd").value;
	 	if(pass.length < 6){
	 		alert("Pasahitza laburregia da. Gutxienez 6 karaktere izan behar ditu");
	 		return false;
	 	}
	 	var passR = document.getElementById("passwdR").value;
	 	if(pass != passR){
	 	     alert("Sartutako bi pasahitzak ez datoz bat");
	 		 return false;
	 	}
	 	
	 	var ok = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))[0-9]{3}@ikasle.ehu.[eus|es]/;
	 	var kor = document.getElementById("email").value;
	 	if (!ok.test(kor)) {
	 		alert("Sartu duzun korreoa ez da egokia. Mesedez saiatu berriro");
	 		return false;
	 	}
	 	var tel = document.getElementById("telnum").value;
	 	var ok2 = /^\d{9}$/
	 	if (!ok2.test(tel)) {
	 		alert("Sartu duzun telefono zenbakia ez da egokia. Mesedez sartu berriro.");
	 		return false;
	 	}
	 	var sAux="";
	 	var frm=document.getElementById("erregistro");
	 	for(i=0;i<frm.elements.length-1;i++){
	 		sAux +="IZENA: " + frm.elements[i].id+" ";
	 		sAux +="BALIOA: " + frm.elements[i].value+"\n";
	 	}
	 	alert(sAux);
     
        }

        
    </script>
    </body>
</html>