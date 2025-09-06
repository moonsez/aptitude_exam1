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

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN THEME STYLES -->
	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
	<link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet"
		type="text/css">
	<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css"
		id="style_color">
	<link href="<?php echo base_url(); ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/css/plugins.css">
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->

<body>
	<?php //$this->load->view('admin/header'); ?>
	<!-- BEGIN PAGE CONTAINER -->

	<!-- BEGIN HEADER -->
	<!-- <div class="page-header">
		
		<div class="page-header-top">
			<div class="container">
				
				<div class="page-logo">
					<a href="#"><img src="<?php echo base_url(); ?>images/moon_logo.png" alt="logo" class="logo-default"
							style="margin: 0px; height:70px; margin-left: -106%;"></a>
				</div>

				<a href="#" class="menu-toggler"></a>



			</div>
		</div>

		<div class="page-header-menu">
			<div class="container">
				<div class="hor-menu">
					<ul class="nav navbar-nav">
						<li class="">
							<a href="<?php echo base_url(); ?>graphically_score_tracking" ;><i
									class="fa fa-file-excel-o"></i>Graphically Score Tracking</a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
		
	</div> -->
	<!-- END HEADER -->
	<div class="page-container">
		<!-- BEGIN PAGE CONTENT -->
		<div class="page-content page_div" style="min-height: 820px !important;">
			<div class="container">
				<!-- BEGIN PAGE BREADCRUMB -->
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<a href="<?php echo base_url(); ?>">Home</a><i class="fa fa-circle"></i>
					</li>
					<!-- <li>
					<a href="passport_form.html">Passport Form</a>
					<i class="fa fa-circle"></i>
				</li> -->
					<li class="active">
						Test Results
					</li>

				</ul>

				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="row form">
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-cogs"></i>Test Results
									</div>
									<div class="caption" style="margin-left: 780px;">
									<a style="font-size: 15px;line-height: 18px;font-weight: 300; color:white; text-decoration: none;"href="<?php echo base_url(); ?>graphically_score_tracking" ;><i
									class="fa fa-file-excel-o"></i> Graphically Score Tracking</a>
									</div>
								</div>
								<div class="portlet-body">
									<?php if (isset($studentRecord) && !empty($studentRecord)) { ?>
										<table class="table table-striped table-bordered table-hover masterTable">
											<thead>
												<tr>
													<th style="text-align:center;">
														Sr. No.
													</th>
													<th style="text-align:center;">
														Test Name
													</th>
													<th style="text-align:center;">
														Question Count
													</th>
													<th style="text-align:center;">
														Negative Marking
													</th>
													<th style="text-align:center;">
														Total Marks
													</th>
													<th style="text-align:center;">
														Exam Time
													</th>
													<th style="text-align:center;">
														Exam Start Date and Time
													</th>
													<th style="text-align:center;">
														Action
													</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1;
												foreach ($studentRecord as $key) { ?>
													<tr class="odd gradeX">
														<td style="text-align:center;">
															<?php echo $i++; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($key->test_name) && !empty($key->test_name)) ? $key->test_name : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($key->question_count) && !empty($key->question_count)) ? $key->question_count : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($key->question_count) && !empty($key->question_count)) ? $key->question_count : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($key->total_mark) && !empty($key->total_mark)) ? $key->total_mark : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($key->test_time) && !empty($key->test_time)) ? $key->test_time : ''; ?>
														</td>
														<td style="text-align:center;">
															<?php echo (isset($key->test_datetime) && !empty($key->test_datetime)) ? date('d-m-Y H:i:s', strtotime($key->test_datetime)) : ''; ?>
														</td>
														<td style="text-align:center;">
															<span style="cursor: pointer;" class="tooltips"
																data-original-title="View Result" data-placement="top">
																<a href="<?php echo base_url(); ?>user_view_results/<?php echo (isset($key->user_test_id) && !empty($key->user_test_id)) ? $key->user_test_id : ''; ?>"
																	;>
																	<i class="fa fa-search-plus"></i>
																</a>
															</span>
															<span style="cursor: pointer;" class="tooltips"
																data-original-title="Download Certificate" data-placement="top">
																<a href="<?php echo base_url(); ?>download_certificate/<?php echo (isset($key->user_test_id) && !empty($key->user_test_id)) ? $key->user_test_id : ''; ?>"
																	;>
																	<i class="fa fa-download"></i>
																</a>
															</span>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									<?php } else { ?>
										<center>
											<h4>No Records Found</h4>
										</center>
									<?php } ?>
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
	<?php //$this->load->view('admin/footer'); ?>

	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

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
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>