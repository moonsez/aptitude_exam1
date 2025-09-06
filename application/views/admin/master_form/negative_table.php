<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Negative Mark Master
				</div>							
			</div>
			<div class="portlet-body">
				<?php if(isset($negativeData) && !empty($negativeData))
				{?>
					<table class="table table-striped table-bordered table-hover masterTable">
						<thead>
							<tr>
								<th style="text-align:center;">
									Sr. No.
								</th>
								<!-- <th style="text-align:center;">
									Question 
								</th> -->
                                <th style="text-align:center;">
									Question Mark
								</th>
								<th style="text-align:center;">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							foreach ($negativeData as $key) 
							{?>
								<tr class="odd gradeX">
									<td style="text-align:center;">
										<?php echo $i++;?>
									</td>
									<?php /*<td >
										<?php echo (isset($key->question_name) && !empty($key->question_name))?$key->question_name:'';?>
									</td>*/?>
                                    <td><?php echo (isset($key->per_mark)?$key->per_mark:'');?></td>
									<td style="text-align:center;">									
										<span style="cursor: pointer;" class="tooltips editRecord" rev="edit_negative" rel="<?php echo (isset($key->negative_id) && !empty($key->negative_id))?$key->negative_id:'';?>" data-original-title="Edit" data-placement="top">
											<i class="fa fa-edit"></i>
										</span>										
										<span style="cursor: pointer;" class="tooltips deleteRecord" data-tbdiv="#referenceDetailsDiv" data-tburl="fetch_negative" rev="delete_negative_master" rel="<?php echo (isset($key->negative_id) && !empty($key->negative_id))?$key->negative_id:'';?>" data-original-title="Delete" data-placement="top">
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