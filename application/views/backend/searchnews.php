<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">News</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>pbackend/news/addnews"><img src="<?php echo base_url(); ?>assets/backend/images/add.png" /></a></div>
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1">
								<div class="searchkey">
								<form method="post" action="<?php echo base_url(); ?>pbackend/news/searchnews" autocomplete="off">
									<input type="text" name="searchkey" placeholder="Title" class="input-select"/>
									<input type="submit" name="submit" value="Search" />
								</form>
								</div>
								<table cellpadding="0" cellspacing="0" >
									<tr>
										<th>No</th>
										<th>Title</th>
										<th>Images</th>
										<th>Desc</th>
										<th>Create Date</th>
										<th>Active</th>
										<th class="lastTH">Actions</th>
									</tr>
									<?php 
										foreach($shownews as $wv) :
											
									?>
									<?php if($no % 2 == 0) { ?>
										<tr style="background-color:#ffffff;">
									<?php } else { ?>
										<tr style="background-color:#fafafa;">
									<?php } ?>
										<td valign=top align=center><?php echo $no; ?></td>
										
										<td valign=top>
											<?php echo $wv->news_title; ?>
										</td>
										<td valign=top align=center>
											<img src="<?php echo base_url(); ?>media/news/<?php echo $wv->news_images; ?>" width="100px"/>
										</td>
										<td valign=top align=center>
											<i>View on edit area</i>
										</td>
										<td valign=top align=center>
											<?php echo $wv->news_createdate; ?>
										</td>
										<td valign=top align=center>
											<a href="<?php echo base_url(); ?>pbackend/news/updatenews/<?php echo $wv->id_news_record; ?>">
												<?php echo $wv->news_status; ?>
											</a>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>pbackend/news/editnews/<?php echo $wv->id_news_record; ?>"><img src="<?php echo base_url(); ?>assets/backend/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
											<a href="<?php echo base_url(); ?>pbackend/news/deletenews/<?php echo $wv->id_news_record; ?>" onClick="return confirm('Are you sure want to delete <?php echo $wv->news_title; ?>?');"><img src="<?php echo base_url(); ?>assets/backend/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
										</td>
									</tr>
									<?php $no++; endforeach; ?>
									
								</table>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination">&nbsp;</div>
								<div class="bb-button">
									<a href="<?php echo base_url(); ?>pbackend/news/addnews"><input type="button" name="show-all" value="Add news" /></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->
