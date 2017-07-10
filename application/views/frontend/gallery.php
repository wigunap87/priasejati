<div class="content-gallery">
	<div class="content-about-top">
		<h1>Gallery</h1>
	</div>
	<div class="content-gallery-content">
		<ul>
			<?php foreach($showgallery as $gcatgal) : 
				$getsinglegallery = $this->Gallery_front->getsinglegallery($gcatgal->id_catgallery_record);
			?>
			<li>
				<div class="otherservices-items">
					<?php 
					foreach($getsinglegallery as $ggal) :
						echo '<img src="'.base_url().'media/gallery/'.$ggal->gallery_images.'" alt="" width="227px" height="144px" />';
					endforeach;
					?>
						
					<h3><a href="<?php echo base_url(); ?>gallery/view/<?php echo $gcatgal->id_catgallery_record.'-'.strtolower(str_replace($arrayseo, '-', $gcatgal->catgallery_title)); ?>"><?php echo $gcatgal->catgallery_title; ?></a></h3>
							
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
		<div class="cnlist-pagination">
			<?php echo $paginator; ?>
		</div>
	</div>
</div>