					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Add Administrator</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							
							<form method="post" action="<?php echo base_url(); ?>pbackend/admin/addadmin_process" name="add-admin" id="add-admin" enctype="multipart/form-data">
							<div class="bbox-cont" id="box-cont1">
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fullname</div>
									<div class="fieldpage-info">
										<input type="text" name="fullname" class="input-form" />
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldpage">
									<div class="fieldpage-title">Email</div>
									<div class="fieldpage-info">
										<input type="text" name="email" class="input-form" />
										
									</div>
									<div class="clear"></div>
								</div>
								<div class="fieldspage">
									<div class="fieldpage-title">Password</div>
									<div class="fieldpage-info">
										<input type="password" name="password" class="input-form" />
										
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Permission</div>
									<div class="fieldpage-info">
										<select name="permission" class="input-select">
											<option value="" selected>-- Choose</option>
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
