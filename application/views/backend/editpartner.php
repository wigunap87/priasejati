<?php foreach($show_partner as $sc) : ?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Partner</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>pbackend/partner/editpartner_process" name="add-partner" id="add-partner" enctype="multipart/form-data">
							<div class="bbox-cont" id="box-cont1">
								<input type="hidden" name="getid" value="<?php echo $sc->id_partner_record; ?>" />
								<div class="fieldspage">
									<div class="fieldpage-title">Title</div>
									<div class="fieldpage-info">
										<input type="text" name="title" class="input-form" value="<?php echo $sc->partner_title; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Images</div>
									<div class="fieldpage-info">
										<img src="<?php echo base_url(); ?>media/partner/<?php echo $sc->partner_images; ?>" width="200px" /><br/>
										<input type="file" name="_userfile" class="input-form" />
										<font color="red"><i>Upload with size : 200x200px. Allowed type : PNG | JPG. Max upload : 2MB</i></font>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Url</div>
									<div class="fieldpage-info">
										<input type="text" name="url" class="input-form" value="<?php echo $sc->partner_url; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Status</div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">
											<option value="<?php echo $sc->partner_status; ?>" selected><?php echo $sc->partner_status; ?></option>
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