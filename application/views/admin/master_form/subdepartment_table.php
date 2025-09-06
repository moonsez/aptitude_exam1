<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i> Sub Department List
				</div>							
			</div>
			<div class="portlet-body">
				<?php if(isset($subsectionData) && !empty($subsectionData))
				{?>
					<table class="table table-striped table-bordered table-hover masterTable">
						<thead>
							<tr>
								<th style="text-align:center;">
									Sr. No.
								</th>
								<th style="text-align:center;">
									Section Name
								</th>
								
								<th style="text-align:center;">
									Sub Section
								</th>
								<th style="text-align:center;">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							//print_r($subsectionData);

							foreach ($subsectionData as $key) 
							{?>
								<tr class="odd gradeX">
									<td style="text-align:center;">
										<?php echo $i++;?>
									</td>
									<td style="text-align:center;">
										<?php echo (isset($key->section_name) && !empty($key->section_name))?$key->section_name:'';?>
									</td>
									<td style="text-align:center;"> 
										<?php echo (isset($key->sub_section_name) && !empty($key->sub_section_name))?$key->sub_section_name:'';?>
									</td style="text-align:center;">
									<td style="text-align:center;">									
										<span style="cursor: pointer;" class="tooltips editRecord" rev="edit_sub_section" rel="<?php echo (isset($key->sub_section_id) && !empty($key->sub_section_id))?$key->sub_section_id:'';?>" data-original-title="Edit" data-placement="top">
											<i class="fa fa-edit"></i>
										</span>										
										<span style="cursor: pointer;" class="tooltips deletesubRecord" data-tbdiv="#sectionDetailsDiv" data-tburl="fetch_subsection" rev="delete_sub_section" rel="<?php echo (isset($key->sub_section_id) && !empty($key->sub_section_id))?$key->sub_section_id:'';?>" data-original-title="Delete" data-placement="top">
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