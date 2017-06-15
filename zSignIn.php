
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
                        <li class="active"><a href="zIndex.php">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="zseeXMLQuenstions.php">Quizzes</a></li>
                        <li><a href="zCredits.php">Credits</a></li>
                    </ul>
                     <ul class="nav navbar-nav navbar-right">
                        <?php
                            //session_start();

                            session_start();
                            include 'navbar.php';
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

		<?php 
			include 'signUp.php';
		?>
        

    </body>
</html>
