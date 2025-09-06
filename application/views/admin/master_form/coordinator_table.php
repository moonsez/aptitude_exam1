<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Coordinator Record List
				</div>							
			</div>
			<div class="portlet-body">
				<?php if(isset($coordinatorRecord) && !empty($coordinatorRecord))
				{?>
					<table class="table table-striped table-bordered table-hover masterTable">
						<thead>
							<tr>
								<th style="text-align:center;">
									Sr. No.
								</th>
								<th style="text-align:center;">
									Coordinator Name
								</th>
								<th style="text-align:center;">
									Email Id
								</th>
								<th style="text-align:center;">
									Mobile No.
								</th>
								<!-- <th style="text-align:center;">
									Institute Name
								</th> -->
									<!-- <th style="text-align:center;">
									Exam Center
								</th> -->
									<th style="text-align:center;">
									Taluka
								</th>
									<th style="text-align:center;">
									Distruct
								</th>
								<th style="text-align:center;">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							foreach ($coordinatorRecord as $key) 
							{?>
								<tr class="odd gradeX">
									<td style="text-align:center;">
										<?php echo $i++;?>
									</td>
									<td style="text-align:center;">
										<?php echo (isset($key->user_name) && !empty($key->user_name))?$key->user_name:'';?>
									</td>
									<td style="text-align:center;"> 
										<?php echo (isset($key->email) && !empty($key->email))?$key->email:'';?>
									</td>
									<td style="text-align:center;"> 
										<?php echo (isset($key->mobile_no) && !empty($key->mobile_no))?$key->mobile_no:'';?>
									</td>
									<!-- <td style="text-align:center;"> 
										<?php echo (isset($key->organisation) && !empty($key->organisation))?$key->organisation:'';?>
									</td> -->
									<!-- <td style="text-align:center;"> 
										<?php echo (isset($key->exam_center) && !empty($key->exam_center))?$key->exam_center:'';?>
									</td> -->
									<td style="text-align:center;"> 
										<?php echo (isset($key->taluka) && !empty($key->taluka))?$key->taluka:'';?>
									</td>
									<td style="text-align:center;"> 
										<?php echo (isset($key->district) && !empty($key->district))?$key->district:'';?>
									</td>
									<td style="text-align:center;">									
										<span style="cursor: pointer;" class="tooltips editRecord" rev="edit_coordinator" rel="<?php echo (isset($key->user_id) && !empty($key->user_id))?$key->user_id:'';?>" data-original-title="Edit" data-placement="top">
											<i class="fa fa-edit"></i>
										</span>										
										<span style="cursor: pointer;" class="tooltips deleteRecord" data-tbdiv="#coordinatorRecordsDiv" data-tburl="fetch_coordinator" rev="delete_coordinator" rel="<?php echo (isset($key->user_id) && !empty($key->user_id))?$key->user_id:'';?>" data-original-title="Delete" data-placement="top">
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