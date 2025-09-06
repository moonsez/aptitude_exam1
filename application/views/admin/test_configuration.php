<!DOCTYPE html>

<html lang="en" class="no-js">


<head>
	<meta charset="utf-8">
	<title>Online Test | Test Configuration</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
		type="text/css">
	<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
		type="text/css">
	<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
		rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
		type="text/css">
	<link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
		type="text/css">
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN THEME STYLES -->

	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
	<link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components"
		rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/css/components.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/css/plugins.css">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css"
		id="style_color">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"
		rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->

	<link rel="shortcut icon" href="favicon.ico">
</head>

<body>
	<?php $this->load->view('admin/header'); ?>
	
	<div class="page-container">
		
		<div class="page-content page_div">
			<div class="container">
				
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<a href="#">Home</a><i class="fa fa-circle"></i>
					</li>

					<li class="active">
						Test Configuration
					</li>
				</ul>

				<div class="row">
					<div class="col-md-12">
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Test Configuration
								</div>
							</div>
							<div class="portlet-body form">
								
								<!-- BEGIN FORM-->
								<form action="save_configuration" data-tbdiv="#testDetailsDiv"
									data-tburl="fetch_test" class="horizontal-form" method="post"
									enctype="multipart/form-data" id="fetch_test">
									<div class="form-body">
										<!--/row-->
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">
														Department<span
															class="required"
															aria-required="true">*</span>
													</label>
													<div class="input-icon ">
														<select class="form-control select2me" id="dept_name"
															name="dept_name[]" required multiple>
															<option value="0" <?php echo (isset($singleTestConfiguration->dept_master_id) && $singleTestConfiguration->dept_master_id == '0') ? 'selected="selected"' : ''; ?>>All</option>
															<?php if (isset($deptdata) && !empty($deptdata)) {
																foreach ($deptdata as $key) { ?>
																	<option value="<?php echo $key->dept_master_id; ?>" <?php echo (isset($singleTestConfiguration->dept_master_id) && !empty($singleTestConfiguration->dept_master_id) && in_array($key->dept_master_id, explode(",",$singleTestConfiguration->dept_master_id)))?'selected="selected"':''; ?>>
																		<?php echo $key->dept_master_name; ?>
																	</option>
																<?php }
															} ?>
														</select>
													</div>

												</div>

											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">
														Location<span
															class="required"
															aria-required="true">*</span>
													</label>

													<div class="input-icon ">
														<select class="form-control select2me" id="location"
															name="location" required>
															<option value="0">All</option>
															<?php if (isset($locationdata) && !empty($locationdata)) {
																foreach ($locationdata as $key) { ?>
																	<option
																		value="<?php echo $key->station_type_id; ?>" <?php echo (isset($singleTestConfiguration->station_type_id) && !empty($singleTestConfiguration->station_type_id) && ($singleTestConfiguration->station_type_id==$key->station_type_id))?'selected="selected"':''; ?>>
																		<?php echo $key->station_type_name; ?>
																	</option>
																<?php }
															} ?>
														</select>
													</div>

												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">
														Test Name<span
															class="required"
															aria-required="true">*</span>
													</label>

													<div class="input-icon ">
														<select class="form-control select2me" multiple id="test_name"
															name="test_name[]" placeholder="Select" required>
															<?php if (isset($testData) && !empty($testData)) {
																foreach ($testData as $key) { ?>
																	<option
																		value="<?php echo $key->test_name; ?>" <?php echo (isset($singleTestConfiguration->test_name) && !empty($singleTestConfiguration->test_name) && in_array($key->test_name, explode(',',$singleTestConfiguration->test_name)))?'selected="selected"':''; ?>>
																		<?php echo $key->test_name; ?>
																	</option>
																<?php }
															} ?>
														</select>
													</div>

												</div>
											</div>

											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Question Count<span
															class="required"
															aria-required="true">*</span></label>
													<input type="text" class="form-control"
														placeholder="Question Count" name="question_count"
														value="<?php echo (isset($singleTestConfiguration->question_count) && !empty($singleTestConfiguration->question_count)) ? $singleTestConfiguration->question_count : ''; ?>"
														tabindex="" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">
														Negative Marking<span
															class="required"
															aria-required="true">*</span>
													</label>

													<div class="input-icon ">
														<select class="form-control select2me" id="negative_marking"
															name="negative_marking" required>
															<option value="">Select</option>
															<?php if (isset($negativeData) && !empty($negativeData)) {
																foreach ($negativeData as $key) { ?>
																	<option
																		value="<?php echo $key->negative_id; ?>" <?php echo (isset($singleTestConfiguration->negative_marking) && !empty($singleTestConfiguration->negative_marking) && ($singleTestConfiguration->negative_marking==$key->negative_id))?'selected="selected"':''; ?>>
																		<?php echo $key->per_mark; ?>
																	</option>
																<?php }
															} ?>
														</select>
													</div>

												</div>
											</div>

											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Total mark<span
															class="required"
															aria-required="true">*</span></label>
													<input type="text" class="form-control"
														placeholder="Total mark" name="total_mark"
														value="<?php echo (isset($singleTestConfiguration->total_mark) && !empty($singleTestConfiguration->total_mark)) ? $singleTestConfiguration->total_mark : ''; ?>"
														tabindex="" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Exam Time (In Minutes)<span
															class="required"
															aria-required="true">*</span></label>
													<input type="text" class="form-control"
														placeholder="Exam Time" name="test_time"
														value="<?php echo (isset($singleTestConfiguration->test_time) && !empty($singleTestConfiguration->test_time)) ? $singleTestConfiguration->test_time : ''; ?>"
														tabindex="" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Exam Start Date<span
															class="required"
															aria-required="true">*</span></label>
													<div class="">
														<input type="datetime-local" id="test_datetime"
															name="test_datetime" class="form-control" value="<?php echo (isset($singleTestConfiguration->test_datetime) && !empty($singleTestConfiguration->test_datetime)) ? strftime('%Y-%m-%dT%H:%M:%S', strtotime($singleTestConfiguration->test_datetime)) : ''; ?>" required/>
													</div>
												</div>
											</div>

											
										</div>
									</div>
									<div class="form-actions">
										<center>
											<button type="submit" class="btn green test_common_save"
												rel="<?php echo (isset($singleTestConfiguration->test_configuration_id) && !empty($singleTestConfiguration->test_configuration_id)) ? $singleTestConfiguration->test_configuration_id : '' ?>">
												<?php if (isset($singleTestConfiguration->test_configuration_id) && !empty($singleTestConfiguration->test_configuration_id)) {
													echo 'Update';
												} else {
													echo 'Submit';
												} ?>
											</button>
											<button type="button" class="btn red clearData">Clear</button>
										</center>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div id="testDetailsDiv">
					<?php $this->load->view('admin/master_form/configuration_table'); ?>
				</div>
			</div>
		</div>

	</div>

	<?php $this->load->view('admin/footer'); ?>

	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/global/plugins/select2/select2.min.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/ckeditor/ckeditor.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url(); ?>assets/global/plugins/ckeditor/adapters/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/plugins.js" type="text/javascript"></script>
	<script type="text/javascript"
		src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script>

	<!-- END PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>js/common.js"></script>
	<script src="<?php echo base_url(); ?>js/custom_g.js"></script>

	<script>
		jQuery(document).ready(function () {
			Metronic.init();
			Layout.init();
			//Demo.init();
			TableAdvanced.init();

		});
	</script>

</body>

</html>