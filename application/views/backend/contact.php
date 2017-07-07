<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Contact</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1">
								
								<table cellpadding="0" cellspacing="0" >
									<tr>
										<th>No</th>
										<th>Fullname</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Subject</th>
										<th>Message</th>
										<th>Create Date</th>
										<th>Status</th>
										<th class="lastTH">Actions</th>
									</tr>
									<?php 
										foreach($showcontact as $wv) :
											
									?>
									<?php if($no % 2 == 0) { ?>
										<tr style="background-color:#ffffff;">
									<?php } else { ?>
										<tr style="background-color:#fafafa;">
									<?php } ?>
										<td valign=top align=center><?php echo $no; ?></td>
										<td valign=top>
											<?php echo $wv->contact_fullname; ?>
										</td>
										<td valign=top>
											<?php echo $wv->contact_phone; ?>
										</td>
										<td valign=top>
											<?php echo $wv->contact_email; ?>
										</td>
										<td valign=top>
											<?php echo $wv->contact_subject; ?>
										</td>
										<td valign=top>
											<?php echo html_entity_decode($wv->contact_message); ?>
										</td>
										<td valign=top align=center>
											<?php echo $wv->contact_createdate; ?>
										</td>
										<td valign=top align=center>
											<a href="<?php echo base_url(); ?>pbackend/contact/updatecontact/<?php echo $wv->id_contact_record; ?>">
												<?php echo $wv->contact_status; ?>
											</a>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>pbackend/contact/deletecontact/<?php echo $wv->id_contact_record; ?>" onClick="return confirm('Are you sure want to delete?');"><img src="<?php echo base_url(); ?>assets/backend/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
										</td>
									</tr>
									<?php $no++; endforeach; ?>
									
								</table>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination"><?php echo $paginator; ?></div>
								<div class="bb-button">
									&nbsp;
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->
