
	<div class="content-contact">
		<div class="content-contact-top">
			<h1>Contact Us</h1>
		</div>
		
		<div class="content-contact-form">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 no-margin">
						<?php echo $this->session->flashdata('errorcontact'); ?>
						<form method="post" action="<?php echo site_url('contactprocess'); ?>" autocomplete="off" data-toggle="validator">
							<p>
								<input type="text" name="fullname" maxlength="150" placeholder="NAME" required />
							</p>
							<p>
								<input type="email" name="email" maxlength="150" placeholder="EMAIL" required />
							</p>
							<p>
								<input type="text" name="subject" maxlength="150" placeholder="SUBJECT" required />
							</p>
							<p>
								<textarea name="message" rows="5" placeholder="MESSAGE" required></textarea>
							</p>
							<p align=right>
								<input type="submit" name="submit" value="Send Message" />
							</p>
						</form>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<h1>Our Office</h1>
						<div class="contact-form-address">
							<ul>
								<li><img src="<?php echo base_url(); ?>assets/images/icon-address.png" alt="Contact Address Ebiz Cipta Solusi" width="53px"/></li>
								<li><?php echo $saddress; ?></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="contact-form-phone">
							<ul>
								<li><img src="<?php echo base_url(); ?>assets/images/icon-phone.png" alt="Contact Address Ebiz Cipta Solusi" width="53px"/></li>
								<li class="padding-medium"><?php echo $sphone; ?><br/>
									<?php echo $sfax; ?>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="contact-form-email">
							<ul>
								<li><img src="<?php echo base_url(); ?>assets/images/icon-email.png" alt="Contact Address Ebiz Cipta Solusi" /></li>
								<li class="padding-center"><a href="mailto:<?php echo $semail; ?>"><?php echo $semail; ?></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
		<div class="content-contact-maps">
			<div id="map"></div>
			<script>

				function initMap() {
					var myLatLng = {lat: -6.2296037, lng: 106.8251748};

					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 17,
						center: myLatLng,
						zoomControl: false,
						scaleControl: false,
						scrollwheel: false,
						disableDoubleClickZoom: true
					});

					var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						title: 'Ebiz Cipta Solusi'
					});
				}

			</script>
			<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABPFcCMCG1UdzSFzmLyqsKWXH8qzUP_6U&signed_in=true&callback=initMap"></script>
		  </body>
		</div>
	</div>