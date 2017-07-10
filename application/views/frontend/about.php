<?php foreach($getabout as $ga) : ?>
	<div class="content-about">
		<div class="content-about-top">
			<h1><?php echo $ga->page_title; ?></h1>
		</div>
		
		<div class="content-about-text">
			<!--<div class="cat-logo">
				<img src="assets/images/logo-about.png" alt="Ebiz Cipta Solusi" width="200px"/>
			</div>-->
			
			<div class="cat-info">
				<?php echo html_entity_decode($ga->page_desc); ?>
			</div>
		</div>
		
		<!--<div class="content-about-coverage">
			<h1>Coverage Area</h1>
		</div>
		
		<div class="content-coverage-text">
			<div class="content-coverage-text-content">
			<p>Most of our completed project are Enterprise DataWarehouse (EDW) and SharePoint Solution but not limited to other solution such as Business Process Management (BPM), Enterprise Project Management (EPM), eXtensible Business Report Language (XBRL), Document Management Solution (DMS), and Custom development. You can find out the detail description in our product and service pages.</p>

			<p>We always commited to deliver with the best design and quality solution to enhance business productivity. We served in Financial and non Financial industry for small, medium, and Enterprise company which you can find out the detail in our clients page.</p>
			</div>
		</div>
		
		<div class="content-about-sister">
			<h1>Our Sister Company</h1>
			<div class="sister-company">
				<ul>
					<li>
						<div class="sister-company-items">
							<img src="assets/images/logo-microresa.jpg" alt="Microreksa Infotama" />
							<hr />
							<div class="sci-text">
								<h2>PT. Microreksa Infotama</h2>
								<p>
								A Company with main business is focusing in selling hardware.
								</p>
							</div>
						</div>
					</li>
					<li>
						<div class="sister-company-items">
							<img src="assets/images/logo-artha.jpg" alt="Microreksa Infotama" />
							<hr />
							<div class="sci-text">
								<h2>PT. Artha Infotama</h2>
								<p>
									A Microsoft Gold Competency partner with main business is selling Enterprise Resource Planning (ERP).
 								</p>
							</div>
						</div>
					</li>
					<li>
						<div class="sister-company-items">
							<img src="assets/images/logo-nettrain.jpg" alt="Microreksa Infotama" />
							<hr />
							<div class="sci-text">
								<h2>PT. Nettrain Informatika</h2>
								<p>
									A Company with main business providing training services.
								</p>
							</div>
						</div>
					</li>
					<li>
						<div class="sister-company-items">
							<img src="assets/images/logo-mitrasoft.jpg" alt="Microreksa Infotama" />
							<hr />
							<div class="sci-text">
								<h2>PT. Mitrasoft Infonet</h2>
								<p>
									A Company with main business is focusing in selling licenses.
								</p>
							</div>
						</div>
					</li>
				</ul>
				
				<div class="clearfix"></div>
			</div>
		</div>-->
	</div>
<?php endforeach; ?>