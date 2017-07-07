<html>
	<head>
		<title>Pria Sejati Administrator</title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
		
		<!-- CSS Here -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/style-login.css" />
		
		<!-- Javascript Here -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/jquery.tools.min.js"></script>
	</head>
	
	<body>
		<div id="container">
			<div id="content">
				<div class="content-head">
					<div class="ch-left">
						<img src="<?php echo base_url(); ?>assets/backend/images/logo-green.png" alt="L-cq" />
					</div>
					<!--<div class="ch-right"><img src="assets/images/icon-keys.png" alt="Sign In" title="Sign In" /></div>-->
					<div class="ch-right2">Administrator Sign In</div>
					<div class="clear"></div>
				</div>
				<div class="content-cont">
					<form method="post" action="<?php echo base_url(); ?>pbackend/main/adminlogin" name="login" id="login" autocomplete="off">
					<div class="cc-form">
						<div class="field">
							<div class="field-title">Email</div>
							<div class="field-info"><input type="text" name="_email" maxlength="30"/></div>
							<div class="clear"></div>
						</div>
						<div class="fields">
							<div class="field-title">Password</div>
							<div class="field-info"><input type="password" name="_passwd" maxlength="20"/></div>
							<div class="clear"></div>
						</div>
						<?php 
							echo $this->session->flashdata('loginadmin'); 
						?>
					</div>
					<div class="cc-submit">
						<div class="ccs-left">Powered by <a href="http://www.l-cq.com" target="_blank">www.l-cq.com</a> 2016</div>
						<div class="ccs-right"><input type="submit" name="_submit" value="Sign In" /></div>
						<div class="clear"></div>
					</div>
					</form>
				</div>
			</div> <!-- End of content -->
		</div> <!-- End of Container -->
	</body>
</html>