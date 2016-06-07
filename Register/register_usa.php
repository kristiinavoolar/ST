<?php
	
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'studenttour';
		$sql1 = $sql2 = $sql3 = ' ';

		$con = mysqli_connect($host, $user, $pass, $db);

		if (!$con) {
			echo 'connection failed';
		}

		session_start();
		
		if(!isset($_SESSION['login-email'])) {
		header("Location: login.php");}
		
		if(isset($_SESSION['login-email'])) {
			$email = $_SESSION['login-email'];
		echo "<h4>Your session is running " . $email . "</h4>";
		}
		
		$id = "SELECT client_ID FROM users where email='$email'";
				
		$res = mysqli_query($con,$id);
				
		$client_ID= $res->fetch_object()->client_ID;

		echo "<h4>" . $client_ID . "</h4>";
		
		if (isset($_REQUEST['firstname'])) {
		  $firstname = $_REQUEST['firstname'];
		}
		
		if (isset($_REQUEST['lastname'])) {
		  $lastname = $_REQUEST['lastname'];
		}
		
		if (isset($_REQUEST['dob'])) {
		  $dob = $_REQUEST['dob'];
		}
		
		if (isset($_REQUEST['nationality'])) {
		  $nationality = $_REQUEST['nationality'];
		}
		
		if (isset($_REQUEST['pob'])) {
		  $pob = $_REQUEST['pob'];
		}
		
		if (isset($_REQUEST['address'])) {
		  $address = $_REQUEST['address'];
		}
		
		if (isset($_REQUEST['phone'])) {
		  $phone = $_REQUEST['phone'];
		}
		
		if (isset($_REQUEST['email'])) {
		  $email = $_REQUEST['email'];
		}
		
		if (isset($_REQUEST['passport-nr'])) {
		  $passportnr = $_REQUEST['passport-nr'];
		}

		if (isset($_REQUEST['school'])) {
		  $school = $_REQUEST['school'];
		}

		if (isset($_REQUEST['specialty'])) {
		  $specialty = $_REQUEST['specialty'];
		}
		
		if (isset($_REQUEST['destination'])) {
		  $destination = $_REQUEST['destination'];
		}

		if (isset($_REQUEST['visa'])) {
		  $visa = $_REQUEST['visa'];
		}

		if (isset($_REQUEST['participation'])) {
		  $participation = $_REQUEST['participation'];
		}
		
		if (isset($_REQUEST['st-info'])) {
		  $stinfo = $_REQUEST['st-info'];
		}

		if (isset($_REQUEST['extra'])) {
		  $extra = $_REQUEST['extra'];
		}

		if (isset($_POST['send'])) {
		$sql1 = "INSERT INTO usa (client_ID, school, specialty, destination, visa, participation, stinfo, extra) " . "VALUES ('$client_ID', '$school', '$specialty', '$destination', '$visa', '$participation', '$stinfo', '$extra')";
		
		$sql2 = "UPDATE users SET firstname = '$firstname', lastname  = '$lastname', dob = '$dob', nationality = '$nationality', pob = '$pob', address = '$address', phone = '$phone', passportnr = '$passportnr', isusa = '1' WHERE client_ID = '$client_ID'";
		
		$sql3 = "INSERT INTO documents (client_ID, isUSA) VALUES ('$client_ID', '1')";
		
		header("Location:../Main/index.php");
		}
		
		$query=mysqli_query($con, $sql1);
		$query2=mysqli_query($con, $sql2);
		$query3=mysqli_query($con, $sql3);

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

    <body ng-app="">

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
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-text h4">
								Logi välja 
							</span> 
							<span class="li-social">
								<a href="logout.php"><img src="http://daytonsocialportal.com/wp-content/uploads/2014/06/System-Login-icon-white.png" width="30px" height="30px"></a> 
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Registreeri ennast USA programmi</h1>
                            <div class="description">
                            	<p>
	                            	Pane vaim seiklusteks valmis ning jäta igav ja keeruline paberimajandus meie hooleks.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Registreeru</h3>
                            		<p>USA programmis osalemiseks täida järgnev vorm:</p>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="registration-form">
			                    	<div class="form-group">
										<h4>Eesnimi*</h4>
										<label class="sr-only" for="form-firstname">First name</label>
			                        	<input type="text" name="firstname" id="firstname" placeholder="Eesnimi..." class="form-firstname form-control">
			                        </div>
			                        <div class="form-group">
										<h4>Perenimi*</h4>
			                        	<label class="sr-only" for="form-lastname">Last name</label>
			                        	<input type="text" name="lastname" id="lastname" placeholder="Perenimi..." class="form-lastname form-control">
			                        </div>
									<div class="form-group">
										<h4>Sünnikuupäev*</h4>
			                        	<label class="sr-only" for="form-dob">Date of birth</label>
			                        	<input type="date" name="dob" id="dob" placeholder="Sünnikuupäev..." class="form-dob form-control">
			                        </div>
									<div class="form-group">
										<h4>Kodakondsus*</h4>
			                        	<label class="sr-only" for="form-nationality">Nationality</label>
			                        	<input type="text" name="nationality" id="nationality" placeholder="Kodakondsus..." class="form-nationality form-control">
			                        </div>
									<div class="form-group">
										<h4>Sünnikoht*</h4>
			                        	<label class="sr-only" for="form-pob">Place of birth</label>
			                        	<input type="text" name="pob" id="pob" placeholder="Sünnikoht..." class="form-pob form-control">
			                        </div>
									<div class="form-group">
										<h4>Aadress*</h4>
			                        	<label class="sr-only" for="form-address">Address</label>
			                        	<input type="text" name="address" id="address" placeholder="Aadress..." class="form-address form-control">
			                        </div>
									<div class="form-group">
										<h4>Telefon*</h4>
			                        	<label class="sr-only" for="form-phone">Phone</label>
			                        	<input type="text" name="phone" id="phone" placeholder="Telefon..." class="form-phone form-control">
			                        </div>
									<div class="form-group">
										<h4>Passinumber*</h4>
			                        	<label class="sr-only" for="form-passport-nr">Passport number</label>
			                        	<input type="text" name="passport-nr" id="passport-nr" placeholder="Passinumber..." class="form-passport-nr form-control">
			                        </div>
									<div class="form-group">
										<h4>Kõrgkool ja kursus*</h4>
										<label class="sr-only" for="form-school">School</label>
			                        	<input type="text" name="school" id="school" placeholder="Kõrgkool ja kursus..." class="form-school form-control">
									</div>
									<div class="form-group">
										<h4>Õpitav eriala inglise keeles*</h4>
										<label class="sr-only" for="form-specialty">Specialty</label>
			                        	<input type="text" name="specialty" id="specialty" placeholder="Õpitav eriala inglise keeles..." class="form-specialty form-control">
									</div>
									<div class="form-group">
										<h4>Sihtkoht, kus sooviksid töötada*</h4>
										<label class="sr-only" for="form-destination">Destination</label>
			                        	<input type="text" name="destination" id="destination" placeholder="Sihtkoht, kus sooviksid töötada..." class="form-destination form-control">
									</div>
									<div class="form-group">
										<h4>Mis ajast soovid, et Work & Travel tööviisa kehtima hakkaks(kõige varasem kuupäev on 15. mai)*</h4>
										<label class="sr-only" for="form-visa">Visa</label>
			                        	<input type="date" name="visa" id="visa" placeholder="Viisa kehtivuse algusaeg..." class="form-visa form-control">
									</div>
									<div class="form-group">
										<h4>Kas oled Work & Travel USA programmis varem osalenud?*</h4>
										<h4><input type="radio" name="participation" id="participation" value="1"> Jah</br>
										<input type="radio" name="participation" id="participation" value="0"> Ei</h4>
									</div>
									<div class="form-group">
										<h4>Kuidas kuulsid Studenttourist?</h4>
										<label class="sr-only" for="form-st-info">ST-info</label>
			                        	<input type="text" name="st-info" id="st-info" placeholder="Kuidas kuulsid Studenttourist..." class="form-st-info form-control">
									</div>
									<div class="form-group">
										<h4>Kui soovid midagi lisada</h4>
										<label class="sr-only" for="form-extra">Extra</label>
			                        	<input type="text" name="extra" id="extra" placeholder="Kui soovid midagi lisada..." class="form-extra form-control">
									</div>
									<button type="submit" class="btn" name="send" id="send">Registreeru</button>
									<button type="reset" class="btn" name="cacel" id="cancel">Katkesta</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
		
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>