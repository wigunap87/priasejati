<?php foreach($show_slider as $sgal) : ?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Slider Home - <?php echo $sgal->slider_title; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>pbackend/slider/editslider_process" name="add-slider" id="add-slider" enctype="multipart/form-data">
							<div class="bbox-cont" id="box-cont1">
								
								<input type="hidden" name="getid" value="<?php echo $sgal->id_slider_record; ?>" />
								<div class="fieldpage">
									<div class="fieldpage-title">Title</div>
									<div class="fieldpage-info">
										<input type="text" name="title" class="input-form" value="<?php echo $sgal->slider_title; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Video</div>
									<div class="fieldpage-info">
										<video width="400" controls>
											<source src="<?php echo base_url(); ?>media/category/<?php echo $sgal->slider_images; ?>" type="video/mp4">
										</video>
										<input type="file" name="_userfile" class="input-form" />
										<font color="red"><i>Upload video type : mp4. Max Upload 5MB.</i></font>
									</div>
									<div class="clear"></div>
								</div>
								
								<!--<div class="fieldpage">
									<div class="fieldpage-title">Link</div>
									<div class="fieldpage-info">
										<input type="text" name="link" class="input-form" value="<?php echo $sgal->slider_link; ?>"/>
									</div>
									<div class="clear"></div>
								</div>-->
								
								
								<div class="fieldpage">
									<div class="fieldpage-title">Sort</div>
									<div class="fieldpage-info">
										<select name="sort" class="input-select">
											<option value="<?php echo $sgal->slider_sort; ?>" selected><?php echo $sgal->slider_sort; ?></option>
											<option value="">-- Choose</option>
											<?php
												for($i=1; $i<=10; $i++) {
													echo "<option value='$i'>$i</option>";
												}
											?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Status</div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">
											<option value="<?php echo $sgal->slider_status; ?>" selected><?php echo $sgal->slider_status; ?></option>
											<option value="">-- Choose</option>
											<option value="Publish">Publish</option>
											<option value="Unpublish">Unpublish</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<input type="submit" name="submit" value="Save" />
							</div>
							</form>
						</div>
						
					</div> <!-- End of cr-bottom -->
<?php endforeach; ?>