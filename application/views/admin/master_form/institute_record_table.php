<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Institute Record List
				</div>							
			</div>
			<div class="portlet-body">
				<?php if(isset($instituteRecord) && !empty($instituteRecord))
				{?>
					<table class="table table-striped table-bordered table-hover masterTable">
						<thead>
							<tr>
								<th style="text-align:center;">
									Sr. No.
								</th>
								<th style="text-align:center;">
									Center Code
								</th>
								<th style="text-align:center;">
									Center Name
								</th>
								<th style="text-align:center;">
									Email
								</th>
								<th style="text-align:center;">
									Mobile
								</th>
								<th style="text-align:center;">
									Distruct
								</th>
								<th style="text-align:center;">
									Taluka
								</th>
								<th style="text-align:center;">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							foreach ($instituteRecord as $key) 
							{?>
								<tr class="odd gradeX">
									<td style="text-align:center;">
										<?php echo $i++;?>
									</td>
									<td style="text-align:center;">
										<?php echo (isset($key->center_code) && !empty($key->center_code))?$key->center_code:'';?>
									</td>
									<td style="text-align:center;"> 
										<?php echo (isset($key->center_name) && !empty($key->center_name))?$key->center_name:'';?>
									</td style="text-align:center;">
									<td style="text-align:center;"> 
										<?php echo (isset($key->email) && !empty($key->email))?$key->email:'';?>
									</td style="text-align:center;">
									<td style="text-align:center;"> 
										<?php echo (isset($key->mobile) && !empty($key->mobile))?$key->mobile:'';?>
									</td style="text-align:center;">
									<td style="text-align:center;"> 
										<?php echo (isset($key->district) && !empty($key->district))?$key->district:'';?>
									</td style="text-align:center;">
									<td style="text-align:center;"> 
										<?php echo (isset($key->taluka) && !empty($key->taluka))?$key->taluka:'';?>
									</td style="text-align:center;">
									
									<td style="text-align:center;">									
										<span style="cursor: pointer;" class="tooltips editRecord" rev="edit_institute_record" rel="<?php echo (isset($key->institute_id) && !empty($key->institute_id))?$key->institute_id:'';?>" data-original-title="Edit" data-placement="top">
											<i class="fa fa-edit"></i>
										</span>										
										<span style="cursor: pointer;" class="tooltips deleteRecord" data-tbdiv="#instituteRecordsDiv" data-tburl="fetch_institute_record" rev="delete_institute_record" rel="<?php echo (isset($key->institute_id) && !empty($key->institute_id))?$key->institute_id:'';?>" data-original-title="Delete" data-placement="top">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
								</tr>
							<?php }?>												
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