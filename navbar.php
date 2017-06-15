                        <?php
						
                           	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
                            	{
									echo '<li class="dropdown">';
                                    echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">', $_SESSION['username'], '<span class="caret"></span></a>';
                                    echo '<ul class="dropdown-menu">';
									if($_SESSION['ErabiltzaileMota']=='IRAKASLEA'){
										echo   '<li><a href=reviewingQuizes.php>Review Quizzes</a></li>';
									}else{										
									   
                                       echo   '<li><a href=zhandlingQuizes.php>My Quizzes</a></li>';
                                       echo   '<li><a href=zInsertQuestion.php>New Quizz</a></li>';
                                       echo   '<li role="separator" class="divider"></li>';
									}
                            	

									   
									   
									   
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