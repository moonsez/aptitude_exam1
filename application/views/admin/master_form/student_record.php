<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Online Test | Student Record</title>
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
				<!-- <li>
					<a href="passport_form.html">Passport Form</a>
					<i class="fa fa-circle"></i>
				</li> -->
				<li class="active">
					Student Record Form
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">	
					<div class="row form">
					    <div class="col-md-12">
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Student Record Form
									</div>							
								</div>
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<form action="save_student_record" data-tbdiv="#studentRecordsDiv" data-tburl="fetch_student_record" id="section_form" class="horizontal-form" method="post">
										<div class="form-body">
											<!--/row-->
											<div class="row">
												<div class="col-md-4 ">
			                                        <div class="form-group">
			                                            <label class="control-label">Student Name<span class="required" aria-required="true">*</span></label>
			                                            <input type="text" class="form-control" placeholder=" Student Name" name="student_name" value="<?php echo (isset($single_student_record->user_name) && !empty($single_student_record->user_name))?$single_student_record->user_name:'';?>" tabindex="">
			                                        </div>
			                                   	</div>												
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Email Id </label>
														<input type="text" class="form-control" placeholder="Student Email Id"  name="student_email" value="<?php echo (isset($single_student_record->email) && !empty($single_student_record->email))?$single_student_record->email:'';?>" tabindex="">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Mobile No. </label>
														<input type="text" class="form-control" placeholder="Student Mobile"  name="student_mobile" value="<?php echo (isset($single_student_record->mobile_no) && !empty($single_student_record->mobile_no))?$single_student_record->mobile_no:'';?>" tabindex="">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Address </label>
														<input type="text" class="form-control" placeholder="District"  name="distruct" value="<?php echo (isset($single_student_record->district) && !empty($single_student_record->district))?$single_student_record->district:'';?>" tabindex="">
													</div>
												</div>
												<!--<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Taluka </label>
														<input type="text" class="form-control" placeholder="Taluka"  name="taluka" value="<?php echo (isset($single_student_record->taluka) && !empty($single_student_record->taluka))?$single_student_record->taluka:'';?>" tabindex="">
													</div>
												</div>!-->
												 	<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" > Department <span class="required" aria-required="true">*</span></label>
														<select class="form-control select2me " tabindex="1" name="section_id">
															<option value="">Select</option>
															<?php foreach ($sectionData as $key) 
															{ ?>
																<option value="<?php echo $key->section_id; ?>" <?php echo (isset($single_student_record->section_id) && !empty($single_student_record->section_id) && ($single_student_record->section_id==$key->section_id))?'selected="selected"':''; ?> > <?php echo $key->section_name; ?> </option>
															<?php } ?>
														</select>
													</div>
												   </div>
												   <div class="col-md-4">
													<div class="form-group">
														<label class="control-label" > Sub Department <span class="required" aria-required="true">*</span></label>
														<select class="form-control select2me " tabindex="1" name="sub_section">
															<option value="">Select</option>
															<?php foreach ($subsectionData as $key) 
															{ ?>
																<option value="<?php echo $key->sub_section_id; ?>" <?php echo (isset($single_student_record->sub_section_id) && !empty($single_student_record->sub_section_id) && ($single_student_record->sub_section_id==$key->sub_section_id))?'selected="selected"':''; ?> > <?php echo $key->sub_section_name; ?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
												<!--<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" > Test Configuration <span class="required" aria-required="true">*</span></label>
														<select class="form-control select2me " tabindex="1" name="sub_section">
															<option value="">Select</option>
															<?php foreach ($testName as $key) 
															{ ?>
																<option value="<?php echo $key->section_id; ?>" <?php echo (isset($single_question->section_id) && !empty($single_question->section_id) && ($single_question->sub_section_id==$key->sub_section_id))?'selected="selected"':''; ?> > <?php echo $key->section_name; ?> </option>
															<?php } ?>	
														</select>
													</div>
												</div>!-->

												

											</div>	
											<div class="row">
												<!--<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" > Institute Name <span class="required" aria-r	equired="true">*</span></label>
														<select class="form-control select2me " tabindex="1" name="institute">
															<option value="">Select</option>
															<?php if(isset($centerRecord) && !empty($centerRecord))
															{
																foreach ($centerRecord as $key) 
																{ ?>
																	<option value="<?php echo $key->institute_id; ?>" <?php echo (isset($single_student_record->organisation) && !empty($single_student_record->organisation) && ($single_student_record->organisation==$key->institute_id))?'selected="selected"':''; ?> > <?php echo $key->center_name; ?> </option>
																<?php }
															} ?>
														</select>
													</div>

												</div>!-->
												<div class="col-md-6 ">
			                                        <div class="form-group ">
														<label class="control-label" >Institude Name<span class="required" aria-required="true">*</span></label>
			                                        	<div>
															<textarea class=" form-control" name="institute" rows="6" data-error-container="#editor2_error"><?php echo (isset($single_student_record->organisation) && !empty($single_student_record->organisation))?$single_student_record->organisation:'';?></textarea>
															
															<div id="editor2_error">
															</div>

														</div>
													</div>
			                                   	</div>



												<!--<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Exam Center </label>
														<select class="form-control select2me " tabindex="1" name="exam_center">
															<option value="">Select</option>
															<?php if(isset($centerRecord) && !empty($centerRecord))
															{
																foreach ($centerRecord as $key) 
																{ ?>
																	<option value="<?php echo $key->institute_id; ?>" <?php echo (isset($single_student_record->exam_center) && !empty($single_student_record->exam_center) && ($single_student_record->exam_center==$key->institute_id))?'selected="selected"':''; ?> > <?php echo $key->center_name; ?> </option>
																<?php }
															} ?>
														</select>
													</div>
												</div>!-->												
											</div>	
																						
										</div>
										<div class="form-actions">
											<center>
												<button type="submit" class="btn green common_save" rel="<?php echo (isset($single_student_record->user_id) && !empty($single_student_record->user_id))?$single_student_record->user_id:''?>">
													<?php if(isset($single_student_record->user_id) && !empty($single_student_record->user_id))
													{
														echo 'Update';
													}
													else
													{
														echo 'Submit';
													}?>
												</button>
												<button type="button" class="btn red clearData">Clear</button>
											</center>
										</div>										
									</form>
									<!-- END FORM-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div id="studentRecordsDiv">
				
				<?php $this->load->view('admin/master_form/student_record_table');?>	
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