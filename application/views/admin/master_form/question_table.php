<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Question List
				</div>							
			</div>
			<div class="portlet-body">
				<?php if(isset($questionData) && !empty($questionData))
				{?>
					<table class="table table-striped table-bordered table-hover masterTable">
						<thead>
							<tr>
								<th style="text-align:center;">
									Sr. No.
								</th>
								<!-- <th style="text-align:center;">
									Department Name
								</th>
								<th style="text-align:center;">
									Location
								</th> -->
								<th style="text-align:center;">
									Test Name
								</th>
								<th style="text-align:center;">
									Question Name
								</th>
								<th style="text-align:center;">
									Question Answer
								</th>
								<th style="text-align:center;">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							foreach ($questionData as $key) 
							{?>
								<tr class="odd gradeX">
									<td style="text-align:center;">
										<?php echo $i++;?>
									</td>
									<?php /*<td >
										<?php echo (isset($key->dept_master_name) && !empty($key->dept_master_name))?$key->dept_master_name:'All';?>
									</td>
									<td >
										<?php echo (isset($key->station_type_name) && !empty($key->station_type_name))?$key->station_type_name:'';?>
									</td>*/?>
									<td>
										<?php echo (isset($key->test_name) && !empty($key->test_name))?htmlentities($key->test_name):'';?>
									</td>
									<td >
										<?php echo (isset($key->question) && !empty($key->question))?htmlentities($key->question):'';?>
									</td>
									<td >
										<?php echo (isset($key->option) && !empty($key->option))?$key->option:'';?>
									</td>
									<td style="text-align:center;">									
										<span style="cursor: pointer;" class="tooltips editQueRecord" rev="edit_question" rel="<?php echo (isset($key->question_id) && !empty($key->question_id))?$key->question_id:'';?>" data-original-title="Edit" data-placement="top">
											<i class="fa fa-edit"></i>
										</span>										
										<span style="cursor: pointer;" class="tooltips deleteRecord" data-tbdiv="#questionDetailsDiv" data-tburl="fetch_question" rev="delete_question" rel="<?php echo (isset($key->question_id) && !empty($key->question_id))?$key->question_id:'';?>" data-original-title="Delete" data-placement="top">
											<i class="fa fa-trash"></i>
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