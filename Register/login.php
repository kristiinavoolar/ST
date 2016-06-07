	<?php
	
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'studenttour';
		$sql = ' ';
		$registeremail = "";
		$password1 = "";
		$password2 = "";
		$hash = "";
		$admin_error = "";
		$error_exists = "";
		$error = "";	
		$error_login = "";

		$con = mysqli_connect($host, $user, $pass, $db);
		
		if (!$con) {
			echo 'connection failed';
		}
	
		if (isset($_REQUEST['register-email'])) {
		  $registeremail = $_REQUEST['register-email'];
		}
				
		if (isset($_REQUEST['register-password'])) {
			$password1 = $_REQUEST['register-password'];
			if (isset($_REQUEST['register-password2'])) {
				$password2 = $_REQUEST['register-password2'];				
				if ($password1 == $password2) {
					$hash = password_hash($_REQUEST['register-password'], PASSWORD_BCRYPT);
				} else {
					$error = "Paroolid ei kattu!";
				}	
			}				
		}

		if (isset($_POST['register'])) {
			if ($registeremail == "" || $password1 == "" || $password2 == "" || $error_exists != "" || $error != ""){
				$error .= " Kontrolli välju!";
			} else {
				$sql = "INSERT INTO users (email, password) " . "VALUES ('$registeremail', '$hash')";
			}	

			$query_create=mysqli_query($con, $sql);
		
			if ($query_create) {
				echo "<script type='text/javascript'>alert('Kasutaja loomine õnnestus!')</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Kasutaja loomine ebaõnnestus!')</script>";
			}				
		}
		
		mysqli_close($con);
		?>
		<?php
		
		$con = mysqli_connect($host, $user, $pass, $db);
	
		$loginemail = "";
		$loginpassword = "";
		$auth = 0;

		if (isset($_REQUEST['login-email'])) {
		  $loginemail = $_REQUEST['login-email'];
		}
		
		if (isset($_REQUEST['login-password'])) {
		  $loginpassword = $_REQUEST['login-password'];
		}
		
		
		if (isset($_POST['login'])) {
			
			if ($loginemail=='admin') {
				if ($loginpassword == 'admin') {
					header("Location: ../Main/worker_index.php");
				}
				if ($loginpassword != 'admin') {
					$admin_error = "Vale parool!";
				}
			} else {
								
				$hash = "SELECT password FROM users where email='$loginemail'";
				
				$res = mysqli_query($con,$hash);
				
				$hashedpassword= $res->fetch_object()->password;
				
				//echo "see on hash " .  "$hashedpassword";
				
				if (password_verify($loginpassword, $hashedpassword)){
					session_start();
					$_SESSION['login-email']=$loginemail;
					$_SESSION['login-password']=$loginpassword;
					$auth = 1;
					$usa = "SELECT isusa FROM users where email='$loginemail'";
					$result = mysqli_query($con,$usa);
					$isusa= $result->fetch_object()->isusa;
					//echo $isusa;
				} else {
					$auth=0;
					$error_login = "Vale kasutajanimi või parool";
				}
			}
			
			if ($auth) {
				if ($isusa == 2) {
					echo "<h3> Tere $loginemail! </h3>";
					include ('choose.php');
				} else if ($isusa == 1) {
					echo $isusa;
					header('Location: ../Main/index.php');
				}			
			}
		}
		
		mysqli_close($con);
	?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registreeru</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!-- AngularJS -->
		<script src="assets/js/angular.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">StudentTour</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
		<?php if (!$auth){?>
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-text h4">
								Jälgi meid 
							</span> 
							<span class="li-social">
								<a href="#"><img src="http://ccbc-online.com/images/facebook.gif" width="33px" height="33px"></a>  
								<a href="#"><img src="http://www.bhoboxes.com/wp-content/uploads/2016/03/twitter.00_png_srz.png" width="27px" height="27px"></a>  
								<a href="#"><img src="http://www.einstituto.org/marketing/2014/Usal/vimeo_white.png" width="30px" height="30px"></a> 
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Tere tulemast!</h1>
                            <div class="description">
                            	<p>
	                            	
                            	</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sisene keskkonda</h3>
	                            		<p>Sisesta kasutajanimi ja salasõna:</p>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form name="loginform"  onsubmit="return validateForm()" role="form"  method="post" action="" class="login-form">
				                    	<div class="form-group">
											<h4>Email*</h4>
				                    		<label class="sr-only" for="login-email">Email</label>
				                        	<input type="text" name="login-email" placeholder="Email..." class="login-email form-control" id="login-email" required>
										</div>
				                        <div id="error" class="form-group">
											<h4>Salasõna*</h4>
				                        	<label class="sr-only" for="login-password">Password</label>
				                        	<input type="password" name="login-password" placeholder="Salasõna..." class="login-password form-control" id="login-password" required>
				                        </div>
										<p><h4>
										<?php 
										echo $admin_error; 
										echo $error_login; 
										?>									
										</p></h4>
										<a href=""><p><h5> Unustasid parooli?</h5></p></a>
				                        <button type="submit"  class="btn" name="login" id="login">Sisene!</button>
				                    </form>
			                    </div>
		                    </div>
		                
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Registreeru</h3>
	                            		<p>Täida ankeet ning sisene keskkonda:</p>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" onsubmit="return registerValidation()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="registration-form">
				                    	 <div class="form-group">
											<h4>Email*</h4>
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="register-email" placeholder="Email..." class="form-email form-control" id="register-email" required>
				                        </div>
										<div class="form-group">
											<h4>Salasõna*</h4>
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="register-password" placeholder="Salasõna..." class="form-password form-control" id="register-password" required>
				                        </div>
										<div class="form-group">
											<h4>Sisesta salasõna teist korda*</h4>
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="register-password2" placeholder="Salasõna..." class="form-password form-control" id="register-password2" required>
				                        </div>
										<p><h4>
										<?php 
										echo $error;
										echo $error_exists;
										?>
										</p></h4>
				                        <button type="submit" class="btn" name="register" id="register">Registreeri!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
	<?php } ?>
        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        			</div>
        			
        		</div>
        	</div>
        </footer>
		

	

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>