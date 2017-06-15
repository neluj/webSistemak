
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta charset="utf-8">


            <meta name="viewport" content="width=device-width, initial-scale=1">

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


                        	<script type="text/javascript">
                               	xhttp = new XMLHttpRequest();
                               	function emailaKonprobatu(email){
                               		xhttp.onreadystatechange = function(){
                               			if((xhttp.readyState==4) && (xhttp.status==200)){
                               				document.getElementById("onartuaMezua").innerHTML=xhttp.responseText;
											botoia();
											
                               			}
                               		}
                               		xhttp.open("GET","SOAPemail.php?email="+email, true);
                               		xhttp.send();
																	
                               	}
								
								xhttp = new XMLHttpRequest();
                               	function pasahitzaKonprobatu(passwd){
                               		xhttp.onreadystatechange = function(){
                               			if((xhttp.readyState==4) && (xhttp.status==200)){
                               				document.getElementById("onartuaPass").innerHTML=xhttp.responseText;
											botoia();
											
                               			}
                               		}
                               		xhttp.open("GET","SOAPpass.php?pass="+passwd, true);
                               		xhttp.send();
																	
                               	}



                        	</script>

                     <script>
					        function botoia(){
									var izena,abiz1,abiz2,post,pasahitz,tel = false;
									var nam = document.getElementById("name").value;
                             	 	if (!(nam == null|| nam == "")) {
                             	 		izena=true;
                             	 	}								
									
									
									var abi1 = document.getElementById("lastname1").value;
                             	 	if (!(abi1 == null|| abi1 == "")) {
                             	 		abiz1=true;
                             	 	}
									
                             	 	var abi2 = document.getElementById("lastname2").value;
                             	 	if (!(abi2 == null|| abi2 == "")) {
                             	 		abiz2=true;
                             	 	}
									
									var ema = document.getElementById("email").value;
                             	 	if (!(ema == null || ema == "")) {
                             	 		var ok = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))[0-9]{3}@ikasle.ehu.[eus|es]/;
										if (ok.test(ema)) {
											post=onartu('email');
										}
                             	 	}
									
									var pass = document.getElementById("passwd").value;
                             	 	if(pass.length >= 6){
										var passR = document.getElementById("passwdR").value;
                             	 		if(pass == passR){
											 pasahitz=onartu('pasahitz');
										}
                             	 	}
									
								    var tel = document.getElementById("telnum").value;
									var ok2 = /^\d{9}$/
									if (ok2.test(tel)) {
										tel=true;
									}
									
									
										
									if((izena && abiz1 && abiz2 && post && pasahitz && tel)==true){
										document.getElementById("erregBotoia").disabled=false;

									}
									else{
										 document.getElementById("erregBotoia").disabled=true;
 
									}
									
							}
					 
					    function onartu(sarrera){
									
									if(sarrera=="email"){
										var onartua = document.getElementById("onartuaMezua");
										if(onartua.textContent==="Posta zuzena"){											
											return true;										
										}										
									}
									if(sarrera=="pasahitz"){
										var onartua = document.getElementById("onartuaPass");
										if(onartua.textContent==="Pasahitz egokia"){											
											return true;										
										}										
									}
					    
						}
						function erabiltzaileaMezua(){
									var sAux="";
                             	 	var frm=document.getElementById("erregistro");
                             	 	for(i=0;i<frm.elements.length-1;i++){
                             	 		sAux +="IZENA: " + frm.elements[i].id+" ";
                             	 		sAux +="BALIOA: " + frm.elements[i].value+"\n";
                             	 	} 
									if((izena || abiz1 || abiz2 || pst || pasahitz) == false){
										document.getElementById("erregBotoia").disabled=true;
									}
										
                             	 	alert(sAux);
						}

                     </script>
					 


        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="zIndex.php">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="zseeXMLQuenstions.php">Quizzes</a></li>
                        <li><a href="zCredits.php">Credits</a></li>
                    </ul>
                     <ul class="nav navbar-nav navbar-right">
                        <?php
                            //session_start();

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


        <div align = CENTER>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Sign In</div>
                    <div class="panel-body">
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                            <p>Usuario o Password no identificados</p>
                        </div>
                        <form action="SignIn.php" enctype="multipart/form-data" method="post" id = "erregistro" name = "SignIn" onSubmit = "return egiaztatuSartu()">
                            <div class="form-group">
                                <label for="text">Posta :</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="email" class="form-control" id="email" placeholder="adibidea001@ikasle.ehu.es" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passwdLog">Pasahitza</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="passwdLog" placeholder="Pasahitza" name="passwdLog">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-lock"></span> Sartu</button>
                            <button href="javascript:void(0)" data-toggle="modal" data-target="#responsive" type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-lock"></span> Erregistratu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                <form action="Enroll.php" enctype="multipart/form-data" class="form-horizontal"  method="post" id = "erregistro" name = "erregistro" onSubmit = "return erabiltzaileaMezua() ">
                  <div class="form-group">
                    <label for="name" class="control-label col-xs-5">Izena :</label>
                    <div class="col-xs-5">
                      <input id="name" name="name" type="text" class="form-control" placeholder="Sartu zure izena" onchange="botoia();">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lastname1" class="control-label col-xs-5">Lehenengo abizena :</label>
                    <div class="col-xs-5">
                      <input id="lastname1" name="lastname1"  type="text" class="form-control" placeholder="Sartu zure lehenengo abizena" onchange="botoia();">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lastname2" class="control-label col-xs-5">Bigarren abizena :</label>
                    <div class="col-xs-5">
                      <input id="lastname2" name="lastname2"  type="text" class="form-control" placeholder="Sartu zure bigarren abizena" onchange="botoia();">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="control-label col-xs-5">Posta elektonikoa :</label>
                    <div class="col-xs-5">
                        <input id="email" name="email" type="text" class="form-control" placeholder="Sartu posta elektronikoa" onchange="emailaKonprobatu(this.value);">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="passwd" class="control-label col-xs-5">Pasahitza :</label>
                    <div class="col-xs-5">
                        <input id="passwd" name="passwd" type="password" class="form-control" placeholder="Sartu pasahitza" onchange="pasahitzaKonprobatu(this.value);">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="passwdR" class="control-label col-xs-5">Errepikatu pasahitza :</label>
                    <div class="col-xs-5">
                        <input id="passwdR" name="passwdR" type="password" class="form-control" placeholder="Errepikatu pasahitza" onchange="botoia();">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telnum" class="control-label col-xs-5">Telefono zenbakia :</label>
                    <div class="col-xs-5">
                        <input id="telnum" name="telnum" type="text" class="form-control" placeholder="Sartu zure telefono zenbakia" onchange="botoia();">
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
                <button type="submit" id="erregBotoia" class="btn btn-success" disabled>Erregistrau</button>
                <div id="onartuaMezua"></div>
				<div id="onartuaPass"></div>
                </form>
              </div>
              <div class="modal-footer">


              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    </body>
</html>
