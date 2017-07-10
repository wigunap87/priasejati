<?php foreach($singlecat as $gcat) : ?>
<div class="content-gallery">
	<div class="content-about-top">
		<h1><?php echo $gcat->catgallery_title; ?></h1>
	</div>
	<div class="content-gallery-content">
		<ul>
			<?php 
				foreach($showgallery as $ggal) :
			?>
			<li>
				<img src="<?php echo base_url(); ?>media/gallery/<?php echo $ggal->gallery_images; ?>" alt="" width="227px" height="144px" />
						
				<h2><?php echo $ggal->gallery_title; ?></h2>
				<div class="gallery-desc">
					<?php echo html_entity_decode($ggal->gallery_desc); ?>
				</div>
				
			</li>
			<?php endforeach; ?>
		</ul>
		<div class="cnlist-pagination">
			<?php echo $paginator; ?>
		</div>
	</div>
</div>
<?php endforeach; ?>