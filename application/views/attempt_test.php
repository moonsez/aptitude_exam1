<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>Online Test </title>
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
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components"
		rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css" />
	<link id="style_color" href="<?php echo base_url(); ?>assets/admin/layout4/css/themes/light.css" rel="stylesheet"
		type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.countdown.css">
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
	<style type="text/css">
		.inline-display p {
			display: inline;

		}

		.mark_review.btn {
			color: #FFFFFF;
			background-color: #3e85c3 !important;
			border-color: "";
		}

		.clear.btn {
			color: #FFFFFF;
			background-color: #d54c49 !important;
			border-color: "";
		}
	</style>

</head>
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
		<!-- BEGIN SIDEBAR -->

		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="">
				<div class="row">
					<form action="javascript:void(0);" rel="submit_test" id="test_form">
					<input type="hidden" name="start_time" id="start_time">

						<div class="col-md-1"> </div>
						<div class="col-md-8 ">
							<?php $hidden_question_array = array();
							if (isset($question_data) && !empty($question_data)) {
								$k = 0;
								$section_count = count($question_data);
								foreach ($question_data as $key) {
									$k++;
									//echo $k."<br/>";
									$section = $key['section'];
									$question_list = $key['question_list'];
									?>
									<!-- BEGIN ALERTS PORTLET-->
									<div class=" question_group question_group_<?php echo $k; ?> <?php if ($k > 1)
											echo 'hide'; ?>" rel="<?php echo $section_count; ?>">
										<div class="portlet light" style="width: 100%;margin-left: -96px;">
											<center>
												<div class="portlet-title">
													<div class="caption">
														<span class=" bold uppercase" style="font-size: 15px;">Test Name :
															Aptitude Test
															<?php //echo (isset($section->section_name) && !empty($section->section_name)) ?$section->section_name:'';	 ?></span>
													</div>
												</div>
											</center>

										</div>
										<?php $language = $this->session->userdata("language");
										if (isset($question_list) && !empty($question_list)) {
											$i = 0;
											foreach ($question_list as $que_key) {
												$i++;
												$question = $que_key['question'];
												$option = $que_key['option'];
												$hidden_question_array[] = $question->question_id;
												?>
												<div class="question question_<?php echo $k; ?>_<?php echo $i; ?> <?php if ($i > 1)
														   echo 'hide'; ?>">
													<div class="row">
														<div class="col-md-6 reference_1 hide ">
															<div class="portlet light">
																<div class="portlet-title">
																	<div class="caption">
																		<span
																			class="caption-subject font-green-sharp bold uppercase">Reference</span>
																	</div>
																</div>
																<div class="portlet-body" style="min-height:370px;">
																	<div class="scroller" style="height:370px" data-always-visible="1"
																		data-rail-visible="1" data-rail-color="blue"
																		data-handle-color="red">
																		<?php echo (isset($question->reference_desc) && !empty($question->reference_desc)) ? $question->reference_desc : ''; ?>
																		<?php if (isset($question->reference_image) && !empty($question->reference_image)) { ?>
																			<img src="<?php echo base_url(); ?>uploads/test/<?php echo $question->reference_image; ?>"
																				style="max-width:436px;" /> <?php } ?>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="portlet light" style="width: 100%;margin-left: -96px;">
																<div class="portlet-title">
																	<div class="caption">
																		<span
																			class="caption-subject font-green-sharp bold uppercase">Question
																			<?php echo $i; ?> :</span>
																	</div>
																	<!--<div class="inputs">
																	<div class="portlet-input input-inline input-small">
																		<select class="form-control select2me lang_change" tabindex="1" name="section">
																			<option value="English" <?php echo (isset($language) && !empty($language) && ($language == 'English')) ? 'selected="selected"' : ''; ?>>English</option>
																			<option value="Marathi" <?php echo (isset($language) && !empty($language) && ($language == 'Marathi')) ? 'selected="selected"' : ''; ?>>Marathi</option>
																		</select>
																	</div>
																</div>!-->
																</div>
																<div class="portlet-body " style="min-height:344px;">
																	<div class="inline-display que_english"
																		style="font-size:15px;font-weight:bold; <?php echo (isset($language) && !empty($language) && ($language == 'English')) ?>">
																		<?php echo (isset($question->question) && !empty($question->question)) ? htmlentities($question->question) : ''; ?>
																	</div>
																	<!--<div class="inline-display que_marathi"  style="font-size:15px;font-weight:bold; <?php echo (isset($language) && !empty($language) && ($language == 'Marathi')) ? '' : 'display:none;'; ?>" >
																  <?php echo (isset($question->question_mar) && !empty($question->question_mar)) ? $question->question_mar : ''; ?>
																</div>!-->
																	<p>
																		<?php if (isset($question->question_image) && !empty($question->question_image)) { ?>
																			<img src="<?php echo base_url(); ?>uploads/test/<?php echo $question->question_image; ?>"
																				style="max-width:400px;" />
																		<?php } ?>
																	</p>
																	<div class="radio-list">
																		<?php if (isset($option) && !empty($option)) {
																			foreach ($option as $row) { ?>
																				<label><input class="que_option"
																						rel="btn_<?php echo (isset($section->dept_master_id) && !empty($section->dept_master_id)) ? $section->dept_master_id : ''; ?>_<?php echo $i; ?>"
																						type="radio"
																						name="answer_<?php echo (isset($question->question_id) && !empty($question->question_id)) ? $question->question_id : ''; ?>"
																						id="optionsRadios1"
																						value="<?php echo $row->option_id; ?>">
																					<?php echo $row->option; ?>
																					<?php if (isset($row->option_image) && !empty($row->option_image)) { ?>
																						<img
																							src="<?php echo base_url(); ?>uploads/test/<?php echo $row->option_image; ?>" />
																					<?php } ?>
																				</label>
																			<?php }
																		} ?>
																	</div>
																</div>
																<div class="portlet-footer">
																	<div class="row">
																		<div class="col-md-6" style="float:left;">
																			<button class="btn mark_review que_mark_review"
																				rel="<?php echo $k; ?>_<?php echo $i - 1; ?>"
																				type="button" style="float:left;">Mark For
																				Review</button>
																			<?php if ($i > 1) { ?>
																				<button class="btn blue que_next_prev"
																					rel="<?php echo $k; ?>_<?php echo $i - 1; ?>"
																					type="button"
																					style="float:left; margin-left: 20px; background-color: #eda840 !important;">Previous</button>
																			<?php } ?>
																		</div>
																		<div class="col-md-6">
																			<?php if ($i >= count($question_list)) { ?>
																				<button class="btn blue btn_submit_test" rel=""
																					type="button"
																					style="float:right; background-color: #56af55 !important;">Submit
																					Test</button>
																			<?php } else { ?>
																				<button class="btn clear que_clear_res"
																					rel="<?php echo $k; ?>_<?php echo $i + 1; ?>"
																					type="button" style="float:right;">Clear
																					Response</button>
																				<button class="btn blue que_next_prev"
																					rel="<?php echo $k; ?>_<?php echo $i + 1; ?>"
																					type="button"
																					style="float:right;margin-right: 20px; background-color: #eda840 !important;">Next</button>
																			<?php } ?>
																		</div>
																		<!-- Loader code -->
																		<div id="test_response">
																			<!-- Background Blur Effect -->
																			<div id="overlay"
																				style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px); z-index: 9998;">
																			</div>

																			<center>
																				<div id="loader" class="loader_gif"
																					style="display: none !important; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;  padding: 20px; border-radius: 10px; width: 100px; height: 100px; display: flex; justify-content: center; align-items: center;">
																					<img src="<?php echo base_url(); ?>assets/global/img/loader_1.gif"
																						style="position: fixed;top: 20%;left: 50%;transform:translate(-50%, -50%);width: 150px;height: 150px;" />
																				</div>
																			</center>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											<?php }
										} ?>
									</div>
									<!-- END ALERTS PORTLET-->
								<?php }
							} ?>
						</div>
						<div class="col-md-2">
							<?php if (isset($question_data) && !empty($question_data)) {
								$k = 0;
								foreach ($question_data as $key) {
									$k++;
									$section = $key['section'];
									$question_list = $key['question_list'];
									?>
									<div class="question_group question_group_<?php echo $k; ?> <?php if ($k > 1)
											echo 'hide'; ?>">
										<div class="portlet light" style="padding:2px; margin-left: -70px;width: 167%;">
											<center>
												<div class="portlet-title">
													<div class="caption">
														<?php
														$test_time = explode(" ", $test_data->test_datetime);
														$test_time = $test_time[1];
														date_default_timezone_set('Asia/Kolkata');
														$current_time = date('H:i:s');


														$date1_timestamp = strtotime($current_time);
														$date2_timestamp = strtotime($test_time);

														$time_diff = $date1_timestamp - $date2_timestamp;

														$minutes = floor($time_diff / 60);


														$new_t = $test_data->test_time - $minutes;

														if (!empty($new_test_time)) { ?>
															<div class="test_countdown" style="width: 185px; height: 45px;">
																<?php echo (isset($new_test_time) && !empty($new_test_time)) ? $new_test_time : ''; ?>
															</div>
														<?php } elseif (!empty($test_data->test_time)) { ?>
															<div class="test_countdown" style="width: 185px; height: 45px;">
																<?php echo (isset($new_t) && !empty($new_t)) ? $new_t : ''; ?>
															</div>
														<?php } else { ?>
															<div class="test_countdown" style="width: 185px; height: 45px;">
																<?php echo (isset($section->test_time) && !empty($section->test_time)) ? $section->test_time : ''; ?>
															</div>
														<?php } ?>
													</div>
												</div>
											</center>
										</div>
										<div class="portlet light" style="margin-left: -72px;width: 167%;">
											<div class="portlet-title">
												<div class="caption">
													<span class="caption-subject font-green-sharp bold uppercase">Question No
														<input type="hidden" name="test_id"
															value="<?php echo (!empty($test_data->test_configuration_id)) ? $test_data->test_configuration_id : ''; ?>"></span>

												</div>
											</div>
											<div class="portlet-body" style="min-height:370px;">
												<div class="row">
													<div class="col-md-12">
														<div class="btn-group">
															<?php if (isset($question_list) && !empty($question_list)) {
																$i = 0;
																foreach ($question_list as $que_key) {
																	$i++;
																	$question = $que_key['question'];
																	$option = $que_key['option'];
																	?>
																	<button type="button" style="width:38px;"
																		rel="<?php echo $k . '_' . $i; ?>"
																		class="btn btn-default que_next_prev btn_<?php echo (isset($section->dept_master_id) && !empty($section->dept_master_id)) ? $section->dept_master_id : ''; ?>_<?php echo $i; ?>"><?php echo $i; ?></button>
																<?php }
															} ?>
														</div>
													</div>

												</div>
												<div class="caption" style="margin-top: 25px;"> 
        <span class="caption-subject font-green-sharp bold uppercase">
            Question Status
        </span>
    </div>

    <!-- Question Marked for Review -->
    <div style="margin-bottom: 10px;">
        <div style="display: flex; align-items: center;">
         <p style="margin: 0;">Question marked for review</p>
            <div style="width: 15px; height: 15px;  display: inline-block; text-align: center; line-height: 30px; font-size: 18px; font-weight: bold; color: #fff; background-color: #3e85c3; margin-right: 10px; position: relative; margin-left:10px;">
                <span style="position: relative; top: -1px;"></span>
            </div>
           
        </div>
    </div>

    <!-- Question Answered -->
    <div style="margin-bottom: 10px;">
        <div style="display: flex; align-items: center;">
        <p style="margin: 0;">Question answered</p>
            <div style="width: 15px; height: 15px;  display: inline-block; text-align: center; line-height: 30px; font-size: 18px; font-weight: bold; color: #fff; background-color: green; margin-right: 10px; position: relative; margin-left:10px;">
                <span style="position: relative; top: -1px;"></span>
            </div>
            
        </div>
    </div>

    <!-- Cleared / Not Attempted -->
    <div>
        <div style="display: flex; align-items: center;">
         <p style="margin: 0;">Cleared / Not attempted</p>
            <div style="width: 15px; height: 15px;  display: inline-block; text-align: center; line-height: 30px; font-size: 18px; font-weight: bold; color: #333; background-color: #fff; border: 2px solid #ccc; margin-right: 10px; position: relative; margin-left:10px;">
                <span style="position: relative; top: -1px;"></span>
            </div>
           
        </div>
    </div>
											</div>
										</div>
									</div>
								<?php }
							} ?>
						</div>
						<div class="col-md-1"> </div>
						<input type="hidden" name="hidden_question_list"
							value="<?php echo base64_encode(serialize($hidden_question_array)); ?>" />
					</form>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
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
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/holder.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/custom_g.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.plugin.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.countdown.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/attempt_test.js"></script>
	<script>
		jQuery(document).ready(function () {
			// initiate layout and plugins
			Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features
			UIGeneral.init();

			$(".question_group_" + 1).find('.test_countdown').countdown({ until: $(".question_group_" + 1).find('.test_countdown').html() * 60, onExpiry: section_expiry });
			/*next_prev*/
		});
	</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const now = new Date();
        const formattedDateTime = now.getFullYear() + "-" +
            ("0" + (now.getMonth() + 1)).slice(-2) + "-" +
            ("0" + now.getDate()).slice(-2) + " " +
            ("0" + now.getHours()).slice(-2) + ":" +
            ("0" + now.getMinutes()).slice(-2) + ":" +
            ("0" + now.getSeconds()).slice(-2);

        document.getElementById("start_time").value = formattedDateTime;
    });
</script>

</body>
<!-- END BODY -->

</html>