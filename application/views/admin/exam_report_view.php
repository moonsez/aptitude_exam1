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
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css" />
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN THEME STYLES -->
	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
	<link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components"
		rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css"
		id="style_color">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/css/plugins.css">
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico">
</head>

<style>
	.label-success{
		background-color:green;
	}
</style>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->

<body>
	<?php $this->load->view('admin/header'); ?>
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
						Test Report View
					</li>
				</ul>

				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="row form">
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-list"></i>Test Report
									</div>
									<div class="actions">
										<button id="generate_excel" onclick="saveAsExcel()" class="btn red btn-danger">
											Export To Excel</button>
									</div>
								</div>
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover masterTable"
										id="export_result">
										<thead>
											<tr>
											    <th style="text-align:center;"> Sr No </th>
												<th style="text-align:center;"> Employee Name/Questions </th>
												<th style="text-align:center;"> Department </th>
												<th style="text-align:center;"> Designation </th>
												<th style="text-align:center;">Employee Joining Date </th>
												<th style="text-align:center;">Location</th>
												<?php
												$i = 1;
												if (isset($test_report_data) && !empty($test_report_data)) {
													foreach ($test_report_data as $key) {
														$question_id = $key->question_id;
														?>
														<th style="text-align:center;"
															data-question-id="<?php echo $question_id; ?>">
															<?php echo $key->question; ?>
														</th>
													<?php
													}
												}
												?>
											</tr>

											
										</thead>

										<tbody>
											<?php
											if (isset($user_test_data) && !empty($user_test_data)) {
												foreach ($user_test_data as $row) {
													$emp_name = $row['key'];
													$user_ans = $row['user_ans'];
													?>
													<tr class="odd gradeX">
													<td style="text-align:center;"><?php echo $i++; ?></td>
														<td style="text-align:center;">
															<?php echo (isset($emp_name->fullname) && !empty($emp_name->fullname)) ? $emp_name->fullname : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($emp_name->dept_master_name) && !empty($emp_name->dept_master_name)) ? $emp_name->dept_master_name : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($emp_name->title) && !empty($emp_name->title)) ? $emp_name->title : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($emp_name->emp_joining_date) && !empty($emp_name->emp_joining_date)) ? $emp_name->emp_joining_date : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($emp_name->station_type_name) && !empty($emp_name->station_type_name)) ? $emp_name->station_type_name : ''; ?>
														</td>
														<?php
														if (!empty($user_ans)) {
															foreach ($test_report_data as $key) {
																// echo '<pre>';print_r($key);

																$question_id = $key->question_id;
																?>
																<td style="text-align:center;">
																	<?php
																	
																	foreach ($user_ans as $ans) {
																		if ($ans->question_id == $question_id) {
																			// echo '<pre>';print_r($ans);
																			if(isset($ans->option_id) && !empty($ans->option_id)){
																				if($ans->option_id == $ans->que_ans){
																					?>
																					<span class="label label-success">Right</span>
																					<?php
																					// echo "Right";
																					break;
																				}else{
																					?>
																					<span class="label label-danger">Wrong</span>
																					<?php
																					break;
																				}
																				
																			}else{
																				?>
																					<span class="label label-info">N/A</span>
																					<?php
																					break;
																			}
																			
																			
																		}
																	}
																	?>
																</td>
															<?php
															}
														}
														?>

														
													</tr>
												<?php
												}
											}
											?>

											
										</tbody>
									</table>
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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>

	<script src="<?php echo base_url(); ?>/js/jquery.table2excel.min.js"></script>

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
	<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"
		type="text/javascript"></script>
	<script type="text/javascript"
		src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
	<script src="<?php echo base_url(); ?>js/plugins.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>js/common.js"></script>


	<script>
		jQuery(document).ready(function () {
			Metronic.init(); // init metronic core componets
			Layout.init(); // init layout
			//PluginPickers.init();
			TableAdvanced.init();
			Demo.init(); // init demo(theme settings page)
		});

		function saveAsExcel() {
			$("#export_result").table2excel({
				// exclude CSS class
				exclude: ".noExl",
				name: "Aptitude Test Marks",
				filename: "aptitude_test_result_report", //do not include extension
				fileext: ".xls", // file extension
			});
		}
	</script>


	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>