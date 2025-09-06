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
	.label-success {
		background-color: green;
	}

	.select2-container .select2-dropdown .select2-results {
		max-height: 50px !important;
		/* 👈 Set your desired height */
		overflow-y: auto !important;
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
			<div class="container-fluids" style="padding-left: 50px;padding-right:50px;">
				<!-- BEGIN PAGE BREADCRUMB -->
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<a href="#">Home</a><i class="fa fa-circle"></i>
					</li>
					<li class="active">
						Test Result View
					</li>
				</ul>

				<div class="row">
					<div class="col-md-12">
						<div class="row form">
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-list"></i>Test Report
									</div>
									<div class="actions">
										<div class="col-md-12">
											<!-- <button id="generate_excel" onclick="saveAsExcel()"
												class="btn red btn-danger"> Export To Excel</button> -->

												<button onclick="exportTableToExcel()" class="btn btn-danger float-right">Export to Excel</button>
										</div>
									</div>
								</div>

								<div class="portlet-body">
									<div class="row mb-3 justify-content-center">
										<!-- Department Filter -->
										<!-- <div class="col-md-4">
										<label><strong>Filter by Department:</strong></label>
										<select id="filter_department" class="form-control select2">
											<option value="">-- All Departments --</option>
										</select>
									</div> -->

										<!-- Designation Filter -->
										<!-- <div class="col-md-4">
										<label><strong>Filter by Designation:</strong></label>
										<select id="filter_designation" class="form-control select2">
											<option value="">-- All Designations --</option>
										</select>
									</div> -->
										<!-- <div class="col-md-4">
										<label><strong>By Location</strong></label>
									
									<select id="filter_loacation" class="form-control select2">
										<option value="">-- All Lacations --</option>
									</select>
									</div> -->
									</div>


									<table class="table table-striped table-bordered table-hover masterTable"
										id="export_result">
										<thead>
											<tr>
												<th style="text-align:center;">Sr. No.</th>
												<th style="text-align:center;">Employee Name</th>
												<th style="text-align:center;">Department</th>
												<th style="text-align:center;">Qualification</th>
												<th style="text-align:center;">Designation</th>
												<th style="text-align:center;">Joining Date</th>
												<th style="text-align:center;">Location</th>
												<th style="text-align:center;">Total Questions</th>
												<th style="text-align:center;">Total Marks</th>
												<th style="text-align:center;">Negative Marks</th>
												<th style="text-align:center;">Correct</th>
												<th style="text-align:center;">Wrong</th>
												<th style="text-align:center;">Marks Obtained</th>
												<th style="text-align:center;">Not Attempted</th>
												<th style="text-align:center;">Exam Start Time</th>
												<th style="text-align:center;">Exam End Time</th>
												<th style="text-align:center;">Response Time</th>
												<th style="text-align:center;">Result</th>
												<th style="text-align:center;">Rank</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (!empty($user_result)) {
												$sr_no = 1;
												$rank = 1;

												foreach ($user_result as $user) {
													$per_que_mark = $user->total_mark / $user->question_count;
													$wrong_marks = $user->incorrect_count * $user->per_mark;
													$correct_marks = $user->correct_count * $per_que_mark;
													$marks_obtained = $correct_marks - $wrong_marks;

													$not_attempted = $user->question_count - ($user->correct_count + $user->incorrect_count);
													$result = ($marks_obtained / $user->total_mark) * 100 >= 35 ? 'PASS' : 'FAIL';

													// Assign medal based on rank
													$medal = '';
													if ($rank == 1)
														$medal = '';
													elseif ($rank == 2)
														$medal = '';
													elseif ($rank == 3)
														$medal = '';
													?>
													<tr>
														<td style="text-align:center;"><?php echo $sr_no++; ?></td>
														<td style="text-align:center;"><?php echo $user->fullname . $medal; ?>
														</td>
														<td style="text-align:center;"><?php echo $user->dept_master_name; ?>
														</td>
														<td style="text-align:center;"><?php echo $user->latest_education; ?>
														</td>
														<td style="text-align:center;"><?php echo $user->title; ?></td>
														<td style="text-align:center;"><?php echo $user->emp_joining_date; ?>
														</td>
														<td style="text-align:center;"><?php echo $user->station_type_name; ?>
														</td>
														<td style="text-align:center;"><?php echo $user->question_count; ?></td>
														<td style="text-align:center;"><?php echo $user->total_mark; ?></td>
														<td style="text-align:center;"><?php echo $user->per_mark; ?></td>
														<td style="text-align:center;"><?php echo $user->correct_count; ?></td>
														<td style="text-align:center;"><?php echo $user->incorrect_count; ?>
														</td>
														<td style="text-align:center;"><?php echo round($marks_obtained, 2); ?>
														</td>
														<td style="text-align:center;"><?php echo $not_attempted; ?></td>
														<td style="text-align:center;">
															<?php echo isset($user->start_time) ? date(' H:i:s', strtotime($user->start_time)) : ''; ?>
														</td>
														<td style="text-align: center;">
															<?php echo isset($user->submitted_time) ? date(' H:i:s', strtotime($user->submitted_time)) : ''; ?>
														</td>
														<td style="text-align:center;"><?php echo $user->response_time; ?></td>
														<td style="text-align:center;">
															<span
																class="label label-<?php echo $result === 'PASS' ? 'success' : 'danger'; ?>">
																<strong><?php echo $result; ?></strong>
															</span>
														</td>
														<td style="text-align:center;"><?php echo 'Rank ' . $rank++; ?></td>
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

	<script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>

	<script>
		$(document).ready(function () {
			$('#filter_department').select2({
				dropdownAutoWidth: true,
				width: '100%'
			});
		});
	</script>
	<script>
		jQuery(document).ready(function () {
			Metronic.init(); // init metronic core componets
			Layout.init(); // init layout
			//PluginPickers.init();
			TableAdvanced.init();
			Demo.init(); // init demo(theme settings page)
		});

	// function saveAsExcel() {
	// 		$("#export_result").table2excel({
	// 			// exclude CSS class
	// 			exclude: ".noExl",
	// 			name: "Aptitude Test Marks",
	// 			filename: "aptitude_test_result_report", //do not include extension
	// 			fileext: ".xls", // file extension
	// 		});
	// 	}


	function exportTableToExcel() {
    var table = document.getElementById('export_result');
    // Force raw text export so Excel doesn't reformat it
    var ws = XLSX.utils.table_to_sheet(table, { raw: true });
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "aptitude_test_result_report");
    XLSX.writeFile(wb, "aptitude_test_result_report.xlsx");
}

		



	</script>

	<!-- Filters -->



	<script>
		$(document).ready(function () {
			var table = $('.masterTable').DataTable();

			// Load departments
			$.ajax({
				url: "<?= base_url('get_departments') ?>",
				type: 'GET',
				dataType: 'json',
				success: function (data) {
					$.each(data, function (index, item) {
						$('#filter_department').append(
							$('<option>', {
								value: item.dept_master_name,
								text: item.dept_master_name
							})
						);
					});
				}
			});

			// Load designations
			$.ajax({
				url: "<?= base_url('admin/get_designations') ?>",
				type: 'GET',
				dataType: 'json',
				success: function (data) {
					$.each(data, function (index, item) {
						$('#filter_designation').append(
							$('<option>', {
								value: item.title,
								text: item.title
							})
						);
					});
				}
			});

			// Initialize Select2
			$('#filter_department, #filter_designation').select2({
				dropdownAutoWidth: true,
				width: 'resolve'
			});

			// Filter on department change
			$('#filter_department').on('change', function () {
				table.column(2).search($(this).val()).draw();
			});

			// Filter on designation change
			$('#filter_designation').on('change', function () {
				table.column(3).search($(this).val()).draw();
			});
		});



	</script>
	<script>
		// function exportToExcel() {

		// 	// Assuming the controller is set up for export

		// 	var test_id = <?php echo $test_id; ?>; // Use the PHP variable for test_id
		// 	window.location.href = "<?php echo base_url('export_test_report'); ?>/" + test_id;
		// 	// window.location.href = '<?= site_url("percentage_exam_result"); ?>/' + test_id;
		// }


// 		function exportTableToExcel() {
//     var table = document.getElementById('master_record');
//     // Force raw text export so Excel doesn't reformat it
//     var ws = XLSX.utils.table_to_sheet(table, { raw: true });
//     var wb = XLSX.utils.book_new();
//     XLSX.utils.book_append_sheet(wb, ws, "SEZ Login Record");
//     XLSX.writeFile(wb, "SEZ_Login_Record.xlsx");
// }

	</script>

	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>