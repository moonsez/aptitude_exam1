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
	<style>
		.eye_icon {
			position: absolute;
			right: 40px;
			top: 64%;
			transform: translateY(-116%);
			cursor: pointer;
			width: 14px;
			height: 9px;
		}
	</style>
</head>


<body>



	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top" style="height: 55px;">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<div class="">
					<a href="<?php echo base_url(); ?>index"><img src="<?php echo base_url(); ?>images/moon_logo.png"
							alt="logo" class="logo-default" style="margin: 0px; height:55px;"></a>
				</div>

			</div>

			<!-- <div class="page-logo">
			<a href="javascript:void(0);">
				
			</a>			
		</div> -->
			<!-- END LOGO -->

		</div>
		<!-- END HEADER INNER -->
	</div>

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
					<div class="col-md-16" style="margin-top: 40px;">
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Intern Information Form
								</div>
							</div>
							<div class="portlet-body form">

								<!-- BEGIN FORM-->
								<form action="register_intern" data-tbdiv="#testDetailsDiv" data-tburl="fetch_test"
									class="horizontal-form" method="post" enctype="multipart/form-data" id="fetch_test">
									<div class="form-body">
										<!--/row-->
										<div class="row">
											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Full Name<span class="required"
															aria-required="true">*</span></label>
													<input type="text" class="form-control" placeholder="Full Name"
														name="user_name" required>
												</div>
											</div>

											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Personal Email<span class="required"
															aria-required="true">*</span></label>
													<input type="text" class="form-control" placeholder="Personal Email"
														name="email" required>
												</div>
											</div>

											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Contact Number<span class="required"
															aria-required="true">*</span></label>
													<input type="text" class="form-control" placeholder="Contact Number"
														name="mobile_no" required>
												</div>
											</div>

											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Emergency Contact Number<span
															class="required" aria-required="true">*</span></label>
													<input type="text" class="form-control"
														placeholder="Emergency Contact Number" name="emergency_no"
														required>
												</div>
											</div>

											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Date Of Birth<span class="required"
															aria-required="true">*</span></label>
													<input type="date" id="test_datetime" name="date_of_birth"
														class="form-control" required />
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Gender<span class="required"
															aria-required="true">*</span></label>
													<select name="gender" class="form-control" required>
														<option value="">-- Select Gender --</option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
														<option value="Other">Other</option>
													</select>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Internship Joining Date<span
															class="required" aria-required="true">*</span></label>
													<input type="date" class="form-control" placeholder="Joining Date"
														name="joining_date" required></input>
												</div>
											</div>

											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Pan Number<span class="required"
															aria-required="true">*</span></label>
													<input type="text" class="form-control" placeholder="Pan Number"
														name="pan_number" required>
												</div>
											</div>

											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Enter Education<span class="required"
															aria-required="true">*</span></label>
													<input type="text" class="form-control"
														placeholder="Enter Education" name="education" required>
												</div>
											</div>


											<div class="col-md-4">
												<div class="fileinput fileinput-new form-group"
													data-provides="fileinput">
													<label for="exampleInputFile" class="control-label">
														Upload Aadhar Card <span class="required"
															aria-required="true">*</span>
													</label>
													<div class="">
														<span class="btn default btn-file">
															<span class="fileinput-new">Select file</span>
															<span class="fileinput-exists">Change</span>
															<input type="file" name="aadhar_card_path"
																id="aadhar_card_path"
																accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required />
														</span>
														<span class="fileinput-filename"></span>
														&nbsp;
														<a href="javascript:void(0);" class="close fileinput-exists"
															data-dismiss="fileinput"></a>
														<div id="que_imp_file_error"></div>
													</div>
												</div>
												<p class="warning">
													(Please upload file in .pdf, .doc, .docx, .jpg, .jpeg, or .png
													format only)
												</p>
											</div>
											<div class="col-md-4">
												<div class="fileinput fileinput-new form-group"
													data-provides="fileinput">
													<label for="exampleInputFile" class="control-label">
														Upload Degree Certificate <span class="required"
															aria-required="true">*</span>
													</label>
													<div class="">
														<span class="btn default btn-file">
															<span class="fileinput-new">Select file</span>
															<span class="fileinput-exists">Change</span>
															<input type="file" name="degree_cert_path"
																id="degree_cert_path"
																accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required />
														</span>
														<span class="fileinput-filename"></span>
														&nbsp;
														<a href="javascript:void(0);" class="close fileinput-exists"
															data-dismiss="fileinput"></a>
														<div id="que_imp_file_error"></div>
													</div>
												</div>
												<p class="warning">
													(Please upload file in .pdf, .doc, .docx, .jpg, .jpeg, or .png
													format only)
												</p>
											</div>

											<div class="col-md-4">
												<div class="fileinput fileinput-new form-group"
													data-provides="fileinput">
													<label for="exampleInputFile" class="control-label">
														Upload Profile Image <span class="required"
															aria-required="true">*</span>
													</label>
													<div class="">
														<span class="btn default btn-file">
															<span class="fileinput-new">Select file</span>
															<span class="fileinput-exists">Change</span>
															<input type="file" name="intern_img_file_path"
																id="intern_img_file_path" accept=".jpg,.jpeg,.png"
																required />

														</span>
														<span class="fileinput-filename"></span>
														&nbsp;
														<a href="javascript:void(0);" class="close fileinput-exists"
															data-dismiss="fileinput"></a>
														<div id="que_imp_file_error"></div>
													</div>
												</div>
												<p class="warning">
													(Please upload file in .png, .jpeg and jpg
													format only)
												</p>
											</div>



										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Enter Password<span class="required"
															aria-required="true">*</span></label>
													<input type="password" class="form-control"
														placeholder="Enter Password" name="password_org" id="pass"
														value="<?php echo (isset($singleTestConfiguration->question_count) && !empty($singleTestConfiguration->question_count)) ? $singleTestConfiguration->question_count : ''; ?>"
														tabindex="" required>
													<img src="./images/eye-close.png" class="eye_icon togglePassword"
														data-target="pass">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Confirm Password<span class="required"
															aria-required="true">*</span></label>
													<input type="password" class="form-control"
														placeholder="Confirm Password" name="password_confirm"
														id="pass1"
														value="<?php echo (isset($singleTestConfiguration->question_count) && !empty($singleTestConfiguration->question_count)) ? $singleTestConfiguration->question_count : ''; ?>"
														tabindex="" required>
													<img src="./images/eye-close.png" class="eye_icon togglePassword"
														data-target="pass1">
												</div>
											</div>
											<div class="col-md-4 ">
												<div class="form-group">
													<label class="control-label">Permanent Address<span class="required"
															aria-required="true">*</span></label>
													<textarea class="form-control" placeholder="Permanent Address"
														name="per_address" required></textarea>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Current Address<span class="required"
															aria-required="true">*</span></label>
													<textarea class="form-control" placeholder="Current Address"
														name="curr_address" required></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<center>
											<button type="submit" class="btn green save_intern_data"
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

	<script>
		document.querySelectorAll('.togglePassword').forEach(function (eyeIcon) {
			eyeIcon.addEventListener("click", function () {
				var passwordField = document.getElementById(eyeIcon.getAttribute('data-target'));

				if (passwordField.type === "password") {
					passwordField.type = "text";
					eyeIcon.src = "./images/vector.png";  // Open eye image
				} else {
					passwordField.type = "password";
					eyeIcon.src = "./images/eye-close.png"; // Closed eye image
				}
			});
		});
	</script>

	<script>
		$(document).on('click', '.save_intern_data', function (e) {
			var form = '#fetch_test';
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);

			$(form).validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				ignore: "",  // validate all fields including form hidden input
				rules: {
					section_name: {
						required: true
					},
					section: {
						required: true
					},
					ans_option: {
						required: true
					},
					dept_name: {
						required: true
					},
					location: {
						required: true
					},
					test_name: {
						required: true
					},
					question_count: {
						required: true
					},
					negative_marking: {
						required: true
					},
					total_mark: {
						required: true
					},
					test_time: {
						required: true
					},
					test_datetime: {
						required: true
					},
					password_org: {
						required: true,
						minlength: 8
					},
					password_confirm: {
						required: true,
						minlength: 8,
						equalTo: "#pass" // Ensure it matches the password_org field
					}
				},

				invalidHandler: function (event, validator) { //display error alert on form submit              
					success.hide();
					error.show();
					Metronic.scrollTo(error, -200);
				},

				errorPlacement: function (error, element) { // render error placement for each input type
					var icon = $(element).parent('.input-icon').children('i');
					icon.removeClass('fa-check').addClass("fa-warning");
					icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
				},

				highlight: function (element) { // highlight error inputs
					$(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
				},

				unhighlight: function (element) { // revert the change done by highlight
					// Any additional actions when validation passes can go here
				},

				success: function (label, element) {
					var icon = $(element).parent('.input-icon').children('i');
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
					icon.removeClass("fa-warning").addClass("fa-check");
				},

				submitHandler: function (form) {
					// Custom check for password matching
					var password = $("#pass").val();
					var confirmPassword = $("#pass1").val();
					if (password !== confirmPassword) {
						// If passwords do not match, show the custom alert
						bootbox.alert("Please enter correct passwords");
						return false; // Prevent form submission
					}

					$('.save_intern_data').prop('disabled', true);
					var url = $(form).attr('action');
					var tbDiv = $(form).data('tbdiv');
					var tbUrl = $(form).data('tburl');
					var id = $(form).find('.save_intern_data').attr('rel');
					var serialize_data = $(form).serialize();
					serialize_data = { serialize_data: serialize_data, id: id };

					$(form).ajaxSubmit({
						dataType: 'json',
						data: serialize_data,
						success: function (data) {
							bootbox.alert(data.msg, function () {
								resetForm(form);
								location.reload();
							});
						},
						complete: function (data) {
							// divUnblockUi();
						}
					});
				}
			});
		});


	</script>



</body>

</html>