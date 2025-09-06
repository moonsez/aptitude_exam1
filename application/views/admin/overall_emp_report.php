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
						Overall Employee Report
					</li>
				</ul>

				<div class="row">
					<div class="col-md-12">
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-user"></i>Employee Report
								</div>
							</div>

							<div class="portlet-body form">
								<div class="form-body">
									<!--/row-->
									<div class="row ">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">
													Select Employee<span class="required" aria-required="true">*</span>
												</label>
												<div class="input-icon">
													<select class="form-control select2me" id="emp_name" name="emp_name"
														required>
														<option value="0">Select Employee</option>
														<?php
														if (isset($all_active_user) && !empty($all_active_user)) {
															$selected_user_id = isset($selected_user_id) ? $selected_user_id : 0;
															foreach ($all_active_user as $key) { ?>
																<option value="<?php echo $key->user_id; ?>" <?php echo ($key->user_id == $selected_user_id) ? 'selected="selected"' : ''; ?>>
																	<?php echo $key->emp_name; ?>
																</option>
															<?php }
														} ?>
													</select>
												</div>
											</div>
										</div>

										

										<div class="col-md-8 mt-3">
											<button type="button" style="margin-top:26px;"
												class="btn btn-primary w-100 overall_emp_report">Search</button>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>


				<div id="fetchdetailsdiv">
					<?php $this->load->view('admin/overall_emp_report_table'); ?>
				</div>



			</div>
		</div>
	</div>


	<div id="fullPageLoader"
		style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px); z-index: 9998; text-align:center;">
		<div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
			<img src="<?php echo base_url(); ?>assets/global/img/loader_1.gif" />
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
	<script src="<?php echo base_url(); ?>/js/jquery.table2excel.min.js"></script>

	<script>
		jQuery(document).ready(function () {
			Metronic.init(); // init metronic core componets
			Layout.init(); // init layout
			//PluginPickers.init();
			TableAdvanced.init();
			Demo.init(); // init demo(theme settings page)
		});
	</script>
	<script>
		$(document).on('click', '.overall_emp_report', function () {
			var emp_name = $('#emp_name').val();
			var test_name = $('#test_name').val();
			$('#fullPageLoader').fadeIn();

			$.ajax({
				url: completeURL('percent_result/fetch_overall_emp_report'),
				type: 'POST',
				dataType: 'json',
				data: {
					emp_name: emp_name,
					test_name: test_name
				},
				success: function (response) {
					// Inject the new table HTML into the DOM
					$('#fetchdetailsdiv').html(response.view);
				},
				complete: function () {
					// Reinitialize the DataTable
					$('#fullPageLoader').fadeOut();
					TableAdvanced.init();
				},
				error: function () {
					alert('Something went wrong!');
				}
			});
		});
	</script>





</body>

</html>