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
							<span class="li-text">
								Jälgi meid  
							</span> 
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
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
                            <h1>Registreeri ennast kasutajaks</h1>
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
                            		<p>Registreerumiseks täida järgnev vorm:</p>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="registration-form">
			                    	<div class="form-group">
										<h4>Eesnimi</h4>
										<label class="sr-only" for="form-firstname">First name</label>
			                        	<input type="text" name="firstname" id="firstname" placeholder="Eesnimi..." class="form-firstname form-control">
			                        </div>
			                        <div class="form-group">
										<h4>Perenimi</h4>
			                        	<label class="sr-only" for="form-lastname">Last name</label>
			                        	<input type="text" name="lastname" id="lastname" placeholder="Perenimi..." class="form-lastname form-control">
			                        </div>
									<div class="form-group">
										<h4>Sünnikuupäev</h4>
			                        	<label class="sr-only" for="form-dob">Date of birth</label>
			                        	<input type="date" name="dob" id="dob" placeholder="Sünnikuupäev..." class="form-dob form-control">
			                        </div>
									<div class="form-group">
										<h4>Kodakondsus</h4>
			                        	<label class="sr-only" for="form-nationality">Nationality</label>
			                        	<input type="text" name="nationality" id="nationality" placeholder="Kodakondsus..." class="form-nationality form-control">
			                        </div>
									<div class="form-group">
										<h4>Sünnikoht</h4>
			                        	<label class="sr-only" for="form-pob">Place of birth</label>
			                        	<input type="text" name="pob" id="pob" placeholder="Sünnikoht..." class="form-pob form-control">
			                        </div>
									<div class="form-group">
										<h4>Aadress</h4>
			                        	<label class="sr-only" for="form-address">Address</label>
			                        	<input type="text" name="address" id="address" placeholder="Aadress..." class="form-address form-control">
			                        </div>
									<div class="form-group">
										<h4>Telefon</h4>
			                        	<label class="sr-only" for="form-phone">Phone</label>
			                        	<input type="text" name="phone" id="phone" placeholder="Telefon..." class="form-phone form-control">
			                        </div>
									<div class="form-group">
										<h4>Email</h4>
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="email" name="email" id="email" placeholder="Email..." class="form-email form-control">
			                        </div>
									<div class="form-group">
										<h4>Passinumber</h4>
			                        	<label class="sr-only" for="form-passport-nr">Passport number</label>
			                        	<input type="text" name="passport-nr" id="passport-nr" placeholder="Passinumber..." class="form-passport-nr form-control">
			                        </div>
									<div class="form-group">
										<h4>Passi väljaandmise kuupäev</h4>
			                        	<label class="sr-only" for="form-doi">Date of issuance</label>
			                        	<input type="date" name="doi" id="doi" placeholder="Passi väljaandmise kuupäev..." class="form-doi form-control">
			                        </div>
									<div class="form-group">
										<h4>Passi kehtivuse lõppemise kuupäev</h4>
			                        	<label class="sr-only" for="form-doe">Date of expiration</label>
			                        	<input type="date" name="doe" id="doe" placeholder="Passi kehtivuse lõppemise kuupäev..." class="form-doe form-control">
			                        </div>
									<div class="form-group">
										<h4>Riik, kus pass on välja antud</h4>
			                        	<label class="sr-only" for="form-passport-country">Country of issuance</label>
			                        	<input type="text" name="passport-country" id="passport-country" placeholder="Riik, kus pass on välja antud..." class="form-passport-country form-control">
			                        </div>
									<div class="form-group">
										<h4>Sugu: </h4>
										<h4><input type="radio" name="gender" id="gender" value="1"> Mees</br>
										<input type="radio" name="gender" id="gender" value="0"> Naine</h4>
										<h4>Kas Sulle on kunagi mõistetud kriminaalkaristus: </h4>
										<h4><input type="radio" name="sanction" id="sanction" value="1"> Jah</br>
										<input type="radio" name="sanction" id="sanction" value="0"> Ei</h4>
										<h4>Kas oled varem Working Holiday viisaga Austraalias käinud: </h4>
										<h4><input type="radio" name="holiday-visa" id="holiday-visa" value="1"> Jah</br>
										<input type="radio" name="holiday-visa" id="holiday-visa" value="0"> Ei</h4>
									</div>
									<div class="form-group">
										<h4>Plaanitava reisi umbakudne alguskuupäev</h4>
			                        	<label class="sr-only" for="form-start-date">Start date</label>
			                        	<input type="date" name="start-date"  id="start-date" placeholder="Plaanitava reisi umbakudne alguskuupäev..." class="form-start-date form-control">
			                        </div>
									<div class="form-group">
										<h4>Kellena plaanid Austraalias tööd leida?</h4>
			                        	<label class="sr-only" for="form-work">Work</label>
			                        	<input type="text" name="work" id="work" placeholder="Kellena plaanid Austraalias tööd leida..." class="form-work form-control">
			                        </div>
									<div class="form-group">
										<h4>Milline töökogemus/haridus Sul Eestis on?</h4>
			                        	<label class="sr-only" for="form-experience">Experience</label>
			                        	<input type="text" name="experience" id="experience" placeholder="Milline töökogemus/haridus Sul Eestis on..." class="form-experience form-control">
			                        </div>
									<div class="form-group">
										<h4>Kui oled eelneva 5 aasta jooksul Eestist väljaspool viibinud kauem kui 3 kuud, siis kirjuta riik ja ajavahemik, mil ära olid</h4>
			                        	<label class="sr-only" for="form-other-countries">Other countries</label>
			                        	<input type="text" name="other-countries" id="other-countries" placeholder="Riik ja ajavahemik..." class="form-other-countries form-control">
			                        </div>
									<div class="form-group">
										<h4>Kuidas Studenttourist kuulsid?</h4>
										<label class="sr-only" for="form-st-info">ST-info</label>
			                        	<input type="text" name="st-info" id="st-info" placeholder="Kuidas Studenttourist kuulsid..." class="form-st-info form-control">
									</div>
									<div class="form-group">
										<h4>Kui soovid midagi lisada</h4>
										<label class="sr-only" for="form-extra">Extra</label>
			                        	<input type="text" name="extra" id="extra" placeholder="Kui soovid midagi lisada..." class="form-extra form-control">
									</div>
			                        <button type="submit" class="btn" name="send" id="send">Registreeru</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
		
	<?php

		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'studenttour';
		$sql = ' ';

		$con = mysqli_connect($host, $user, $pass, $db);

		if (!$con) {
			echo 'connection failed';
		}

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

		if (isset($_REQUEST['doi'])) {
		  $doi = $_REQUEST['doi'];
		}

		if (isset($_REQUEST['doe'])) {
		  $doe = $_REQUEST['doe'];
		}
		
		if (isset($_REQUEST['passport-country'])) {
		  $passportcountry = $_REQUEST['passport-country'];
		}

		if (isset($_REQUEST['gender'])) {
		  $gender = $_REQUEST['gender'];
		}

		if (isset($_REQUEST['sanction'])) {
		  $sanction = $_REQUEST['sanction'];
		}
		
		if (isset($_REQUEST['holiday-visa'])) {
		  $holidayvisa = $_REQUEST['holiday-visa'];
		}

		if (isset($_REQUEST['start-date'])) {
		  $startdate = $_REQUEST['start-date'];
		}

		if (isset($_REQUEST['work'])) {
		  $work = $_REQUEST['work'];
		}

		if (isset($_REQUEST['experience'])) {
		  $experience = $_REQUEST['experience'];
		}
		
		if (isset($_REQUEST['other-countries'])) {
		  $othercountries = $_REQUEST['other-countries'];
		}

		if (isset($_REQUEST['st-info'])) {
		  $stinfo = $_REQUEST['st-info'];
		}
		
		if (isset($_REQUEST['extra'])) {
		  $extra = $_REQUEST['extra'];
		}

		if (isset($_POST['send'])) {
		$sql = "INSERT INTO austraalia (firstname, lastname, dob, nationality, pob, address, phone, email, passportnr, doi, doe, passportcountry, ismale, sanction, holidayvisa, startdate, work, experience, othercountries, stinfo, extra) " . "VALUES ('$firstname', '$lastname', '$dob', '$nationality', '$pob', '$address', '$phone', '$email', '$passportnr', '$doi', '$doe', '$passportcountry', '$gender', '$sanction', '$holidayvisa', '$startdate', '$work', '$experience', '$othercountries', '$stinfo', '$extra')";
		}

		$query=mysqli_query($con, $sql);

		mysqli_close($con);

	?>

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