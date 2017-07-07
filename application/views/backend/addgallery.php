					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Add Gallery</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>pbackend/gallery/addgallery_process" name="add-gallery" id="add-gallery" enctype="multipart/form-data">
							<div class="bbox-cont" id="box-cont1">
								<div class="fieldpage">
									<div class="fieldpage-title">Category</div>
									<div class="fieldpage-info">
										<select name="category_id" class="input-select">
											<option value="" selected>-- Choose</option>
											<?php foreach($getcategory as $gcat) :
												echo '<option value="'.$gcat->id_catgallery_record.'">'.$gcat->catgallery_title.'</option>';
												endforeach;
											?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
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
										<font color="red"><i>Upload width size : 1400px. Allowed type : PNG | JPG. Max upload : 2MB</i></font>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Description</div>
									<div class="fieldpage-info">
										<textarea name="desc" cols=20 rows=5 class="input-form" id="editor1"></textarea>
										
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
