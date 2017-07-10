
	<div class="content-newsdetail">
		<div class="content-newsdetail-content">
			<?php
			foreach($getsinglenews as $gsn) :
			?>
			<h1><?php echo $gsn->news_title; ?></h1>
			
			<div class="cnewsdetail-text">
				<img src="<?php echo base_url(); ?>media/news/<?php echo $gsn->news_images; ?>" alt="<?php echo $gsn->news_title; ?>" width="500px" height="462px" />
				<?php echo html_entity_decode($gsn->news_desc); ?>
				<div class="clearfix"></div>
			</div>
			<?php
			endforeach;
			?>
		</div>
		
		<div class="content-newsdetail-othernews">
			<div class="cnothernews-text">
				<h1>Other News</h1>
				<div class="jcarousel">
					<ul>
						<?php foreach($othernews as $ons) : ?>
						<li>
							<div class="othernews-items">
								<a href="<?php echo base_url(); ?>news/view/<?php echo date('Ymd', strtotime($ons->news_createdate)); ?>/<?php echo $ons->id_news_record.'-'.strtolower(str_replace($arrayseo,'-',$ons->news_title)); ?>">
									<img src="<?php echo base_url(); ?>media/news/<?php echo $ons->news_images; ?>" alt="<?php echo $ons->news_title; ?>" width="280px"/>
									<h3><?php echo $ons->news_title; ?></h3>
								</a>
							</div>
							
						</li>
						<?php endforeach; ?>
						
					</ul>
					<div class="clearfix"></div>
				</div>
				<a href="#" class="jcarousel-control-prev"><img src="<?php echo base_url(); ?>assets/images/arrow-left.jpg" width="40px"/></a>
				<a href="#" class="jcarousel-control-next"><img src="<?php echo base_url(); ?>assets/images/arrow-right.jpg" width="40px"/></a>
			</div>
		</div>
	</div>