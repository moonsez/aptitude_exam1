<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Passage List
				</div>							
			</div>
			<div class="portlet-body">
				<?php if(isset($passageData) && !empty($passageData))
				{?>
					<table class="table table-striped table-bordered table-hover masterTable">
						<thead>
							<tr>
								<th style="text-align:center;">
									Sr. No.
								</th>
								<th style="text-align:center;">
									Language Name
								</th>
								<th style="text-align:center;">
									Description
								</th>
								<th style="text-align:center;">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							foreach ($passageData as $key) 
							{?>
								<tr class="odd gradeX">
									<td style="text-align:center;">
										<?php echo $i++;?>
									</td>
									<td >
										<?php echo (isset($key->language) && !empty($key->language) && $key->language== 1 )?'Marathi':'English';?>
									</td>
									<td  class="<?php echo (isset($key->language) && !empty($key->language) && $key->language=='1' )?'marathi':'';?>">
										<?php echo (isset($key->passage) && !empty($key->passage))?$key->passage:'';?>
									</td>
									<td style="text-align:center;">									
										<span style="cursor: pointer;" class="tooltips editRecord" rev="edit_passage" rel="<?php echo (isset($key->passage_id) && !empty($key->passage_id))?$key->passage_id:'';?>" data-original-title="Edit" data-placement="top">
											<i class="fa fa-edit"></i>
										</span>										
										<span style="cursor: pointer;" class="tooltips deleteRecord" data-tbdiv="#passageDetailsDiv" data-tburl="fetch_passage" rev="delete_passage" rel="<?php echo (isset($key->passage_id) && !empty($key->passage_id))?$key->passage_id:'';?>" data-original-title="Delete" data-placement="top">
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