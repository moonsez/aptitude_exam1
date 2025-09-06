<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Email List
				</div>							
			</div>
			<div class="portlet-body">
				<?php if(isset($emailData) && !empty($emailData))
				{?>
					<table class="table table-striped table-bordered table-hover masterTable">
						<thead>
							<tr>
								<th style="text-align:center;">
									Sr. No.
								</th>
								<th style="text-align:center;">
									Language
								</th>
								<th style="text-align:center;">
									To
								</th>
								<th style="text-align:center;">
									Subject
								</th>
								<th style="text-align:center;">
									Message
								</th>
								<th style="text-align:center;">
									Attachment
								</th>
								<th style="text-align:center;">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							foreach ($emailData as $key) 
							{?>
								<tr class="odd gradeX">
									<td style="text-align:center;">
										<?php echo $i++;?>
									</td>
									<td >
										<?php if(isset($key->language) && !empty($key->language) && $key->language=='1'){
											echo 'Marathi';}else{
												echo 'English'; }?>
									</td>
									<td >
										<?php echo (isset($key->to) && !empty($key->to))?$key->to:'';?>
									</td>
									<td class="<?php echo (isset($key->language) && !empty($key->language) && $key->language=='1' )?'marathi':'';?>">
										<?php echo (isset($key->subject) && !empty($key->subject))?$key->subject:'';?>
									</td>
									<td class="<?php echo (isset($key->language) && !empty($key->language) && $key->language=='1' )?'marathi':'';?>">
										<?php echo (isset($key->message) && !empty($key->message))?$key->message:'';?>
									</td>
									<td >
										<?php echo (isset($key->attachment_file) && !empty($key->attachment_file))?$key->attachment_file:'';?>
									</td>
									<td style="text-align:center;">									
										<span style="cursor: pointer;" class="tooltips editRecord" rev="edit_email" rel="<?php echo (isset($key->email_id) && !empty($key->email_id))?$key->email_id:'';?>" data-original-title="Edit" data-placement="top">
											<i class="fa fa-edit"></i>
										</span>										
										<span style="cursor: pointer;" class="tooltips deleteRecord" data-tbdiv="#questionDetailsDiv" data-tburl="fetch_email" rev="delete_email" rel="<?php echo (isset($key->email_id) && !empty($key->email_id))?$key->email_id:'';?>" data-original-title="Delete" data-placement="top">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
								</tr>
							<?php } ?>												
						</tbody>
					</table>
				<?php }
				else {?>
					<center><h4>No Records Found</h4></center>
				<?php }?>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>