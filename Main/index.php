<?php

	require_once '../Main/PHPMailer/PHPMailerAutoload.php';

	
	$con = mysqli_connect("localhost","root","","studenttour");
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	
	session_start();
	
	if(!isset($_SESSION['login-email'])) {
	header("Location: ../Register/login.php");}
	
		if(isset($_SESSION['login-email'])) {
			$email = $_SESSION['login-email'];
		//echo "<h4>Your session is running " . $email . "</h4>";
		}
		
		$id = "SELECT client_ID FROM users where email='$email'";
				
		$res = mysqli_query($con,$id);
				
		$client_ID= $res->fetch_object()->client_ID;

		//echo "<h4>" . $client_ID . "</h4>";

$target_dir = "documents/";
$target_file = uniqid();

$uploadOk = 1;
$imageFileType = "";
$subject = $message = $headers = $myfile = "";

// Check if image file is a actual image or fake image
if(isset($_POST["add"])) {
	$imageFileType = pathinfo(basename($_FILES['fileToUpload']['name']),PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check != false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	echo "NIMI: ". $target_file;
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 90000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif") {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	$myfile = "$target_dir" . "$target_file" . "." . "$imageFileType";
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $myfile)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}

if (isset($_POST['add'])) {
	//include('auth.php');
	//$auth = 1;
	//$username = $_SESSION['username'];
	
		
		//$value = 'test';
		
		if (isset($_REQUEST['mydropdown'])) {
			$value = $_REQUEST['mydropdown'];
		}
		
		if (isset($_REQUEST['description'])) {
			$description = $_REQUEST['description'];
		}
		
		//$query = "UPDATE documents SET document_ID='$myfile', name='$value', description='$description' WHERE client_ID = '$client_ID'";
		
		$query = "INSERT INTO documents(client_ID, document_ID, name, description) " . "VALUES ('$client_ID', '$myfile', '$value', '$description')";
		$result = mysqli_query($con,$query);
		
		if ($result) {
				echo "<script type='text/javascript'>alert('Dokument edukalt üles laetud!')</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Dokumendi üles laadimine ebaõnnestus!')</script>";
			}
		
		header("Location:index.php");
	
}

	if (isset($_REQUEST['subject'])) {
		$subject = $_REQUEST['subject'];
	}
	
	if (isset($_REQUEST['message'])) {
		$message = $_REQUEST['message'];
	}

	if (isset($_POST['send'])) {

	$m = new PHPMailer;
	
	//properties
	$m->isSMTP(); //we want to use SMTP server to send emails
	$m->SMTPAuth = true;
	//$m->SMTPDebug = 2; //set debugging on 2-just messages 1-errorcodes and messages

	$m->Host = 'smtp.gmail.com';
	$m->Username = 'kristiinavoolar@gmail.com';
	$m->Password = '***';
	$m->SMTP = 'tls';
	$m->Port = 587;
	$m->CharSet = 'UTF-8';
	
	$m->From = 'kristiinavoolar@gmail.com';
	$m->FromName = 'Test';
	$m->addReplyTo('$email', 'Test');
	$m->addAddress('kristiinavoolar@gmail.com', 'Kristiina Voolar');
	//$m->addCC('kristiinavoolar@gmail', 'Kristiina Voolar');
	//$m->addBCC('kristiinavoolar@gmail', 'Kristiina Voolar');
	
	$m->Subject = $subject;
	$m->Body = $message;
	$m->AltBody = $message;
	
	if($m->send()) {
		echo '<script language="javascript">';
		echo 'alert("Sõnum edukalt saadetud!")';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Sõnumi saatmine ebaõnnestus!")';
		echo '</script>';
	}
	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Minu reisid - StudentTour</title>
	<link rel="icon" href="http://www.studenttour.eu/template/favicon.ico">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <!-- CSS
  ================================================== -->
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Elegant icon font -->
     <link rel="stylesheet" href="css/line-icons.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Prettyphoto -->
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <!-- Scrolling nav css -->
    <link rel="stylesheet" href="css/scrolling-nav.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive styles-->
	<link rel="stylesheet" href="css/responsive.css">
	
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body data-spy="scroll" data-target=".navbar-fixed-top" >
    
<!-- Header start -->
	<header id="header" role="banner" >
		<nav class="navbar navbar-default navbar-fixed-top"  id="tf-menu">
			<div class="container">
				<div class="row">
					<!-- Logo start -->
					<div class="navbar-header">
					    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					    </button>
					    <div class="navbar-brand">
						    <a href="#" class="page-scroll">
						    	<img class="img-responsive" src="images/logo1.png" alt="logo">
						    </a> 
					    </div>                   
					</div><!--/ Logo end -->
					<div class="collapse navbar-collapse clearfix navMenu" role="navigation">
						<ul class="nav navbar-nav navbar-right">
				            <li class="active"><a class="page-scroll" href="#" >STUDENTTOUR</a></li>
				            <li><a class="page-scroll" href="#main" >USA</a></li>
				            <li><a class="page-scroll" href="#payment" >MAKSED</a></li>
							<li><a class="page-scroll" href="#calendar" >KALENDER</a></li>
							<li><a class="page-scroll" href="#overview" >DOKUMENDID</a></li>
				            <li><a class="page-scroll" href="#contact" >KONTAKT</a></li>
							<li><a class="page-scroll" href="../Register/logout.php" >LOG OUT</a></li>
				        </ul>
	      			</div><!--/ Navigation end -->
				</div><!--/ Row end -->
			</div><!--/ Container end -->
		</nav>
	</header><!--/ Header end -->
    <!-- END MAIN NAV -->

     <!-- slider section -->
    <section class="slider">
        <div class="slider-wrap">
            <div class="texture-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-1">
                        <div class="slider-content ">
                            <h1>StudentTour</h1>
                            <h2>StudentTour on noorteorganisatsioon, mis vahendab noorte töö- ja reisiprogramme paljudesse erinevatesse riikidesse. Vali endale sobiv programm ja riik, kuhu soovid minna ning veeda unustamatud kuud töötades ja reisides välismaal.</h2>
                            
                        </div>
                    </div>
                </div>
            </div> <!-- row end  -->
        </div> <!-- container end  -->
    </section>
    <!-- slider section end -->


    <!-- Section mains start -->
    <section id="main">
    	<div class="container">
    		<div class="row">
    			<div class="heading-inner text-center">
    				<h2 class="sec-title">tere tulemast <span>usa</span> programmi</h2>
    			</div>
    		</div> <!-- heading row end -->
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="row">
						<div class="col-md-12 wow slideInLeft" data-wow-delay=".3s">
							<div class="payment-inner ">
	                            <div class="payment-content">
	                                <h4> Work & Travel</h4>
	                                <p> Igal aastal lendab Work & Travel programmi raames USA-sse tuhandeid tudengeid.</p>
	                            </div>
	                        </div>
						</div>
						<div class="col-md-12  wow slideInLeft" data-wow-delay=".5s">
							<div class="payment-inner ">
	                            <div class="payment-content">
	                                <h4> Work & Travel</h4>
	                                <p> Igal aastal lendab Work & Travel programmi raames USA-sse tuhandeid tudengeid. </p>
	                            </div>
	                        </div>
						</div>
					</div> <!-- row end -->
                </div>

                <div class="col-md-4 col-sm-4 col-xs-4 visible-md visible-lg wow fadeInDown" data-wow-delay=".3s">
                    <img src="images/usaterv.jpg" alt="" class="img-responsive">
                </div>

                <div class="col-md-4 col-sm-6">
                	<div class="row">
						<div class="col-md-12 wow slideInRight" data-wow-delay=".3s">
							<div class="payment-inner ">
	                            <div class="payment-content">
	                                <h4> Work & Travel</h4>
	                                <p> Igal aastal lendab Work & Travel programmi raames USA-sse tuhandeid tudengeid. </p>
	                            </div>
	                        </div>
						</div>
						<div class="col-md-12 wow slideInRight" data-wow-delay=".5s">
							<div class="payment-inner ">
	                            <div class="payment-content">
	                                <h4> Work & Travel</h4>
	                                <p> Igal aastal lendab Work & Travel programmi raames USA-sse tuhandeid tudengeid. </p>
	                            </div>
	                        </div>
						</div>
					</div> <!-- row end -->
                </div>
			</div><!-- row end -->
    	</div><!-- container end -->
    </section>
    <!-- Section mains end -->

	<!-- section payment start -->
	<section id="payment">
		<div class="container">
			<div class="row">
    			<div class="heading-inner text-center">
    				<h2 class="sec-title">MAKSED</h2>
                     
    				<p>Soorita maksed, et kindlustada endale koht programmis</p>
    			</div>
    		</div> <!-- heading row end -->
			<div class="row">
    			<div class="main-wrapper text-center">
    				<div class="col-md-4 col-sm-12 col-xs-12 main-bg wow fadeInUp" data-wow-delay=".3s">
    					<div class="main-inner text-center">
    						<div class="main-content">
								<img src="images/V.png" alt="" class="img-responsive col-md-6 col-sm-4 col-xs-12">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<h4>Liitumistasu</h4>
									<p>Maksa oma liitumistasu siin.</p>
								</div>
    							<a href="#" class="read-more">Vaata</a>
    						</div>
    					</div>
    				</div> <!-- item1 end -->
    				<div class="col-md-4 col-sm-12 col-xs-12 main-bg white wow fadeInUp" data-wow-delay=".5s">
    					<div class="main-inner text-center">
    						<div class="main-content">
								<img src="images/X.png" alt="" class="img-responsive col-md-6 col-sm-4 col-xs-12">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<h4>Programmitasu</h4>
									<p>Maksa oma programmitasu siin.</p>
								</div>
    							<a href="#" class="read-more">Maksma</a>
    						</div>
    					</div>
    				</div> <!-- item2 end -->
					<div class="col-md-4 col-sm-12 col-xs-12 main-bg wow fadeInUp" data-wow-delay=".3s">
    					<div class="main-inner text-center">
    						<div class="main-content">
								<img src="images/X.png" alt="" class="img-responsive col-md-6 col-sm-4 col-xs-12">
    							<div class="col-md-4 col-sm-4 col-xs-12">
									<h4>Viisalõiv</h4>
									<p>Maksa oma USA viisalõiv siin.</p>
								</div>
    							<a href="#" class="read-more">Maksma</a>
    						</div>
    					</div>
    				</div> <!-- item1 end -->
    				
    			</div><!-- main-wrapper end -->
    		</div><!-- row end -->
		</div>	<!-- container end -->
	</section>
	<!-- section payment end -->
	

    <!-- section counter start -->
  
            <img src="images/rock.jpg" alt="" class="img-responsive counter area">
 
    <!-- section counter end -->

	
	
		
	
	<!-- Section Calendar start -->
	<section id="calendar" class="calendar">
		<div class="bg-overlay pattern"></div>
			<div class="container">
				<div class="col-md-12">
	    			<div class="heading-inner text-center">
	    				<h2 class="sec-title">kalender</h2>
                        <div class="line-btm c-white"></div>
	    				<p>Siin näed kõiki StudentTouri üritusi.</p>
	    			</div>
	    		</div> <!-- heading row end -->
	    		<div class="row">
	    				<div class="col-md-12 text-center">
							<iframe src="https://calendar.google.com/calendar/embed?src=scb5e557h3m478kvp46m9bnvpk%40group.calendar.google.com&ctz=Europe/Tallinn" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
	    				 </div>
	    			
	    		</div><!-- row end -->
			</div> <!-- container end -->
		</div>
	</section>
	<!-- Section Calendar End -->
	
	<!-- scetion screenshot start -->
	<section id="overview">
		<div class="container">
			<div class="row">
    			<div class="heading-inner text-center">
    				<h2 class="sec-title">DOKUMENDID</h2>
    				<p>Minu reisiks vajalikud dokumendid.</p>
    			</div>
    		</div> <!-- heading row end -->
			<div class="col-xs-12">
				<div class="col-md-2">
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-xs-6">
							<h4>Laadi alla</h4>
							<p>Kõik reisiks vajalikud dokumendid saad siit alla laadida.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<a href="documentsD/PEF.pdf" download>
								<button type="button" class="btn btn-info" name="intrax">Intrax PEF</button>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<a href="documentsD/Conditions.pdf" download>
								<button type="button" class="btn btn-info" name="terms">W&T Terms and Conditions</button>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<a href="documentsD/leping.doc" download>
								<button type="button" class="btn btn-info" name="contract">ST leping</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<form action="index.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xs-6">
								<h4>Laadi üles</h4>
								<p>Täida dokument, skaneeri arvutisse ning laadi siia</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label >Dokumendi nimi*</label>
									<select name="mydropdown" class="btn btn-info">
									<option value="Intrax PEF" name = "Intrax PEF">Intrax PEF</option>
									<option value="W&T Terms and Conditions" name = "W&T Terms and Conditions">W&T Terms and Conditions</option>
									<option value="ST leping" name = "ST leping">ST leping</option>
									<option value="Hinneteleht" name ="Hinneteleht">Hinneteleht</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label >Lisainfo</label>
									<input type="text" class="form-control" placeholder="lisainfo" name="description">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label >Vali fail*</label>(.jpg .jpeg .png)
									<input type="file" class="btn btn-info" name="fileToUpload" id="fileToUpload">
								</div>
							</div>
						</div>
						<div class="row">
								<div class="form-group">
									<div class="col-md-3">
										<button type="submit" class="btn btn-info" name="add">Laadi üles</button>
									</div>
									<div class="col-md-3">
										<button type="reset" class="btn btn-info" name="cancel">Katkesta</button>
									</div>
								</div>
						</div>
					</form>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h4>Minu poolt edukalt üles laetud dokumendid</h4>
						<p>
						<?php
							$query = "SELECT * FROM documents WHERE client_ID = '$client_ID'";
							
							$result = mysqli_query($con, $query);

							while ( $db_field = mysqli_fetch_assoc($result) ) {
							$id = $db_field['document_ID'];
							$name = $db_field['name'];
							$description = $db_field['description'];
							?>
							<div class="alert alert-success col-xs-12">	
							<a href="<?php echo $id; ?>">
							<div class="col-xs-5"><strong> <td> <?php echo $id; ?> </td> </strong> </div></a>
							<div class="col-xs-4"><strong><td> <?php echo $name; ?> </td></strong></div>
							<div class="col-xs-3"><td> <?php echo $description; ?> </td> </div>
							
							</div>
							<?php
							}
						?>
						</p>
					</div>
				</div>
			</div>
		</div>  <!-- container end  -->
	</section>
	<!-- scetion screenshot end -->

	

	<!-- section Contact start -->
	<section id="contact" >
    <div class="bg-overlay pattern"></div>
		<div class="container">
			<div class="col-md-12">
    			<div class="heading-inner text-center">
    				<h2 class="sec-title">kontakt</span></h2>
                    <div class="line-btm c-white"></div>
    				<p>Küsimuste korral kirjuta meile.</p>
    			</div>
    		</div> <!-- heading row end -->

			<div class="row">
				<div class="col-md-12">
					<form class="contact-inner" method="post">
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<label > Subject</label>
									<input type="text" class="form-control" placeholder="subject" name="subject" id="subject">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label > mesaage*</label>
									<textarea name="message" id="message" cols="30" rows="8" class="form-control" placeholder="message"></textarea>
								</div>
							</div>
						</div> <!-- row end -->
						<div class="row">
							<div class="col-md-12 text-center">
								<button class="btn btn-default" type="submit" name="send" id="send">Saada sõnum</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- row end -->
		</div><!-- container end -->
	</section>
	<!-- section Contact end -->

	<!-- section Footer start  -->
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-content text-center">
						<a href="#slider-part" class="page-scroll logo-title">
							<img src="images/logo1.png" alt="" class="img-responsive">
						</a>
						<ul class="footer-socail list-inline">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<hr>
					
				</div>
			</div> <!-- row end  -->
		</div> <!-- container end  -->
	</footer>
	<!-- section Footer end  -->

	
	<!-- Back To Top Button -->
    <div id="back-top">
        <a href="#slider-part" class="page-scroll btn btn-primary" ><i class="fa fa-angle-double-up"></i></a>
    </div>
    <!-- End Back To Top Button -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- initialize jQuery Library -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Bootstrap jQuery -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Style Switcher -->
    <script type="text/javascript" src="js/isotope.js"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <!-- PrettyPhoto -->
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <!-- Isotope -->
    <script type="text/javascript" src="js/isotope.js"></script>
    <!-- Wow Animation -->
    <script type="text/javascript" src="js/wow.min.js"></script>
    <!-- SmoothScroll -->
    <script type="text/javascript" src="js/smooth-scroll.js"></script>
    <!-- Eeasing -->
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <!-- Counter -->
    <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
    <!-- Scrolling navigation -->
    <script type="text/javascript" src="js/scrolling-nav.js"></script>
    <!-- Google Map API Key Source -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="js/custom.js"></script>
	<script>
		new WOW().init();
	</script>
    <script>
        
   $('.counter').counterUp({
            delay: 100,
            time: 2000
        });
    </script>
  </body>
</html>