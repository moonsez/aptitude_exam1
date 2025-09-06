<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Online Test  </title>
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
	<link rel="stylesheet" type="text/css" href="css/jquery.countdown.css"> 
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
	<style type="text/css">
		.inline-display p{
			display: inline;	
		}		
	</style>
</head>
<body class="page-header-fixed  page-sidebar-closed">
	<?php $this->load->view('header');?>
	<div class="clearfix">
	</div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">	
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="">				
				<div class="row">
					<!-- <form action="javascript:void(0);" rel="submit_test" id="test_form" > -->
						<div class="col-md-1"></div>
						<div class="col-md-9 ">									
							<div class=" question_group question_group_1 " rel="5">
								<div class="portlet light" >
									<center>
										<div class="portlet-title">
											<div class="caption">
												<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
												<span class="bold uppercase" style="font-size: 15px;">Section-2 : Speed test</span>		
												<p>When you are ready to begin the typing speed test, copy the sample text below, and then click Submit button.</p>								
											</div>
										</div>
									</center>			
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="portlet light" >
											<div class="portlet-title">
												<div class="caption">
													<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
													<span class="caption-subject font-green-sharp bold uppercase">Sample text:</span>			
												</div>									
											</div>
											<div class="portlet-body portlet-section" style="min-height:390px;" id="portlet-section" >
												<?php //print_r($passage_data);?>
												<div class="scroller" disabled style="height:390px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
													<?php if(isset($passage_data) && !empty($passage_data)) 
													{ $language=$this->session->userdata('language_id'); ?>
														<p style="text-align:justify;" class="<?php echo (isset($language) && !empty($language) && $language=='1' )?'marathi':'';?>"> <?php echo (isset($passage_data->passage) && !empty($passage_data->passage))?$passage_data->passage:'';?></p>
													<?php }?>
												</div>								
											</div>								
										</div>
									</div>
									<div class="col-md-6">
										<div class="portlet light">
											<div class="portlet-title">
												<div class="caption">
													<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
													<span class="caption-subject font-green-sharp bold uppercase">Question 1 :</span>										
												</div>									
											</div>	

											<div class="portlet-body form" style="">
												<!-- BEGIN FORM-->
												<form action="javascript:;" class="horizontal-form">
													<div class="form-body">																					
														<!-- <div class="form-group"> -->
																<input type="hidden" class="form-control" name="passage_id" id="passage_id" value="<?php echo (isset($passage_data->passage_id) && !empty($passage_data->passage_id) )?$passage_data->passage_id:''; ?>" >
															<?php $language=$this->session->userdata('language_id'); ?>
															<textarea style="resize:none; width:100% " class="<?php echo (isset($language) && !empty($language) && $language=='1' )?'marathi':'';?>" rows="11" name="typingTest" id="typingTest"></textarea>															
														<!-- </div> -->
													</div>
													<!-- <div class="form-actions"> -->
														<div class="row">
															<div class="col-md-12">
																<button type="submit" class="btn blue pull-right" id="saveTyping">Submit</button>																
															</div>
														</div>
													<!-- </div> -->
												</form>
												<!-- END FORM-->
											</div>							
											<?php /*<div class="portlet-body " style="min-height:344px;">
												<div class="inline-display"  style="font-size:15px;font-weight:bold;" >
												  	<textarea style="resize:none; width:100%" rows="15"></textarea>
												</div>
											</div>
											<div class="portlet-footer pull-right">
												<div class="col-md-12">
													<button class="btn blue que_next_prev" rel="1_2" type="button" style="float:right;">Next</button>									
												</div>
											</div>*/?>
										</div>
									</div>	
								</div>														
							</div>						
						</div>	
						<div class="col-md-2">
							<div class="test_countdown" style="width: 185px; height: 45px;"></div>				
						</div>
					<!-- </form>	 -->
				</div>			
			</div>
		</div>
	</div>
	<?php $this->load->view('footer');?>
	<!-- END FOOTER --><!-- END FOOTER -->

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
	<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url();?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/holder.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>js/custom_g.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.plugin.js"></script> 
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.countdown.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script>

	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
	jQuery(document).ready(function() {       
	   // initiate layout and plugins
	   Metronic.init(); // init metronic core components
	   Layout.init(); // init current layout
	   Demo.init(); // init demo features
	   UIGeneral.init();
	   //window.history.forward();

	  	$('.test_countdown').countdown({until: 7* 60 , onExpiry: speed_passage_section_expiry});
	   /*next_prev*/
	});

	/*$.fn.disableSelection = function() {
		return this
		.attr('unselectable', 'on')
		.css('user-select', 'none')
		.css('-moz-user-select', 'none')
		.css('-khtml-user-select', 'none')
		.css('-webkit-user-select', 'none')
		.on('selectstart', false)
		.on('contextmenu', false)
		.on('keydown', false)
		.on('mousedown', false);
	};*/

	//$('.portlet-section').disableSelection();	
	</script>
	<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
