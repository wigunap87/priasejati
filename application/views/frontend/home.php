<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="" />
		<meta name="keywords" content="" />

		<title><?php echo $title; ?></title>
		
		<!-- Load Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
		
		<!-- Load CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jcarousel.responsive.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css" />
		
		
		<!-- Load Jquery -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jcarousel.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jcarousel.responsive.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jcarousel.responsivehome.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jcarousel.responsivepartner.js"></script>
		
	</head>
	
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=862719277100434";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<div id="small-logo" style="display:block;">
			<a href="#" id="gototop">
				<img src="<?php echo base_url(); ?>assets/images/top.png" alt="Ebiz Cipta Solusi" />
			</a>
		</div>
		<div id="header">
			<div class="header-top">
				<div class="header-top-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 no-margin">
								<a href="<?php echo base_url(); ?>">
									<img src="<?php echo base_url(); ?>assets/images/logo-header.png" alt="" width="350px"/>
								</a>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 no-margin">
								<div class="htc-right">
									<ul>
										<li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
										<li class="last">
											<?php echo $this->session->flashdata('errorsearch'); ?>
											<form method="POST" action="<?php echo site_url('search'); ?>" autocomplete="off" data-toggle="required">
												<input type="text" name="searchkey" placeholder="Search ..." required />
												<button type="submit" name="submit" value="submit"><span class="glyphicon glyphicon-search"></span></button>
											</form>
										</li>
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom">
				<div class="header-bottom-menu">
					<ul>
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url(); ?>about">About</a></li>
						<li><a href="<?php echo base_url(); ?>gallery">Gallery</a></li>
						<li><a href="<?php echo base_url(); ?>news">News &amp; Events</a></li>
						<li class="last" <?php if($content == 'frontend/main') { echo 'id="myScroll"'; } ?>><a href="<?php echo base_url(); ?>#our-partner">Partners</a></li>
					</ul>
				</div>
			</div>
			
			<div class="header-mobile">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Ebiz Cipta Solusi" class="img-logo" /></a>
				<p id="back-top">
					<a href="#"><img src="<?php echo base_url(); ?>assets/images/bg-menu.png" alt="Menu Mobile" /></a>
				</p>
				<p id="backs-top">
					<a href="#"><img src="<?php echo base_url(); ?>assets/images/bg-menu.png" alt="Menu Mobile" /></a>
				</p>
			</div>
			<div class="header-mobile-menu">
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url(); ?>about">About</a></li>
					<li><a href="<?php echo base_url(); ?>gallery">Gallery</a></li>
					<li><a href="<?php echo base_url(); ?>news">News &amp; Events</a></li>
					<li class="last" <?php if($content == 'frontend/main') { echo 'id="myScroll"'; } ?>><a href="<?php echo base_url(); ?>#our-partner">Partners</a></li>
				</ul>
			</div>
			<script type="text/javascript">
				$("#backs-top a").hide();
				$("#back-top a").click(function(){
					$("div.header-mobile-menu").animate({left: '0px'});
					$("#back-top a").hide();
					$("#backs-top a").show();
				}); 
				$("#backs-top a").click(function(){
					$("div.header-mobile-menu").animate({left: '-200px'});
					$("#back-top a").show();
					$("#backs-top a").hide();
				}); 
			</script>
		</div> <!-- End of header -->
		
		<div id="content">
			<?php $this->load->view($content); ?>
		</div>
		
		<div id="footer">
			<div class="footer-top">
				<div class="footer-top-content">
					<!--<img src="assets/images/logo.png" alt="Ebiz Cipta Solusi" class="footer-logo" />-->
					<div class="footer-top-contact">
						<h2>Contact Info</h2>
						<div class="ftc-info">
							<p><font color="#0077c2"><span class="glyphicon glyphicon-map-marker"></span></font> <?php echo str_replace('<br>',' ',$saddress); ?></p>
							<p><font color="#0077c2"><span class="glyphicon glyphicon-earphone"></span></font> <strong><?php echo $sphone; ?> /</strong> <?php echo $sfax; ?></p>
							<p><font color="#0077c2"><span class="glyphicon glyphicon-envelope"></span></font> <strong><a href="mailto:<?php echo $semail; ?>"><?php echo $semail; ?></a></strong></p>
						</div>
					</div>
					<p>
						
						Follow Us &nbsp;&nbsp;&nbsp;
						<a href="<?php echo $sfacebook; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/icon-fb.png" alt="Facebook" /></a>
						<a href="<?php echo $stwitter; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/icon-tw.png" alt="Twitter" /></a>
						<a href="<?php echo $sinstagram; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/icon-ig.png" alt="Instagram" /></a>
					</p>
					
					<!--<div class="footer-top-navigation">
						<h2>Navigation</h2>
						<ul>
							<li><a href="about.php">About</a></li>
							<li><a href="services.php">Services</a></li>
							<li><a href="#">Products</a>
								<ul class="submenu">
									<li><a href="procurement.php">Procurement</a></li>
									<li><a href="xbrl.php">XBRL</a></li>
								</ul>
							</li>
							<li><a href="clients.php">Clients</a></li>
							<li><a href="news.php">News &amp; Events</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
					
					<div class="footer-top-partner">
						<img src="assets/images/icon-hp.jpg" alt="Hp" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<img src="assets/images/icon-microsoft.jpg" alt="Microsoft" />
					</div>-->
				</div>
			</div>
			<div class="footer-bottom">
				Pria Sejati 2017 &copy; All Rights Reserved
			</div>
		</div> <!-- end of footer -->
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#small-logo").hide();
				$(function () {
					$(window).scroll(function () {
						if ($(this).scrollTop() > 100) {
							$('#small-logo').fadeIn();
						} else {
							$('#small-logo').fadeOut();
						}
					});
					$('#small-logo a').click(function () {
						$('body,html').animate({
							scrollTop: 0
						}, 800);
						return false;
					});
				});
			});
			
			$(document).ready(function(){
				$('body').scrollspy({
					target: ".header-bottom", 
					offset: 50
				}); 
				// Add smooth scrolling on all links inside the navbar
				$("#myScroll a").on('click', function(event) {
					// Prevent default anchor click behavior
					event.preventDefault();
					// Store hash
					var hash = this.hash;
					// Using jQuery's animate() method to add smooth page scroll
					// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
					$('html, body').animate({
						scrollTop: $(hash).offset().top
					}, 800, function(){
						// Add hash (#) to URL when done scrolling (default click behavior)
						window.location.hash = hash;
					});
				});
			});
		</script>
	</body>
</html>