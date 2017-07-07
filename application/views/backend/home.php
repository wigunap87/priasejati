<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1">
		<title><?php echo $title; ?></title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
		
		<!-- CSS Here -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/tabs-accordion.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/calendar.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/default.css" />
		
		<!-- Javascript Here -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/ckeditor/ckeditor.js?body=1"></script>
		<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/pie-chart.js"></script>-->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/highchart/highcharts.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/highchart/modules/exporting.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/toggle.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/tooltips.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/calendar.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/zebra_datepicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/core.js"></script>
		
		
	</head>
	
	<body>
		<div id="container">
			<div id="header">
				<div class="header-left"><img src="<?php echo base_url(); ?>assets/backend/images/logo.png" alt="L-cq" title="l-cq" height="33px" /></div>
				<div class="header-right">
					<div class="hr1"><img src="<?php echo base_url(); ?>assets/backend/images/cog.png" alt="Setting" title="Setting"/></div>
					<div class="hr2"><a href="<?php echo base_url(); ?>pbackend/setting/view/1" title="Setting">Setting</a></div>
					<div class="hr3"><img src="<?php echo base_url(); ?>assets/backend/images/193.png" alt="Logout" title="Logout"/></div>
					<div class="hr4"><a href="<?php echo base_url(); ?>pbackend/main/logout" title="Logout">Logout</a></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div> <!-- End of header -->
			
			<div id="content">
				<div class="content-left">
					<div class="cl-top">
						<div class="clt-left"><img src="<?php echo base_url(); ?>assets/backend/images/user.png" alt="user" /></div>
						<div class="clt-right">
							<h4><?php echo $this->session->userdata('admfullname'); ?></h4>
							Last Login : <?php echo date("d F Y H:i:s"); ?>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="cl-bottom">
						<div id="accordion">
							
							<h2>News</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>pbackend/news/addnews'>&#187; Add News</a><br>
								<a href='<?php echo base_url(); ?>pbackend/news'>&#187; News</a><br>
							</div>
							
							<h2>Partner</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>pbackend/partner/addpartner'>&#187; Add Partner</a><br>
								<a href='<?php echo base_url(); ?>pbackend/partner'>&#187; Partner</a><br>
							</div>
							
							<h2>Gallery</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>pbackend/gallery/addgallery'>&#187; Add Gallery</a><br>
								<a href='<?php echo base_url(); ?>pbackend/gallery'>&#187; Gallery</a><br>
								<a href='<?php echo base_url(); ?>pbackend/catgallery'>&#187; Category</a><br>
							</div>
							
							<h2>Other</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>pbackend/slider'>&#187; Slider</a><br>
								<a href='<?php echo base_url(); ?>pbackend/page'>&#187; Dynamic Page</a><br>
								<a href='<?php echo base_url(); ?>pbackend/contact'>&#187; Manage Contact</a><br>
							</div>
							
							<h2>Administrator</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>pbackend/admin/addadmin'>&#187; Add Administrator</a><br>
								<a href='<?php echo base_url(); ?>pbackend/admin'>&#187; View All Administrator</a><br>
							</div>
							
						</div>
						<!-- activate tabs with JavaScript -->
						<script>
							$(function() { 
								$("#accordion").tabs("#accordion div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
							});
						</script>
					</div> <!-- End of cl-bottom -->
					
					
				</div> <!-- End of content-left -->
				<div class="content-right">
					<div class="cr-top">
						<div class="crt-left">
							<h4>Dashboard</h4>
							<div class="breadcrumb">
								<a href="<?php echo base_url(); ?>pbackend/dashboard">Home</a> -&#187; <?php echo $name; ?>
							</div> <!-- End of breadcrumb -->
						</div>
						<div class="crt-right">
							<!--<form method="post" action="<?php echo base_url(); ?>/search-content" name="search">
								Title / Name <input type="text" name="_title" placeholder="Title" maxlength="30" class="search-input"/>
								Menu <select name="_menu" class="search-select">
									<option value="" selected>-- Choose</option>
									<option value="Work">Work</option>
									<option value="Member">Member</option>
								</select>
								
								<input type="submit" name="_search" value="Go" />
							</form>-->
						</div> <!-- End of crt-right -->
						<div class="clear"></div>
					</div> <!-- End of cr-top -->
					
					<?php
						$this->load->view($content);
					?>
				</div> <!-- End of content-right -->
				<div class="clear"></div>
			</div>
		</div>
		
	</body>
</html>