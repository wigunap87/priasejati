<?php
	foreach($editpage as $edp) :
?>					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Page - <?php echo $edp->page_title; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>pbackend/page/editpage_process" name="add_page" id="add_page" enctype="multipart/form-data">
							<input type="hidden" name="getid" value="<?php echo $edp->id_page_record; ?>" />
							<div class="bbox-cont" id="box-cont1">
								<div class="fieldpage">
									<div class="fieldpage-title">Title</div>
									<div class="fieldpage-info"><input type="text" name="title" maxlength=40 class="input-form" value="<?php echo $edp->page_title; ?>"/></div>
									<div class="clear"></div>
								</div>
								
								
								<div class="fieldspage">
									<div class="fieldpage-title">Description</div>
									<div class="fieldpage-info">
										<textarea name="description" cols=20 rows=5 class="input-form" id="editor1"><?php echo $edp->page_desc; ?></textarea>
										<script>CKEDITOR.replace( 'editor1',{uiColor:'#666',height:'300px'});</script>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Type</div>
									<div class="fieldpage-info">
										<select name="type" class="input-select">
											<option value="<?php echo $edp->page_type; ?>" selected><?php echo $edp->page_type; ?></option>
											<option value="">-- Choose</option>
											<option value="About Us">About Us</option>
											<option value="About Us Text">About Us Text</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Status</div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">
											<option value="<?php echo $edp->page_status; ?>" selected><?php echo $edp->page_status; ?></option>
											<option value="">-- Choose</option>
											<option value="Publish">Publish</option>
											<option value="Unpublish">Unpublish</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<input type="submit" name="submit" value="Update" />
							</div>
							</form>
						</div>
						
					</div> <!-- End of cr-bottom -->
<?php endforeach; ?>