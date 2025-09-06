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
										<i class="fa fa-gift"></i>Institute Record Form
									</div>							
								</div>
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<form action="save_institute_record" data-tbdiv="#instituteRecordsDiv" data-tburl="fetch_institute_record" id="section_form" class="horizontal-form" method="post">
										<div class="form-body">
											<!--/row-->
											<div class="row">
												<div class="col-md-6 ">
			                                        <div class="form-group">
			                                            <label class="control-label">Center Code<span class="required" aria-required="true">*</span></label>
			                                            <input type="text" class="form-control" placeholder="Center Code" name="center_code" value="<?php echo (isset($single_institute_record->center_code) && !empty($single_institute_record->center_code))?$single_institute_record->center_code:'';?>" tabindex="">
			                                        </div>
			                                   	</div>												
												<div class="col-md-6 ">
			                                        <div class="form-group">
			                                            <label class="control-label">Center Name<span class="required" aria-required="true">*</span></label>
			                                            <input type="text" class="form-control" placeholder="Center Name" name="center_name" value="<?php echo (isset($single_institute_record->center_name) && !empty($single_institute_record->center_name))?$single_institute_record->center_name:'';?>" tabindex="">
			                                        </div>
			                                   	</div>	
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Email </label>
														<input type="text" class="form-control" placeholder="Email"  name="email" value="<?php echo (isset($single_institute_record->email) && !empty($single_institute_record->email))?$single_institute_record->email:'';?>" tabindex="">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Mobile No. </label>
														<input type="text" class="form-control" placeholder="Mobile"  name="mobile" value="<?php echo (isset($single_institute_record->mobile) && !empty($single_institute_record->mobile))?$single_institute_record->mobile:'';?>" tabindex="">
													</div>
												</div>
											</div>	
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Distruct </label>
														<input type="text" class="form-control" placeholder="Distruct"  name="distruct" value="<?php echo (isset($single_institute_record->district) && !empty($single_institute_record->district))?$single_institute_record->district:'';?>" tabindex="">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Taluka </label>
														<input type="text" class="form-control" placeholder="Taluka"  name="taluka" value="<?php echo (isset($single_institute_record->taluka) && !empty($single_institute_record->taluka))?$single_institute_record->taluka:'';?>" tabindex="">
													</div>
												</div>
											</div>										
										</div>
										<div class="form-actions">
											<center>
												<button type="submit" class="btn green common_save" rel="<?php echo (isset($single_institute_record->institute_id) && !empty($single_institute_record->institute_id))?$single_institute_record->institute_id:''?>">
													<?php if(isset($single_institute_record->institute_id) && !empty($single_institute_record->institute_id))
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
			<div id="instituteRecordsDiv">
				<?php $this->load->view('admin/master_form/institute_record_table');?>	
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