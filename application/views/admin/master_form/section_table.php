<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Department List
				</div>							
			</div>
			<div class="portlet-body">
				<?php if(isset($sectionData) && !empty($sectionData))
				{?>
					<table class="table table-striped table-bordered table-hover masterTable">
						<thead>
							<tr>
								<th style="text-align:center;">
									Sr. No.
								</th>
								<th style="text-align:center;">
									Department Name
								</th>
								<th style="text-align:center;">
									Department Description
								</th>
								<th style="text-align:center;">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							foreach ($sectionData as $key) 
							{?>
								<tr class="odd gradeX">
									<td style="text-align:center;">
										<?php echo $i++;?>
									</td>
									<td style="text-align:center;">
										<?php echo (isset($key->section_name) && !empty($key->section_name))?$key->section_name:'';?>
									</td>
									<td style="text-align:center;"> 
										<?php echo (isset($key->section_desc) && !empty($key->section_desc))?$key->section_desc:'';?>
									</td style="text-align:center;">
									<td style="text-align:center;">									
										<span style="cursor: pointer;" class="tooltips editRecord" rev="edit_section" rel="<?php echo (isset($key->section_id) && !empty($key->section_id))?$key->section_id:'';?>" data-original-title="Edit" data-placement="top">
											<i class="fa fa-edit"></i>
										</span>										
										<span style="cursor: pointer;" class="tooltips deleteRecord" data-tbdiv="#sectionDetailsDiv" data-tburl="fetch_section" rev="delete_section" rel="<?php echo (isset($key->section_id) && !empty($key->section_id))?$key->section_id:'';?>" data-original-title="Delete" data-placement="top">
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