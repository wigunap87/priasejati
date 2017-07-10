<?php foreach($show_getsetting as $em) : ?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Setting Website</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>pbackend/setting/process" name="add-catservices" id="add-catservices" enctype="multipart/form-data">
							<div class="bbox-cont" id="box-cont1">
								
								<input type="hidden" name="getid" value="<?php echo $em->id_setting_record; ?>" />
								
								<div class="fieldpage">
									<div class="fieldpage-title">Title</div>
									<div class="fieldpage-info">
										<input type="text" name="title" class="input-form" value="<?php echo $em->setting_title; ?>"/>
										
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Address</div>
									<div class="fieldpage-info">
										<textarea name="address" rows="5" class="input-form"><?php echo $em->setting_address; ?></textarea>
										
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Phone</div>
									<div class="fieldpage-info">
										<input type="text" name="phone" class="input-form" value="<?php echo $em->setting_phone; ?>"/>
										
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fax</div>
									<div class="fieldpage-info">
										<input type="text" name="fax" class="input-form" value="<?php echo $em->setting_fax; ?>"/>
										
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Email</div>
									<div class="fieldpage-info">
										<input type="text" name="email" class="input-form" value="<?php echo $em->setting_email; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Facebook</div>
									<div class="fieldpage-info">
										<input type="text" name="facebook" class="input-form" value="<?php echo $em->setting_facebook; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Twitter</div>
									<div class="fieldpage-info">
										<input type="text" name="twitter" class="input-form" value="<?php echo $em->setting_twitter; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Instagram</div>
									<div class="fieldpage-info">
										<input type="text" name="instagram" class="input-form" value="<?php echo $em->setting_instagram; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Maps</div>
									<div class="fieldpage-info">
										<input type="text" name="maps" class="input-form" value="<?php echo $em->setting_map; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Metakey</div>
									<div class="fieldpage-info">
										<input type="text" name="metakey" class="input-form" value="<?php echo $em->setting_metakey; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Metadesc</div>
									<div class="fieldpage-info">
										<textarea name="metadesc" rows="5" class="input-form"><?php echo $em->setting_metadesc; ?></textarea>
										
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