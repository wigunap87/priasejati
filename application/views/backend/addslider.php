					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Add Slider</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>pbackend/slider/addslider_process" name="add-slider" id="add-slider" enctype="multipart/form-data">
							<div class="bbox-cont" id="box-cont1">
								
								<div class="fieldspage">
									<div class="fieldpage-title">Title</div>
									<div class="fieldpage-info">
										<input type="text" name="title" class="input-form" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Images</div>
									<div class="fieldpage-info">
										<input type="file" name="_userfile" class="input-form" />
										<font color="red"><i>Upload size width : 1400px. Upload type : jpg or png. Max Upload 5MB.</i></font>
									</div>
									<div class="clear"></div>
								</div>
								
								<!--<div class="fieldspage">
									<div class="fieldpage-title">Link</div>
									<div class="fieldpage-info">
										<input type="text" name="link" class="input-form" />
									</div>
									<div class="clear"></div>
								</div>-->
								
								<div class="fieldspage">
									<div class="fieldpage-title">Sort</div>
									<div class="fieldpage-info">
										<select name="sort" class="input-select">
											<option value="" selected>-- Choose</option>
											<?php
												for($i=1; $i<=10; $i++) {
													echo "<option value='$i'>$i</option>";
												}
											?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Status</div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">
											<option value="" selected>-- Choose</option>
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
