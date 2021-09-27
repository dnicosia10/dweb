<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMD-ESO</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/main.css">
    <link href="css/custom.css" rel="stylesheet">
	
	<script src="//use.edgefonts.net/bebas-neue.js"></script>

    <!-- Custom Fonts & Icons -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/icomoon-social.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	

</head>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

  <header class="navbar navbar-inverse navbar-fixed-top" role="banner" style="background-color:#630b0bde; ">
        <div class="container" style="width: 100%;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="Basica"></a>
            </div>
            <div class="collapse navbar-collapse" >
                <ul class="nav navbar-nav navbar-right" >
                    <li class=""><a href="index.php">Home</a></li>
                    <li><a href="blog-post.php">Jobs</a></li>  
                    <li><a href="portfolio.php">Employer</a></li>
                    
                   
                    <li><a href="contact-us.php">Contact</a></li>
                    <li class="active"><a href="about-us.php">About Us</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                           
                            <li><a href="signup/index.php">Signup</a></li>
                            <li><a href="signup/login.php"><i class="fa fa-user fa-fw"></i>Login</a></li>
                            <li class="divider"></li>
                            
                            <li><a href="terms.php">Terms of Use</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Job List</h1>
					</div>
				</div>
			</div>
		</div>
       

        <div class="section">
        
	    	<div class="container" style="width: 100%;">
				<div class="row">
					<div class="col-md-3">
					<!-- Sidebar -->
					<div class="col-sm-12 blog-sidebar" style="">
						<h4>Search Job here</h4>
						<form method="POST">
							<div class="input-group">
								<input class="form-control input-md" name="eventc"  type="search">
								<span class="input-group-btn">
									<button class="btn btn-md" name="okay" type="submit">Search</button>
								</span>
							</div>
							<!-- <div class="col-sm-12" style="padding-top: 50px;padding-left: 0px;">
							<div class="input-group">
								<select style="width: 255px;padding-left: 0px;" class="form-control input-lg" name="job-type">
												<option>All</option>
												<option>Full Time</option>
												<option>Part Time</option>
												<option>Freelancer</option>
												<option>Internship</option>
												
											</select>
							</div>
						</div> -->
						</form>
						<h4>Recent Jobs</h4>
						<ul class="recent-posts">
							 <?php
	                		$conn = mysql_connect("localhost","root")or die(mysql_error());
					$db = mysql_select_db("cmdeso_db")or die(mysql_error()); 
	                		$sql1 = mysql_query("SELECT * FROM job_onjob_info WHERE onjob_archive = 'OFF' ORDER BY 'onjob_id' DESC LIMIT 6 ");
	                		
	                		$num ="";
											while ($rows = mysql_fetch_array($sql1))
											{//## echo fetched data to display
											$num += 1;
	                	?> 
							<li><a href="job-info.php?jobid=<?php echo $rows['onjob_id']; ?>&empl=<?php echo $rows['job_id']; ?>"><?php echo $rows['onjob_position']; ?></a></li>
							
						<?php }?>
						</ul>
						<h4>Company</h4>
						<ul class="blog-categories">
							 <?php
	                		$conn = mysql_connect("localhost","root")or die(mysql_error());
					$db = mysql_select_db("cmdeso_db")or die(mysql_error()); 
	                		$sql1 = mysql_query("SELECT * FROM admin_job_fair_info WHERE job_archive = 'OFF' ORDER BY 'job_id' DESC LIMIT 6 ");
	                		
	                		$num ="";
											while ($rows = mysql_fetch_array($sql1))
											{//## echo fetched data to display
											$num += 1;
	                	?> 
							<li><a href="job-info.php?jobid=<?php echo $rows['onjob_id']; ?>&empl=<?php echo $rows['job_id']; ?>"><?php echo $rows['job_company_name']; ?></a></li>
							
						<?php }?>
						</ul>
						
					</div>
				</div>
				<div class="col-sm-9">
	    		
					<div class="col-sm-12 blog-post" >

			<form method="POST">
				<div class="input-group" style="background-color: ;">
											<div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
											
											<select name="datatable_length" class="form-control input-md">
											<option value="10">10</option>
											<option value="25">25</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<?php
													$sql2 = mysql_query("SELECT * FROM job_onjob_info ");
									
												//### fetch data as array
												while ($row = mysql_fetch_array($sql2))
												{//## echo fetched data to display
													$num1 += 1;
												 } 
											?>
											<option value="<?php echo $num1; ?>" >All</option>
											</select>
										</div>
										<div class="col-sm-3" style="padding-left:  0px;padding-right: 0px;">
											<span class="input-group-btn" style="width: 50px;"><button  type="submit" name="entries" class="btn btn-md">Show entries</button></span></
										</form>
									</div>
									</div>
					<!-- End Sidebar -->


<?php

									

if( (!isset($_POST['okay']))&&(!isset($_POST['entries'])) ){

	$conn = mysql_connect("localhost","root")or die(mysql_error());
	$db = mysql_select_db("cmdeso_db")or die(mysql_error()); 
	$sql = mysql_query("SELECT 
										*
										 FROM job_onjob_info JOIN admin_job_fair_info WHERE onjob_archive='OFF'  AND job_onjob_info.job_id = admin_job_fair_info.job_id ORDER BY 'onjob_datetime' ASC LIMIT 5  ");
									//$sql = mysql_query("SELECT * FROM admin_job_fair_info WHERE job_archive = 'ON' LIMIT 10  ");
									while ($row = mysql_fetch_array($sql))
									{//## echo fetched data to display
									//$num += 1;
									//$datatable_length = 10;
									//$format = date_format(date_create($row['jobfair_date'])," F  d,  Y ");
										$date = date_create($row['onjob_datetime']);
											$format = date_format($date, 'g:ia \o\n l jS F Y');
?> 	


					<!-- Blog Post -->
					
						<div class="blog-post" style="border:1px; ">
							

							<div class="col-sm-12" style="border: 1px solid #676666;margin-bottom: 15px;">

								<div class="col-sm-8" style="float: right;">
								<div class="single-post-title" >
								<h2 style="font-size: 20px;"><?php echo $row['onjob_title']; ?> - <?php echo $row['onjob_position']; ?> </h2>
							</div>
							<div class="single-post-info">
								<h4 style="padding-left: 30px;"><i class="glyphicon glyphicon-info-sign "></i><span>
									<?php echo $row['onjob_type']; ?>
								</span></h4>
								<h4 style="padding-left: 30px;">  <p><i class="glyphicon glyphicon-screenshot"></i>
									<?php echo $row['onjob_location']; ?>
								</p><a href="job-info.php?jobid=<?php echo $row['onjob_id']; ?>&empl=<?php echo $row['job_id']; ?>">View more info..</a></h4>
									
								
							</div>	
						</div>

							<div class="col-sm-4">
							<div class="single-post-image">
								<img style="width: 300px;height: 180px;" src="/../home3/Admin/assets/img/<?php echo $row["job_img"]; ?>" alt="Post Title">
							</div>
							</div>
							

							<div class="col-sm-12">
													<i class="glyphicon glyphicon-time"></i><?php echo $format; ?>
							
						</div>
						</div>
						</div>
					
					<!-- End Blog Post -->
					<?php 
						}}if (isset($_POST['okay'])) {

					
					$conn = mysql_connect("localhost","root")or die(mysql_error());
					$db = mysql_select_db("cmdeso_db")or die(mysql_error());
					$search = $_POST['eventc'];
					
					$sqll = mysql_query("SELECT DISTINCT * FROM job_onjob_info   WHERE  onjob_title LIKE '%$search%' OR onjob_position LIKE '%$search%' OR onjob_location LIKE '%$search%' AND onjob_status = 'Active' AND onjob_archive='OFF'  ");

									//$sql = mysql_query("SELECT * FROM admin_job_fair_info WHERE job_archive = 'ON' LIMIT 10  ");
									while ($row = mysql_fetch_array($sqll))
									{//## echo fetched data to display
									//$num += 1;
									//$datatable_length = 10;
									//$format = date_format(date_create($row['jobfair_date'])," F  d,  Y ");
										$date = date_create($row['onjob_datetime']);
											$format = date_format($date, 'g:ia \o\n l jS F Y');
?> 	


					<!-- Blog Post -->
					
						<div class="blog-post" style="border:1px; ">
							

							<div class="col-sm-12" style="border: 1px solid #676666;margin-bottom: 15px;">

								<div class="col-sm-8" style="float: right;">
								<div class="single-post-title" >
								<h2 style="font-size: 20px;"><?php echo $row['onjob_title']; ?> - <?php echo $row['onjob_position']; ?></h2>
							</div>
							<div class="single-post-info">
								<h4 style="padding-left: 30px;"><i class="glyphicon glyphicon-info-sign "></i><span>
									<?php echo $row['onjob_type']; ?>
								</span></h4>
								<h4 style="padding-left: 30px;">  <p><i class="glyphicon glyphicon-screenshot"></i>
									<?php echo $row['onjob_location']; ?>
								</p></h4>
									
								
							</div>	
						</div>
							<?php
													$fk = $row['job_id'];
													$sqll1 = mysql_query("SELECT * FROM admin_job_fair_info  WHERE  job_id = '$fk' ");
													while ($row1 = mysql_fetch_array($sqll1))
														{
													?>
							<div class="col-sm-4">
							<div class="single-post-image">
								<img style="width: 300px;height: 180px;" src="/../home3/Admin/assets/img/<?php echo $row1["job_img"]; ?>" alt="Post Title">
							</div>
							</div>
							<?php 
								}
							?>
							

							<div class="col-sm-12">
													<i class="glyphicon glyphicon-time"></i><?php echo $format; ?>
						</div>
						</div>
						</div>
						<?php 
						}}if (isset($_POST['entries'])) {

					
					$conn = mysql_connect("localhost","root")or die(mysql_error());
					$db = mysql_select_db("cmdeso_db")or die(mysql_error());
					 $datatable_length = $_POST['datatable_length'];
					$sqll = mysql_query("SELECT DISTINCT * FROM job_onjob_info   WHERE  onjob_status = 'Active' AND onjob_archive='OFF' LIMIT $datatable_length  ");

									//$sql = mysql_query("SELECT * FROM admin_job_fair_info WHERE job_archive = 'ON' LIMIT 10  ");
									while ($row = mysql_fetch_array($sqll))
									{//## echo fetched data to display
									//$num += 1;
									//$datatable_length = 10;
									//$format = date_format(date_create($row['jobfair_date'])," F  d,  Y ");
										$date = date_create($row['onjob_datetime']);
											$format = date_format($date, 'g:ia \o\n l jS F Y');
?> 	


					<!-- Blog Post -->
					
						<div class="blog-post" style="border:1px; ">
							

							<div class="col-sm-12" style="border: 1px solid #676666;margin-bottom: 15px;">

								<div class="col-sm-8" style="float: right;">
								<div class="single-post-title" >
								<h2 style="font-size: 20px;"><?php echo $row['onjob_title']; ?> - <?php echo $row['onjob_position']; ?></h2>
							</div>
							<div class="single-post-info">
								<h4 style="padding-left: 30px;"><i class="glyphicon glyphicon-info-sign "></i><span>
									<?php echo $row['onjob_type']; ?>
								</span></h4>
								<h4 style="padding-left: 30px;">  <p><i class="glyphicon glyphicon-screenshot"></i>
									<?php echo $row['onjob_location']; ?>
								</p></h4>
									
								
							</div>	
						</div>
							<?php
													$fk = $row['job_id'];
													$sqll1 = mysql_query("SELECT * FROM admin_job_fair_info  WHERE  job_id = '$fk' ");
													while ($row1 = mysql_fetch_array($sqll1))
														{
													?>
							<div class="col-sm-4">
							<div class="single-post-image">
								<img style="width: 300px;height: 180px;" src="/../home3/Admin/assets/img/<?php echo $row1["job_img"]; ?>" alt="Post Title">
							</div>
							</div>
							<?php 
								}
							?>
							

							<div class="col-sm-12">
													<i class="glyphicon glyphicon-time"></i><?php echo $format; ?>
							
						</div>
						</div>
						</div>
						<?php 
						}}
						?>
					</div>
					</div>
				</div>
		</div>
			</div>
			

	    <!-- Footer -->
	     <div class="footer">
	    	<div class="container">
			
		    
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2018 DNM</div>
		    		</div>
		    	</div>
		    </div>
	    </div>
        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
		
		<!-- Scrolling Nav JavaScript -->
		<script src="js/jquery.easing.min.js"></script>
		<script src="js/scrolling-nav.js"></script>		

    </body>
</html>