  


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
										//	 pasahitz=onartu('pasahitz');
											 pasahitz = true;
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
                        <input id="passwd" name="passwd" type="password" class="form-control" placeholder="Sartu pasahitza" onchange="botoia();">
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