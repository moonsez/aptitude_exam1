<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>Online Test | Instruction </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description" />
	<meta content="" name="author" />
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
	<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
		rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url(); ?>assets/admin/pages/css/login.css" rel="stylesheet" type="text/css" />
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components"
		rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css" />
	<link id="style_color" href="<?php echo base_url(); ?>assets/admin/layout4/css/themes/light.css" rel="stylesheet"
		type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<style>
	@media (max-width: 767px) {
		.portlet_1 .row {
			display: flex;
			flex-direction: column;
		}

		/* Ensure all columns take full width */
		.portlet_1 .col-md-2,
		.portlet_1 .col-md-3,
		.portlet_1 .col-md-5,
		.portlet_1 .col-md-10,
		.portlet_1 .col-md-1 {
			width: 100% !important;
			max-width: 100%;
			padding: 0 15px;
		}

		/* Image column comes first */
		.portlet_1 .col-md-3 {
			order: -1;
			display: flex;
			justify-content: center;
			margin-bottom: 20px;
		}

		.portlet_1 img {
			width: 150px;
			height: auto;
			border: 5px solid #777;
			margin-top: 15px;
		}

		/* Center the heading */
		.portlet_1 h4 {
			text-align: center;
		}

		/* Table adjustments for mobile */
		.portlet_1 table {
			width: 100%;
		}

		.portlet_1 table td {
			display: block;
			width: 100%;
			padding: 6px 0;
		}

		/* Button and label styling */
		.portlet_1 .btn,
		.portlet_1 .label {
			display: block;
			width: 100%;
			text-align: center;
			margin: 10px 0;
			float: none !important;
		}

		.portlet-title {
			height: auto !important;
			display: flex;
			flex-direction: column;
			gap: 10px;
		}


		.caption {
			margin-bottom: 10px;
			text-align: center;
		}

		body,
		html {
			overflow-x: hidden;
		}
	}
</style>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

<body class="page-header-fixed  page-sidebar-closed">
	<?php $this->load->view('header'); ?>
	<div class="clearfix">
	</div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<!-- BEGIN ALERTS PORTLET-->
					<div class="portlet light portlet_1" style="min-height:380px;">
						<div class="portlet-title" style="">
							<div class="caption" style="text-align: center;">
								<span class="caption-subject font-green-sharp bold uppercase">Aptitude Test</span>
							</div>
							<div class="col-md-3 text-right" style="margin-left: 76%; margin-top: -39px;">
								<a href="<?= base_url('intern_logout') ?>" class="btn btn-success uppercase">Logout</a>
							</div>

						</div>
						<div class="portlet-body">
							<h4 class="uppercase" style="text-align:center;"><b>Employee Information</b></h4>

							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-5">
									<div class="table-scrollable table-scrollable-borderless">
										<table class="table table-hover table-light">
											<tr>

											</tr>
											<tr>
												<td>Candidate's Name</td>
												<td>
													<a href="javascript:;"
														class="primary-link"><?php echo (isset($user_data->user_name) && !empty($user_data->user_name)) ? $user_data->user_name : '' ?></a>
												</td>
											</tr>
											<tr>

											</tr>
											<tr>

											</tr>
											<tr>
												<td>Location</td>
												<td>
													<a href="javascript:;"
														class="primary-link"><?php echo (isset($user_data->station_type_name) && !empty($user_data->station_type_name)) ? $user_data->station_type_name : '' ?></a>
												</td>
											</tr>
											<tr>
												<td>Subject </td>
												<td>
													<a href="javascript:;" class="primary-link">Aptitude Exam</a>
												</td>
											</tr>
											<tr>
												<!--<td>Language</td>
											<td>
												<a href="javascript:;" class="primary-link"><?php $lang = $this->session->userdata('language_id');
												echo (isset($lang) && !empty($lang) && $lang == 1) ? 'Marathi' : 'English'; ?></a>
											</td>!-->
											</tr>
											<tr>
												<td>Date</td>
												<td>
													<a href="javascript:;"
														class="primary-link"><?php echo date('d-m-Y'); ?></a>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-md-3">
									<!-- <center><img
											src="http://192.168.0.7/uploads/emp_image/<?php echo $user_data->intern_img_file_name ?>"
											style="width: 150px; height: 180px; border: 5px solid #777;  margin-top: 15px;">
									</center> -->
								</div>
								<div class="col-md-2"></div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<?php if (empty($today_test_details)) { ?>
										<a type="button" class="btn green pull-right"
											href="<?php echo base_url(); ?>intern_test_res" style="float:center;">Test
											Results</a>
									<?php } else if (!empty($today_test_details) && !empty($final_datetime) && date("Y-m-d H:i:s") > $final_datetime) { ?>
											<a type="button" class="btn green pull-right"
												href="<?php echo base_url(); ?>intern_test_res" style="float:center;">Test
												Results</a>
									<?php } ?>
								</div>
								<div class="col-md-3">
									<?php if (isset($test_data) && !empty($test_data) && !empty($final_datetime) && $final_datetime >= $test_data->test_datetime && date('Y-m-d H:i:s') <= $final_datetime) { ?>
										<a type="button" class="btn blue pull-right"
											href="<?php echo base_url(); ?>intern_begin_test/<?php echo $user_data->user_id; ?>/<?php echo $test_data->test_configuration_id; ?>/<?php echo $user_data->login_id; ?>"
											rel="<?php echo ($user_data->user_id) ?>" style="float:center;">Next</a>
									<?php } else { ?>
										<span class="label label-warning pull-right">No New Test Avaiable For You</span>
									<?php } ?>
								</div>


							</div>
							<div class="col-md-6">
							</div>
						</div>
					</div>
					<!-- END ALERTS PORTLET-->
				</div>
				<div class="col-md-1">
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<?php $this->load->view('footer'); ?>
	<!-- END FOOTER -->
	</div>
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
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
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
		type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/holder.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
		type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/custom_g.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.crypt.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function () {
			// initiate layout and plugins
			Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features
			UIGeneral.init();
			Login.init();

			/*next_prev*/
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>