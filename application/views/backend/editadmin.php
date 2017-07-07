<?php
	foreach($editadmin as $ge) : 
?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Administrator - <?php echo $ge->admin_fullname; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>pbackend/admin/editadmin_process" name="add-admin" id="add-admin" enctype="multipart/form-data">
							<input type="hidden" name="getid" value="<?php echo $ge->id_admin_record; ?>" />
							<div class="bbox-cont" id="box-cont1">
								
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fullname</div>
									<div class="fieldpage-info">
										<input type="text" name="fullname" class="input-form" value="<?php echo $ge->admin_fullname; ?>"/>
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldpage">
									<div class="fieldpage-title">Email</div>
									<div class="fieldpage-info">
										<input type="text" name="email" class="input-form" value="<?php echo $ge->admin_email; ?>" />
										
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldspage">
									<div class="fieldpage-title">Password</div>
									<div class="fieldpage-info">
										<input type="password" name="password" class="input-form" placeholder='isikan field ini jika ingin mengganti password'/>
										
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Permission</div>
									<div class="fieldpage-info">
										<select name="permission" class="input-select">
											<option value="<?php echo $ge->admin_permission; ?>" selected><?php echo $ge->admin_permission; ?></option>
											<option value="">-- Choose</option>
											<option value="Super Administrator">Super Administrator</option>
											<option value="Administrator">Administrator</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Status</div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">	
											<option value="<?php echo $ge->admin_status; ?>" selected><?php echo $ge->admin_status; ?></option>
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