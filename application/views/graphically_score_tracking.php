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
	

	p {
		font-size: 15px;
	}
</style>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->

<body>
<!-- <div class="page-header">
	
	<div class="page-header-top">  
		<div class="container">
			
			<div class="page-logo">
				<a href="#"><img src="<?php echo base_url();?>images/moon_logo.png" alt="logo" class="logo-default"  style="margin: 0px; height:70px; margin-left: -106%;"></a>
			</div>
			<a href="#" class="menu-toggler"></a>
		</div>
	</div>
	<div class="page-header-menu">
		<div class="container">
			<div class="hor-menu">
				<ul class="nav navbar-nav">
					<li class="">
						<a href= "<?php echo base_url();?>user_test_res";><i class="fa fa-file-excel-o"></i>Test Results</a>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
	
</div> -->
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
						Graphical Analytics
					</li>
				</ul>

				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
						</div>
						<div class="row form">
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-bar-chart"></i>Score Analytics
									</div>
									<div class="caption" style="margin-left: 900px;">
									
									<a style="font-size: 15px;line-height: 18px;font-weight: 300; color:white; text-decoration: none;" href= "<?php echo base_url();?>user_test_res";><i class="fa fa-file-excel-o"></i>Test Results</a>
									</div>
								</div>
								<div class="portlet-body">
									<?php if (!empty($graphical_test_report)) { ?>
										<!-- Remove the table and place the chart in its own div -->
										<div id="combinedBarChart" style="width: 100%; height: 300px;"></div>
									<?php } else { ?>
										<center>
											<h4>No Records Found</h4>
										</center>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="row form">


							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-pie-chart"></i>Overall Correct VS Wrong Analytics
									</div>


								</div>
								<div class="portlet-body">
									<?php if (!empty($graphical_question_report)) { ?>
										<div id="correctwrongPieChart" style="width: 100%; height: 300px;"></div>
									<?php } else { ?>
										<center>
											<h4>No Records Found</h4>
										</center>
									<?php } ?>
									<?php if (isset($graphical_question_report->total_exams_attempted)) { ?>
										<P><?php echo 'Dear ' . '<strong>' . $graphical_question_report->empname . '</strong>' . ', you have attempted <strong>' . $graphical_question_report->total_exams_attempted . '</strong> exams so far.'; ?>
										</P>
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
	<div id="employee-modal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%);
	background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px #333;">
		<h3>Employees with Correct Answers</h3>
		<ul id="employee-list"></ul>
		<button onclick="closeEmployeeModal()">Close</button>
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
	<!-- <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script> -->
	<!-- END PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>js/common.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/amcharts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/serial.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/light.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/pie.js"></script>
	<!-- END JAVASCRIPTS -->
</body>


<script>
	$(document).ready(function () {
		// Create an array to hold all the test data for the combined chart
		var combinedChartData = [];

		<?php foreach ($graphical_test_report as $key) { ?>
			combinedChartData.push({
				"category": "<?php echo isset($key->test_name) ? $key->test_name : 'Test ' . $key->test_id; ?>",
				"value": <?php echo isset($key->obtained_marks) ? $key->obtained_marks : 0; ?>,
				"color": "#89C4F4"
			});
		<?php } ?>

		// Function to update the chart based on selected exam
		function updateChart(test_id) {
			var filteredData = combinedChartData;

			if (test_id !== "0") {
				// Filter the data for the selected test
				filteredData = combinedChartData.filter(function (item) {
					return item.category === test_id; // Only show the selected test data
				});
			}

			// Create the combined bar chart with the filtered data
			AmCharts.makeChart("combinedBarChart", {
				"type": "serial",
				"theme": "light",
				"dataProvider": filteredData,
				"valueAxes": [{
					"gridColor": "#CCCCCC",
					"gridAlpha": 0.2,
					"dashLength": 0,
					"title": "Marks"
				}],
				"graphs": [{
					"balloonText": "[[category]]: [[value]]", // Show value in the balloon when hovered
					"fillColorsField": "color",
					"fillAlphas": 0.9,
					"lineAlpha": 0.2,
					"type": "column",
					"valueField": "value",
					"columnWidth": 0.4,
					"labelText": "[[value]]", // Show the value directly on the bar
					"labelPosition": "top", // Position label on top of the bar
					"labelColor": "#000000", // Set label text color to black
					"labelOffset": 10, // Adjust label position if necessary
				}],
				"chartCursor": {
					"categoryBalloonEnabled": false, // Disable category balloon
					"cursorAlpha": 0,
					"zoomable": false
				},
				"categoryField": "category", // Keep the category field for x-axis (exam names)
				"categoryAxis": {
					"gridPosition": "start",
					"labelRotation": 45,
					"title": "Exam Name", // Set axis title to "Exam Name"
				},
				"export": {
					"enabled": true
				}
			});
		}

		// Default: Show all data
		updateChart("0");

		// Filter chart data when the user selects a test
		$("#test_name").change(function () {
			var selectedTestId = $(this).val();
			updateChart(selectedTestId);
		});
	});
</script>




<script>
	$(document).ready(function () {
		// Create an array to hold the test data for the pie chart
		var pieChartData = [];

		<?php if (!empty($graphical_question_report)) { ?>
			pieChartData.push({
				"category": "Correct",
				"value": <?php echo isset($graphical_question_report->total_correct_count) ? $graphical_question_report->total_correct_count : 0; ?>,
				"color": "#4caf50"
			});
			pieChartData.push({
				"category": "Incorrect",
				"value": <?php echo isset($graphical_question_report->total_incorrect_count) ? $graphical_question_report->total_incorrect_count : 0; ?>,
				"color": "#f44336"
			});
			pieChartData.push({
				"category": "Not Attended",
				"value": <?php echo isset($graphical_question_report->total_not_attended_count) ? $graphical_question_report->total_not_attended_count : 0; ?>,
				"color": "#ff9800"
			});
		<?php } ?>

		// Function to create the pie chart
		function createPieChart() {
			AmCharts.makeChart("correctwrongPieChart", {
				"type": "pie",
				"theme": "light",
				"dataProvider": pieChartData,
				"valueField": "value",
				"titleField": "category",
				"balloonText": "[[category]]: [[value]]",
				"outlineColor": "#FFFFFF",
				"outlineAlpha": 0.8,
				"outlineThickness": 2,
				"colorField": "color",
				"labelRadius": 5,
				"radius": "40%",
				"innerRadius": "30%",
				"export": {
					"enabled": true
				}
			});
		}

		// Create the pie chart
		createPieChart();
	});

</script>


<script>
	function filterExam() {
		var test_id = document.getElementById("test_name").value;
		var baseUrl = "<?php echo base_url('graphically_score_tracking'); ?>";

		// Redirect to the correct URL based on the selected test
		window.location.href = test_id !== "0" ? baseUrl + "/" + test_id : baseUrl + "/all";
	}
</script>


</html>