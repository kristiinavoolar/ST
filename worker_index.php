<?php

	$con = mysqli_connect("localhost","root","","studenttour");
	
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Kasutajad - StudentTour</title>
	<link rel="icon" href="http://www.studenttour.eu/template/favicon.ico">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	             <!-- AngularJS -->
    <script src="js/angular.js"></script>
    <script src="js/groupsV.js"></script>

    
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
  <body data-spy="scroll" data-target=".navbar-fixed-top">
   
<!-- Header start -->
	<header id="header" role="banner" >
		<nav class="navbar navbar-default navbar-fixed-top"  id="tf-menu">
			<div class="container">
				<div class="row2">
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
							<li><a class="page-scroll" href="../Register/login.php" >LOG OUT</a></li>
				        </ul>
	      			</div><!--/ Navigation end -->
				</div><!--/ Row end -->
			</div><!--/ Container end -->
		</nav>
	</header><!--/ Header end -->
    <!-- END MAIN NAV -->

   

<body>     

<section id="worker" >
    <div class="bg-overlay pattern"></div>
		<div class="container">
			<div class="col-md-12">
		
				<!-- SIIA TULEB TABEL -->
				 <div class="row2">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Kasutajad  
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body" ng-app="myApp" ng-controller="groupsCtrl">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<div class="col-md-3"><th>Nimi</th></div>
												<div class="col-md-1"><th>Liitumistasu</th></div>
												<div class="col-md-1"><th>Programmitasu</th></div>
												<div class="col-md-1"><th>Viisalõiv</th></div>
												<div class="col-md-1"><th>Inrax PEF</th></div>
												<div class="col-md-1"><th>W&T leping</th></div>
												<div class="col-md-1"><th>USA leping</th></div>
												<div class="col-md-1"><th>Hinneteleht</th></div>
												<div class="col-md-1"><th>Holiday Visa</th></div>
												<div class="col-md-1"><th>Austraalia leping</th></div>
											</tr>
										</thead>
										<tbody >
										
											<tr ng-repeat="x in names">
												<div class="col-md-3"><td>{{x.Nimi}}</td></div>
												<div class="col-md-1"><td>{{x.Liitumistasu}}</td></div>
												<div class="col-md-1"><td>{{x.Programmitasu}}</td></div>
												<div class="col-md-1"><td>{{x.Viisaloiv}}</td></div>
												<div class="col-md-1"><td>{{x.IntraxPEF}}</td></div>
												<div class="col-md-1"><td>{{x.WTleping}}</td></div>
												<div class="col-md-1"><td>{{x.USAleping}}</td></div>
												<div class="col-md-1"><td>{{x.Hinneteleht}}</td></div>
												<div class="col-md-1"><td>{{x.HolidayVisa}}</td></div>
												<div class="col-md-1"><td>{{x.Austraalialeping}}</td></div>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<!-- /SIIT LÕPPEB TABEL -->
			</div>
		</div>
	</div>
</section>

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
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>
	
    <!-- DataTables JavaScript -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>

    <!-- Responsive DataTable -->
    <script src = "js/responsive.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- initialize jQuery Library -->
    <script type="text/javascript" src="js/jquery.js"></script>
    
    
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
	
	<!-- DataTables JavaScript -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>

    <!-- Responsive DataTable -->
    <script src = "js/responsive.js"></script>
	
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