
	<div class="content-news">
		<div class="content-news-top">
			<h1>News &amp; Events</h1>
		</div>
		
		<div class="content-news-list">
			<?php 
			$no = 1;
			foreach($shownews as $snews) : 
				if($no % 2 == 0) {
					echo '<div class="cnlist-items">';
				} else {
					echo '<div class="cnlist-items-gray">';
				}
			?>
			
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 no-margin">
							<img src="<?php echo base_url(); ?>media/news/<?php echo $snews->news_images; ?>" alt="" width="233px" height="155px" />
						</div>
						<div class="col-xs-12 col-sm-9 col-md-9">
							<h1><?php echo $snews->news_title; ?></h1>
							<p>
								<?php echo html_entity_decode(strip_tags(word_limiter($snews->news_desc, 15))); ?>
							</p>
							<a href="<?php echo base_url(); ?>news/view/<?php echo date('Ymd', strtotime($snews->news_createdate)); ?>/<?php echo $snews->id_news_record.'-'.strtolower(str_replace($arrayseo,'-',$snews->news_title)); ?>"><button name="go" type="button">Read More</button></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<?php 
			$no++;
			endforeach; 
			?>
			<!--
			<div class="cnlist-items-gray">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 no-margin">
							<img src="assets/images/news-items.png" alt="" width="100%" />
						</div>
						<div class="col-xs-12 col-sm-9 col-md-9">
							<h1>Pusintek Kemenkeu – Analytic Platform System (News)</h1>
							<p>
								Ebiz winning the tender process and get an opportunity from Ministry of Finance to implementing Analytic Platform System (APS). Ministry of Finance has a program to build and implement single source of truth from their directorate and they need strong and trustworthy hardware to accommodate it...
							</p>
							<a href="newsdetail-pusintek.php"><button name="go" type="button">Read More</button></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			<div class="cnlist-items">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 no-margin">
							<img src="assets/images/news-items.png" alt="" width="100%" />
						</div>
						<div class="col-xs-12 col-sm-9 col-md-9">
							<h1>Partnership with Sitecore (News)</h1>
							<p>
								Ebiz and Sitecore establish a partnership and this make Ebiz become first company in Indonesia to establish partnership with Sitecore. Sitecore is American company by acting as a principle with the product of Content Management System (CMS)...
							</p>
							<a href="newsdetail-partnership.php"><button name="go" type="button">Read More</button></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			<div class="cnlist-items-gray">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 no-margin">
							<img src="assets/images/news-items.png" alt="" width="100%" />
						</div>
						<div class="col-xs-12 col-sm-9 col-md-9">
							<h1>Partnership with Ephesoft (News)</h1>
							<p>
								Ebiz and Ephesoft establish a partnership. Ephesoft is American company by acting as a principle with the product of Document capture solution. With this solution will help the company to eliminating manual document processing, validation, human error, save time, and data entry...
							</p>
							<a href="newsdetail-ephesoft.php"><button name="go" type="button">Read More</button></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			<div class="cnlist-items">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 no-margin">
							<img src="assets/images/news-items.png" alt="" width="100%" />
						</div>
						<div class="col-xs-12 col-sm-9 col-md-9">
							<h1>XBRL Asia RoundTable (Event)</h1>
							<p>
								XBRL Asia Roundtable held at Rich Charlton Pacific Place in Jakarta, Indonesia with around 800 people from Indonesia, Brunei, India, Japan, Korea, Malaysia, Philippines, and Singapore...
							</p>
							<a href="newsdetail-xbrlasia.php"><button name="go" type="button">Read More</button></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			<div class="cnlist-items-gray">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 no-margin">
							<img src="assets/images/news-items.png" alt="" width="100%" />
						</div>
						<div class="col-xs-12 col-sm-9 col-md-9">
							<h1>OJK – Regulatory Report for Multifinance Company</h1>
							<p>
								Ebiz winning the tender process to implementing Reporting system for Multi finance Company and the project owner of this project is Capital Market Supervisory (OJK)...
							</p>
							<a href="newsdetail-ojk.php"><button name="go" type="button">Read More</button></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>-->
			<div class="cnlist-pagination">
				<?php echo $paginator; ?>
			</div>
		</div>
	</div>