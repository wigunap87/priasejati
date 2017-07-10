<div class="content-slider">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php 
						$noslides = 0;
						foreach($getslider as $gslide) :
							if($noslides == 0) {
								$classesss = 'class="active"';
							} else {
								$classesss = '';
							}
						?>
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $noslides; ?>" <?php echo $classesss; ?>></li>
						<?php
						$noslides++;
						endforeach;
						?>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php 
						$noslide = 1;
						foreach($getslider as $gslid) :
							if($noslide == 1) {
								$classess = 'active';
							} else {
								$classess = '';
							}
						?>
						<div class="item <?php echo $classess; ?>">
							<img src="<?php echo base_url(); ?>media/slider/<?php echo $gslid->slider_images; ?>" alt="<?php echo $gslid->slider_title; ?>" />
						</div>
						<?php
						$noslide++;
						endforeach;
						?>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div> <!-- End of content-slider -->
			
			<div class="content-who">
				<div class="content-who-content">
					<?php foreach($getabout as $ga) : ?>
					<h1><?php echo $ga->page_title; ?></h1>
					<div class="content-who-text">
						<?php echo html_entity_decode($ga->page_desc); ?>
					</div>
					
					<!--<div class="content-who-info">
						<a href=""><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</div>-->
					<?php endforeach; ?>
				</div>
			</div> <!-- End of content-who -->
			
			<div class="content-ournews">
				<div class="content-ournews-content">
					<h1>News &amp; Events</h1>
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-7 col-md-7">
								<?php foreach($getnews as $gnews) : ?>
								<div class="cnlist-items-no">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-5 no-margin">
												<img src="<?php echo base_url(); ?>media/news/<?php echo $gnews->news_images; ?>" alt="<?php echo $gnews->news_title; ?>" width="100%" />
											</div>
											<div class="col-xs-12 col-sm-7 col-md-7">
												<h2><?php echo $gnews->news_title; ?></h2>
												<p>
													<?php echo html_entity_decode(strip_tags(word_limiter($gnews->news_desc, 15))); ?>
												</p>
												<div align=right>
													<a href="<?php echo base_url(); ?>news/view/<?php echo date('Ymd', strtotime($gnews->news_createdate)); ?>/<?php echo $gnews->id_news_record.'-'.strtolower(str_replace($arrayseo,'-',$gnews->news_title)); ?>"><button name="go" type="button">Read More</button></a>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
								<!--<div class="cnlist-items-no">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-5 no-margin">
												<img src="assets/images/news-items.png" alt="" width="100%" />
											</div>
											<div class="col-xs-12 col-sm-7 col-md-7">
												<h2>Pusintek Kemenkeu – Analytic Platform System (News)</h2>
												<p>
													Ebiz winning the tender process and get an opportunity from Ministry of Finance to implementing Analytic Platform System (APS). Ministry of Finance has a program to build and implement single source of truth from their directorate and they need strong and trustworthy hardware to accommodate it...
												</p>
												<div align=right>
													<a href="newsdetail-pusintek.php"><button name="go" type="button">Read More</button></a>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="cnlist-items-no">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-5 no-margin">
												<img src="assets/images/news-items.png" alt="" width="100%" />
											</div>
											<div class="col-xs-12 col-sm-7 col-md-7">
												<h2>Partnership with Sitecore (News)</h2>
												<p>
													Ebiz and Sitecore establish a partnership and this make Ebiz become first company in Indonesia to establish partnership with Sitecore. Sitecore is American company by acting as a principle with the product of Content Management System (CMS)...
												</p>
												<div align=right>
													<a href="newsdetail-partnership.php"><button name="go" type="button">Read More</button></a>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="cnlist-items-no">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-5 no-margin">
												<img src="assets/images/news-items.png" alt="" width="100%" />
											</div>
											<div class="col-xs-12 col-sm-7 col-md-7">
												<h2>Partnership with Ephesoft (News)</h2>
												<p>
													Ebiz and Ephesoft establish a partnership. Ephesoft is American company by acting as a principle with the product of Document capture solution. With this solution will help the company to eliminating manual document processing, validation, human error, save time, and data entry...
												</p>
												<div align=right>
													<a href="newsdetail-ephesoft.php"><button name="go" type="button">Read More</button></a>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>-->
								
							</div>
							<div class="col-xs-12 col-sm-5 col-md-5 sosmed-ebiz">
								<a class="twitter-timeline" data-width="280" data-height="350" href="https://twitter.com/EbizCiptaSolusi">Tweets by EbizCiptaSolusi</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
								
								<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FEbizCiptaSolusi&tabs=timeline&width=280&height=350&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=301688350225758" width="280" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="content-ourservices">
				<div class="content-ourservices-content">
					<h1>Our Gallery</h1>
					<div class="jcarouselhome">
						<ul>
							<?php foreach($getcatgallery as $gcatgal) : 
								$getsinglegallery = $this->Main_front->getsinglegallery($gcatgal->id_catgallery_record);
							?>
							<li>
								<div class="otherservices-items">
									<?php 
									foreach($getsinglegallery as $ggal) :
										echo '<img src="'.base_url().'media/gallery/'.$ggal->gallery_images.'" alt="" width="220px" height="144px" />';
									endforeach;
									?>
									
									<h3><?php echo $gcatgal->catgallery_title; ?></h3>
									
								</div>
							</li>
							<?php endforeach; ?>
							<!--<li>
								<div class="otherservices-items">
									<img src="assets/images/services/SharePoint.jpg" alt="" width="100%"/>
									
									<h3>Share Point</h3>
									
								</div>
							</li>
							<li>
								<div class="otherservices-items">
									<img src="assets/images/services/epm.jpg" alt="" width="100%"/>
									
									<h3>Enterprise Project Management</h3>
									
								</div>
							</li>
							<li>
								<div class="otherservices-items">
									<img src="assets/images/services/custom.jpg" alt="" width="100%"/>
									
									<h3>Custom Application</h3>
									
								</div>
							</li>
							<li>
								<div class="otherservices-items">
									<img src="assets/images/services/bpm.jpg" alt="" width="100%"/>
									
									<h3>Business Process Management</h3>
									
								</div>
							</li>
							<li>
								<div class="otherservices-items">
									<img src="assets/images/services/dms.jpg" alt="" width="100%"/>
									
									<h3>Document Management System</h3>
									
								</div>
							</li>
							<li>
								<div class="otherservices-items">
									<img src="assets/images/services/xbrl.jpg" alt="" width="100%"/>
									
									<h3>XBRL</h3>
									
								</div>
							</li>-->
						</ul>
						<div class="clearfix"></div>
					</div>
					<a href="#" class="jcarouselhome-control-prev"><img src="<?php echo base_url(); ?>assets/images/arrow-left.jpg" width="40px"/></a>
					<a href="#" class="jcarouselhome-control-next"><img src="<?php echo base_url(); ?>assets/images/arrow-right.jpg" width="40px"/></a>
				</div>
			</div>
			
			<div class="content-partners" id="our-partner">
				<!--<div class="jcarouselpartners">
					<ul>
						<li>
							<img src="assets/images/icon-nintex.jpg" alt="Nintex" height="100px"/>
							<img src="assets/images/icon-altova.jpg" alt="Altova" height="100px"/>
							<img src="assets/images/icon-fujitsu.jpg" alt="Fujitsu" height="100px" />
							<img src="assets/images/icon-ephesoft.jpg" alt="Ephesoft" height="100px" />
							<img src="assets/images/icon-horton.jpg" alt="Hortonwork"  height="100px"/>
							<img src="assets/images/icon-sitecore.jpg" alt="Sitecore"  height="100px"/>
						</li>
						<li>
							<img src="assets/images/icon-nintex.jpg" alt="Nintex" height="100px"/>
							<img src="assets/images/icon-altova.jpg" alt="Altova" height="100px"/>
							<img src="assets/images/icon-fujitsu.jpg" alt="Fujitsu" height="100px" />
							<img src="assets/images/icon-ephesoft.jpg" alt="Ephesoft" height="100px" />
							<img src="assets/images/icon-horton.jpg" alt="Hortonwork"  height="100px"/>
							<img src="assets/images/icon-sitecore.jpg" alt="Sitecore"  height="100px"/>
						</li>
						<li>
							<img src="assets/images/icon-nintex.jpg" alt="Nintex" height="100px"/>
							<img src="assets/images/icon-altova.jpg" alt="Altova" height="100px"/>
							<img src="assets/images/icon-fujitsu.jpg" alt="Fujitsu" height="100px" />
							<img src="assets/images/icon-ephesoft.jpg" alt="Ephesoft" height="100px" />
							<img src="assets/images/icon-horton.jpg" alt="Hortonwork"  height="100px"/>
							<img src="assets/images/icon-sitecore.jpg" alt="Sitecore"  height="100px"/>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<a href="#" class="jcarouselpartner-control-prev"><img src="assets/images/arrow-left.jpg" width="40px"/></a>
				<a href="#" class="jcarouselpartner-control-next"><img src="assets/images/arrow-right.jpg" width="40px"/></a>-->
				<?php 
				foreach($getpartner as $gpart) :
					echo '<img src="'.base_url().'media/partner/'.$gpart->partner_images.'" alt="'.$gpart->partner_title.'" height="60px"/>';
				endforeach;
				?>
				<!--<img src="assets/images/icon-altova.jpg" alt="Altova" height="60px"/>
				<img src="assets/images/icon-fujitsu.jpg" alt="Fujitsu" height="60px" />
				<img src="assets/images/icon-ephesoft.jpg" alt="Ephesoft" height="60px" />
				<img src="assets/images/icon-horton.jpg" alt="Hortonwork"  height="60px"/>
				<img src="assets/images/icon-sitecore.jpg" alt="Sitecore"  height="60px"/>
				<img src="assets/images/icon-hp2.jpg" alt="Hp"  height="60px"/>
				<img src="assets/images/icon-microsoft2.jpg" alt="Microsoft"  height="60px"/>-->
			</div>