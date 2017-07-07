<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Partner</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>pbackend/partner/addpartner"><img src="<?php echo base_url(); ?>assets/backend/images/add.png" /></a></div>
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1">
								<div class="searchkey">
								<form method="post" action="<?php echo base_url(); ?>pbackend/partner/searchpartner" autocomplete="off">
									<input type="text" name="searchkey" placeholder="Title" class="input-select"/>
									<input type="submit" name="submit" value="Search" />
								</form>
								</div>
								<table cellpadding="0" cellspacing="0" >
									<tr>
										<th>No</th>
										<th>Title</th>
										<th>Images</th>
										<th>Url</th>
										<th>Create Date</th>
										<th>Active</th>
										<th class="lastTH">Actions</th>
									</tr>
									<?php 
										foreach($showpartner as $wv) :
											
									?>
									<?php if($no % 2 == 0) { ?>
										<tr style="background-color:#ffffff;">
									<?php } else { ?>
										<tr style="background-color:#fafafa;">
									<?php } ?>
										<td valign=top align=center><?php echo $no; ?></td>
										<td valign=top>
											<?php echo $wv->partner_title; ?>
										</td>
										<td valign=top align=center>
											<img src="<?php echo base_url(); ?>timthumb.php?src=<?php echo base_url(); ?>media/partner/<?php echo $wv->partner_images; ?>&w=100" />
										</td>
										<td valign=top align=left>
											<?php echo $wv->partner_url; ?>
										</td>
										<td valign=top align=center>
											<?php echo $wv->partner_createdate; ?>
										</td>
										<td valign=top align=center>
											<a href="<?php echo base_url(); ?>pbackend/partner/updatepartner/<?php echo $wv->id_partner_record; ?>">
												<?php echo $wv->partner_status; ?>
											</a>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>pbackend/partner/editpartner/<?php echo $wv->id_partner_record; ?>"><img src="<?php echo base_url(); ?>assets/backend/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
											<a href="<?php echo base_url(); ?>pbackend/partner/deletepartner/<?php echo $wv->id_partner_record; ?>" onClick="return confirm('Are you sure want to delete <?php echo $wv->partner_title; ?>?');"><img src="<?php echo base_url(); ?>assets/backend/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
										</td>
									</tr>
									<?php $no++; endforeach; ?>
									
								</table>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination"><?php echo $paginator; ?></div>
								<div class="bb-button">
									<a href="<?php echo base_url(); ?>pbackend/partner/addpartner"><input type="button" name="show-all" value="Add Partner" /></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->
