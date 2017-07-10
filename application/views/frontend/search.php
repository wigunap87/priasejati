
	<div class="content-about">
		<div class="content-about-top">
			<h1>Search Result</h1>
		</div>
		
		<div class="content-about-text">
			<!--<div class="cat-logo">
				<img src="assets/images/logo-about.png" alt="Ebiz Cipta Solusi" width="200px"/>
			</div>-->
			
			<div class="cat-info">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 no-margin">
							<div class="search-left">
								<h3>Partner</h3>
								<ul>
									<?php foreach($getpartner as $gpar) : 
										echo '<li><a href="'.base_url().'partner">'.$gpar->partner_title.'</a></li>';
									endforeach; ?>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 no-margin">
							<div class="search-right">
								<h3>Gallery</h3>
								<ul>
									<?php foreach($getgallery as $ggal) : 
										echo '<li><a href="'.base_url().'gallery">'.$ggal->gallery_title.'</a></li>';
									endforeach; ?>
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<div class="content-news-search">
					<h3>News &amp; Events</h3>
					<?php 
					$no = 1;
					foreach($getnews as $snews) : 
						if($no % 2 == 0) {
							echo '<div class="cnlist-items">';
						} else {
							echo '<div class="cnlist-items-gray">';
						}
					?>
					
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-3 col-md-3 no-margin">
									<img src="<?php echo base_url(); ?>media/news/<?php echo $snews->news_images; ?>" alt="" width="100%" />
								</div>
								<div class="col-xs-12 col-sm-9 col-md-9" align=left>
									<h1><?php echo $snews->news_title; ?></h1>
									<p>
										<?php echo html_entity_decode(strip_tags(word_limiter($snews->news_desc, 15))); ?>
									</p>
									<p align="right"><a href="<?php echo base_url(); ?>news/view/<?php echo date('Ymd', strtotime($snews->news_createdate)); ?>/<?php echo $snews->id_news_record.'-'.strtolower(str_replace($arrayseo,'-',$snews->news_title)); ?>">Read More</a></p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<?php 
					$no++;
					endforeach; 
					?>
				</div>
			</div>
		</div>
		
	</div>