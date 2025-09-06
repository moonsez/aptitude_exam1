<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Online Test | Exam Result Record</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/css/plugins.css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<?php $this->load->view('admin/header');?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">	
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content page_div">
		<div class="container">			
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="#">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					Exam Result  
				</li>
			</ul>
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="row form">
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil"></i>Exam Result  
							</div>	
							<div class="caption" style="float:right;">
								<a href="<?php echo base_url();?>exam_result" class="btn green" type="button">
								  BACK
								</a>
							</div>						
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-12">
									<div class="note note-info note-shadow">
										<center>
										<p><h4>
											<?php 
												echo "Dear ".$obj_result->fullname;
											?>
											</h4>
										</p>
										</center>
										<br>
										<?php $flag=0; ?>
										<table width="70%" style="margin-left:50px; width:91%; " class="table table-bordered">
											<tr>
												<th style="text-align:center;">Total Questions</th>
												<th style="text-align:center;"> Total Marks </th>
												<th style="text-align:center;"> Negative Marks </th>
												<th style="text-align:center;"> Correct Answer </th>
												<th style="text-align:center;"> Wrong Answer </th>
												<th style="text-align:center;"> Marks Obtained </th>
												<th style="text-align:center;"> Result  </th>
											</tr>
											<tr>
												<td style="text-align:center;"><?php echo $obj_result->question_count; ?></td>
												<td style="text-align:center;"><?php echo $obj_result->total_mark; ?></td>
												<td style="text-align:center;"><?php echo $obj_result->per_mark; ?> </td>
												<td style="text-align:center;"><?php echo $obj_result->correct_count; ?> </td>
												<td style="text-align:center;"><?php echo $obj_result->incorrect_count; ?> </td>

												<td style="text-align:center;"><?php 
													$per_que_mark = $obj_result->total_mark / $obj_result->question_count;
													$wrong_ans_que = $obj_result->incorrect_count * $obj_result->per_mark;
													$mark_obtained = $obj_result->correct_count * $per_que_mark;
													$tot_mark = $mark_obtained - $wrong_ans_que;
													echo $tot_mark; ?></td>
													
												<td style="text-align:center;"> 
					                                <?php 
					                                $totalMarks = $obj_result->total_mark;
					                                $obtainedMarks = $tot_mark;
					                                $percentage = ($obtainedMarks / $totalMarks) * 100;
					                                $percent = round($percentage, 2);
					                                if($percent < 35){ ?> <span class="label label-danger"><strong>FAIL</strong></span> <?php $flag=1;} else { ?> <span class="label label-success"><strong>PASS</strong></span> <?php } ?>
					                            </td>
											</tr>
										</table>
									</div>
									
									<div class="portlet light">
									
										<div class="portlet-body" >
											<?php 
												$hidden_question_array=array();
												if(isset($question_data) && !empty($question_data)){
													$k=0;
													$section_count=count($question_data);
													foreach ($question_data as $key ) {
														$k++;
														$section=$key['section'];
														$question_list=$key['question_list'];
														?>
															<?php if(isset($question_list) && !empty($question_list))
																{	

																	$i=0;
																	foreach ($question_list as $que_key ) {
																		$i++;
																		$question=$que_key['question'];
																		$option=$que_key['option'];
																		$hidden_question_array[]=$question->question_id;
																?>
																
																		<div class="inline-display" >
																			<?php echo $i;?> . <?php echo (isset($question->question) && !empty($question->question))?htmlentities($question->question):'';?>
																		</div>
																		<p>
																			<?php if(isset($question->question_image) && !empty($question->question_image)){?>
																			<img src="<?php echo base_url();?>uploads/test/<?php echo $question->question_image;?>"  style="max-width:400px;" />
																			<?php } ?>
																		</p>
																		<div class="radio-list">
																			<?php 
																			$j=0;
																			if(isset($option) && !empty($option)){
																				foreach ($option as $row) {
																					?>
																					<label style="<?php if($question->option_id==$row->option_id){ echo 'color:green;';}else if($question->user_ans==$row->option_id){ echo 'color:red;';} ?>">
																				[<?php echo !empty($option_name[$j])?$option_name[$j]:'';?>]
																				<?php echo !empty($row->option)?$row->option:'';?>
																				<?php if(isset($row->option_image) && !empty($row->option_image)){?>
																				<img src="<?php echo base_url();?>uploads/test/<?php echo $row->option_image;?>" />
																				<?php } ?>
																				</label>
																			<?php
																				$j++;
																					}
																				}
																				?>
																		</div>

																		<?php if($question->option_id==$question->user_ans){?>
																	
																		<div class="alert alert-success">
																			<strong>Correct! You made correct Selection</strong>.
																		</div>
																		<?php }else if($question->user_ans==null) { ?>

																			<div class="alert alert-warning">
																				 You didn't attempted this question.
																			</div>
																		<?php	}else{ ?>

																			<div class="alert alert-danger">
																				<strong>Incorrect!</strong> You made wrong selection.
																			</div>
																		<?php		} ?>
																<?php		
																	}	
																}
																?>
												<?php }
											}
											?>

											<hr/>
											<?php if(isset($account_status) && !empty($account_status) && $account_status->account_status!='activate'){ ?>
											<div class="row">
												<div class="col-md-6">
													<div class="portlet light" >
														<div class="portlet-title">
															<div class="caption">
																<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
																<span class="caption-subject font-green-sharp bold uppercase">Question World Text:</span>			
															</div>									
														</div>
														<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
															<div class="scroller" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
   																<iframe style="width:100%; height:100%;" src='https://docs.google.com/viewer?url=<?php echo base_url(); ?>NewFiles/<?php echo (isset($word_ans->que_file) && !empty($word_ans->que_file))?$word_ans->que_file:''; ?>&embedded=true' frameborder='0'></iframe>
															</div>								
														</div>								
													</div>
												</div>
												<div class="col-md-6">
													<div class="portlet light" >
														<div class="portlet-title">
															<div class="caption">
																<span class="caption-subject font-green-sharp bold uppercase">Answer World Text:</span>			
															</div>									
														</div>
														<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
															<div class="scroller" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
																<iframe style="width:100%; height:100%;" src='https://docs.google.com/viewer?url=<?php echo base_url(); ?>NewFiles/<?php echo (isset($word_ans->ans_file) && !empty($word_ans->ans_file) )?$word_ans->ans_file:''; ?>&embedded=true' frameborder='0'></iframe>
															</div>								
														</div>								
													</div>
												</div>
											</div>
											<hr/>
											<div class="portlet-body">
												<h3>Word Answer</h3>
												<div class="tabbable-line">
													<ul class="nav nav-tabs ">
														<li class="active">
															<a href="#tab_15_1" data-toggle="tab">
															Manualy </a>
														</li>
														<li>
															<a href="#tab_15_2" data-toggle="tab">
															Automation </a>
														</li>
													</ul>
													<div class="tab-content">														
															<div class="tab-pane active" id="tab_15_1">														
																<form action="<?php echo base_url();?>update_word_result" data-tbdiv="#update_word_result" data-tburl="update_word_result" id="section_form" class="horizontal-form" method="post">
																	<div class="form-body">
																		<div class="row">
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Heading</label>
																					<div class="controls">
																						<input type="text" class="form-control" id="heading" name="heading" value="<?php echo (isset($word_ans->heading) && !empty($word_ans->heading) )?$word_ans->heading:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Reference No. & Date</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="reference_no_date" id="reference_no_date" value="<?php echo (isset($word_ans->reference_no_date) && !empty($word_ans->reference_no_date) )?$word_ans->reference_no_date:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Address of Recipient</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="addr_of_recipient" id="addr_of_recipient" value="<?php echo (isset($word_ans->addr_of_recipient) && !empty($word_ans->addr_of_recipient) )?$word_ans->addr_of_recipient:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Subject & Reference</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="subject_reference" id="subject_reference" value="<?php echo (isset($word_ans->subject_reference) && !empty($word_ans->subject_reference) )?$word_ans->subject_reference:''; ?>">
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Salutation</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="salutation" id="salutation" value="<?php echo (isset($word_ans->salutation) && !empty($word_ans->salutation) )?$word_ans->salutation:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Paragraph</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="paragraph" id="paragraph" value="<?php echo (isset($word_ans->paragraph) && !empty($word_ans->paragraph) )?$word_ans->paragraph:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Sign your Name</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="sign_your_name" id="sign_your_name" value="<?php echo (isset($word_ans->sign_your_name) && !empty($word_ans->sign_your_name) )?$word_ans->sign_your_name:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Enclosure</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="enclosure" id="enclosure" value="<?php echo (isset($word_ans->enclosure) && !empty($word_ans->enclosure))?$word_ans->enclosure:'';?>">
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-12">
																			<br>
																				<center>
																					<button type="submit" class="btn green common_save" rel="<?php echo (isset($user_id) && !empty($user_id))?$user_id:'';?>">Update</button>
																				</center>
																			</div>
																		</div>
																	</div>
																</form>													
															</div>
															<div class="tab-pane" id="tab_15_2">
																<form action="<?php echo base_url();?>update_word_result" data-tbdiv="#update_word_result" data-tburl="update_word_result" id="auto_section_form" class="horizontal-form" method="post">
																	<div class="form-body">  
																		<div class="row">
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Heading</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="auto_heading" id="auto_heading" value="<?php echo (isset($word_ans->auto_heading) && !empty($word_ans->auto_heading) )?$word_ans->auto_heading:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Reference No. & Date</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="auto_reference_no_date" id="auto_reference_no_date" value="<?php echo (isset($word_ans->auto_reference_no_date) && !empty($word_ans->auto_reference_no_date) )?$word_ans->auto_reference_no_date:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Address of Recipient</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="auto_addr_of_recipient" id="auto_addr_of_recipient" value="<?php echo (isset($word_ans->auto_addr_of_recipient) && !empty($word_ans->auto_addr_of_recipient) )?$word_ans->auto_addr_of_recipient:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Subject & Reference</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="auto_subject_reference" id="auto_subject_reference" value="<?php echo (isset($word_ans->auto_subject_reference) && !empty($word_ans->auto_subject_reference) )?$word_ans->auto_subject_reference:''; ?>">
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Salutation</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="auto_salutation" id="auto_salutation" value="<?php echo (isset($word_ans->auto_salutation) && !empty($word_ans->auto_salutation) )?$word_ans->auto_salutation:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Paragraph</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="auto_paragraph" id="auto_paragraph" value="<?php echo (isset($word_ans->auto_paragraph) && !empty($word_ans->auto_paragraph) )?$word_ans->auto_paragraph:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Sign your Name</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="auto_sign_your_name" id="auto_sign_your_name" value="<?php echo (isset($word_ans->auto_sign_your_name) && !empty($word_ans->auto_sign_your_name) )?$word_ans->auto_sign_your_name:''; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="inbox-form-group">
																					<label class="control-label">Enclosure</label>
																					<div class="controls">
																						<input type="text" class="form-control" name="auto_enclosure" id="auto_enclosure" value="<?php echo (isset($word_ans->auto_enclosure) && !empty($word_ans->auto_enclosure))?$word_ans->auto_enclosure:'';?>">
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-12">
																			<br>
																				<center>
																					<button type="submit" class="btn green common_save" rel="<?php echo (isset($user_id) && !empty($user_id))?$user_id:'';?>">Update</button>
																				</center>
																			</div>
																		</div>
																	</div>
																</form>
															</div>														
													</div>
												</div>
											</div>
											<hr/>
											<div class="row">
												<div class="col-md-6">
													<div class="portlet light" >
														<div class="portlet-title">
															<div class="caption">
																<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
																<span class="caption-subject font-green-sharp bold uppercase">QUestion Excel Text:</span>			
															</div>									
														</div>
														<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
															<div class="scroller" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
																<iframe style="width:100%; height:100%;" src='https://docs.google.com/viewer?url=<?php echo base_url(); ?>NewFiles/<?php echo (isset($excel_ans->que_file) && !empty($excel_ans->que_file) )?$excel_ans->que_file:''; ?>&embedded=true' frameborder='0'></iframe>
															</div>								
														</div>								
													</div>
												</div>
												<div class="col-md-6">
													<div class="portlet light" >
														<div class="portlet-title">
															<div class="caption">
																<span class="caption-subject font-green-sharp bold uppercase">Answer Excel Text:</span>			
															</div>									
														</div>
														<div class="portlet-body portlet-section" style="min-height:370px;" id="portlet-section">
															<div class="scroller" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
																<iframe style="width:100%; height:100%;" src='https://docs.google.com/viewer?url=<?php echo base_url(); ?>NewFiles/<?php echo (isset($excel_ans->ans_file) && !empty($excel_ans->ans_file) )?$excel_ans->ans_file:''; ?>&embedded=true' frameborder='0'></iframe>
															</div>								
														</div>								
													</div>
												</div>
											</div>
											<span class="caption-subject font-green-sharp bold uppercase">
												<h3>Excel Answer</h3>
											</span>
											<hr/>
											<div class="row">
												<div class="col-md-3">
													<div class="inbox-form-group">
														<label class="control-label">Total Marks</label>
														<div class="controls">
															<input type="text" class="form-control" id="marks" value="<?php echo (isset($excel_ans->marks) && !empty($excel_ans->marks))?$excel_ans->marks:''; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
												<br>
													<center>
														<input type="button" class="btn default update_excel_result" value="Update" rel="<?php echo (isset($user_id) && !empty($user_id))?$user_id:'';?>" >
													</center>
												</div>
											</div>
											<?php } ?>
										</div>										
									</div>	
								</div>	
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
			
		</div>		
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- END PAGE CONTAINER -->
<?php $this->load->view('admin/footer');?>

<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url();?>js/plugins.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>js/common.js"></script>
<script src="<?php echo base_url();?>js/custom_g.js"></script>


<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   //PluginPickers.init();
   TableAdvanced.init();
   Demo.init(); // init demo(theme settings page)
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>