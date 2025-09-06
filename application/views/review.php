<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Online Test | Result </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo base_url();?>assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<style type="text/css">
	.inline-display p{
	display: inline;
	
}
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="page-header-fixed  page-sidebar-closed">
<?php $this->load->view('header');?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">

		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
	


			<!-- END PAGE HEAD -->
			
			<!-- END PAGE H<div class="col-md-6">EADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
			<div class="col-md-11">
				<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Test Result
							</div>
							
						</div>
						<div class="portlet-body">

						<div class="note note-info note-shadow">
							<center>
							<p>
								<span class="" style="font-size:19px;;">

								<?php 
												echo "Dear ".$obj_result->user_name.": 	
													<br><strong>".$obj_result->correct_count." out of ".$obj_result->total_count."</strong> in Objective test.
													<br><strong>".$email_ans->total_marks." out of 5 </strong> in Email .
													<br><strong>".$passage_ans_data->student_marks." out of 20 </strong> in Speed Passage. "; ?>


								</span>

							</p>
							</center>

						</div>
						<a href="<?php echo base_url();?>" class="btn btn-danger" style="float:right;" type="button">
						  Exit
						</a>
						
							
							<div id="donut" class="chart">
							</div>

							<!-- <h1> Test Review</h1>
							<div class="portlet light">
							
								<div class="portlet-body" >
									<?php 
								$hidden_question_array=array();
								if(isset($question_data) && !empty($question_data)){
									$k=0;
									$section_count=count($question_data);
									foreach ($question_data as $key ) {
										$k++;
										$section=$key['section'];
										$question_list=$key['question_list'];
										?>
									<div class="portlet-title">
										<div class="caption">
											<span class="caption-subject font-green-sharp bold uppercase"> <h3>Section <?php echo $k;?> - <?php echo (isset($section->section_name) && !empty($section->section_name)) ?$section->section_name:'';	?></h3></span>
										</div>
									</div>
									
									<?php if(isset($question_list) && !empty($question_list))
												{	

													$i=0;
												foreach ($question_list as $que_key ) {

														$i++;
														$question=$que_key['question'];
														$option=$que_key['option'];
														$hidden_question_array[]=$question->question_id;
												?>
												
									
										
											
												
												
													
														<div class="inline-display" >
														<?php echo $i;?> . <?php echo (isset($question->question) && !empty($question->question))?$question->question:'';?>
														</div>
														<p>
															<?php if(isset($question->question_image) && !empty($question->question_image)){?>
															<img src="<?php echo base_url();?>uploads/test/<?php echo $question->question_image;?>"  style="max-width:400px;" />
															<?php } ?>
														</p>
														<div class="radio-list">
														<?php 
														$j=0;
														if(isset($option) && !empty($option)){
															foreach ($option as $row) {
																?>
																<label style="<?php if($question->option_id==$row->option_id){ echo 'color:green;';}else if($question->user_ans==$row->option_id){ echo 'color:red;';} ?>">
															[<?php echo $option_name[$j];?>]
															<?php echo $row->option;?>
															<?php if(isset($row->option_image) && !empty($row->option_image)){?>
															<img src="<?php echo base_url();?>uploads/test/<?php echo $row->option_image;?>" />
															<?php } ?>
															</label>
														<?php
															$j++;
																}
															}
															?>
															
															
														
														</div>

														<?php if($question->option_id==$question->user_ans){?>
													
														<div class="alert alert-success">
															<strong>Correct! You made correct Selection</strong>.
														</div>
														<?php }else if($question->user_ans==null) { ?>

															<div class="alert alert-warning">
																 You didn't attempted this question.
															</div>
														<?php	}else{ ?>

															<div class="alert alert-danger">
																<strong>Incorrect!</strong> You made wrong selection.
															</div>
														<?php		} ?>
												
										
										
												<?php		
													}	
												}
												?>
								<?php
									}
									}
									?>

									
								</div>
								
							</div>	 -->
						
						</div>
					</div>	
				
				</div>	
			</div>
			<div class="col-md-1">
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('footer');?>
<!-- END FOOTER -->
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
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
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/holder.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/flot/jquery.flot.min.js"></script>

<script src="<?php echo base_url();?>assets/global/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/custom_g.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/charts-flotcharts.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
   Demo.init(); // init demo features
   UIGeneral.init();
   /*next_prev*/
 ChartsFlotcharts.initPieCharts();
 
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>