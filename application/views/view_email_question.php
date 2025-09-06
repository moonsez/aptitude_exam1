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
<link href="<?php echo base_url();?>assets/admin/pages/css/inbox.css" rel="stylesheet" type="text/css"/>
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
	<!-- BEGIN SIDEBAR -->

	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="">
			
			<div class="page-head">
			</div>
			
			<div class="row">
		

				<div class="col-md-1">
				</div>
				<div class="col-md-10 ">
				<div class="question_group" rel="">
						<div class="portlet light" >
							<center>
								<div class="portlet-title">
											<div class="caption">
												<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
												<span class=" bold uppercase" style="font-size: 22px;">Email Question</span>
												<div class="test_countdown" style="width: 185px; height: 45px;float: right;	"> 8</div>													
											</div>											
										</div>
							</center>			
						</div>
								
					<div class="question ">
						<div class="row">
							<div class="col-md-6 reference_1 hide">
								<div class="portlet light" >
								<div class="portlet-title">
										<div class="caption">
											<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
											<span class="caption-subject font-green-sharp bold uppercase">Question</span>
											
										</div>
										
									</div>
									<div class="portlet-body" style="min-height:370px;  pointer-events: none;opacity: 0.5;background: #CCC;" >
									<div class="scroller" style="height:370px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
										<form class="inbox-compose form-horizontal" id="fileupload" action="save_email_content" method="POST" enctype="multipart/form-data">
												<div class="inbox-form-group mail-to">
													<label class="control-label">To:</label>
													<div class="controls controls-to">
														<input type="text" class="form-control" name="to" value="<?php echo (isset($email->to) && !empty($email->to) )?$email->to:''; ?>" >
														
													</div>
												</div>
												<div class="inbox-form-group input-cc <?php echo (isset($email->cc) && !empty($email->cc) )?'':'display-hide'; ?>">
													<a href="javascript:;" class="close">
													</a>
													<label class="control-label">Cc:</label>
													<div class="controls controls-cc">
														<input type="text" name="cc" class="form-control" value="<?php echo (isset($email->cc) && !empty($email->cc) )?$email->cc:''; ?>">
													</div>
												</div>
												<div class="inbox-form-group input-bcc <?php echo (isset($email->bcc) && !empty($email->bcc) )? '':'display-hide'; ?>">
													<a href="javascript:;" class="close">
													</a>
													<label class="control-label">Bcc:</label>
													<div class="controls controls-bcc">
														<input type="text" name="bcc" class="form-control" value="<?php echo (isset($email->bcc) && !empty($email->bcc) )?$email->bcc:''; ?>">
													</div>
												</div>
												<div class="inbox-form-group">
													<label class="control-label">Subject:</label>
													<div class="controls">
														<input type="text" class="form-control marathi" name="subject" value="<?php echo (isset($email->subject) && !empty($email->subject) )?$email->subject:''; ?>">
													</div>
												</div>
												<div class="inbox-form-group">
													<textarea class="inbox-editor inbox-wysihtml5 form-control marathi" name="message" rows="9"><?php echo (isset($email->message) && !empty($email->message) )?$email->message:''; ?></textarea>
												</div>
												<div class="inbox-compose-attachment">
													<div class="input-group col-md-3">
														<label class="control-label">Attachment:</label>
													</div>
													<div class="input-group col-md-3">
													
														<input type="text" placeholder="" name="attachment_file" class="form-control" value="<?php echo (isset($email->attachment_file) && !empty($email->attachment_file) )?$email->attachment_file:''; ?>">
														<span class="input-group-addon attachment_btn" style="cursor:pointer;">
														<i class="fa fa-paperclip"></i>
														</span>
													</div>
												</div>
												
												<div class="inbox-compose-btn">
													<center>
														<button class="btn blue common_save" rel="<?php echo (isset($email->email_id) && !empty($email->email_id) )?$email->email_id:''; ?>"><i class="fa fa-check"></i>Save</button>
													</center>														
												</div>
											</form>
									</div>			

										
									</div>
									
								</div>
							</div>
							<div class="col-md-6 reference_1">
								<div class="portlet light" >
								<div class="portlet-title">
										<div class="caption">
											<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
											<span class="caption-subject font-green-sharp bold uppercase">Question</span>
											
										</div>
										
									</div>
									<div class="portlet-body" style="min-height:370px;pointer-events:none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;" >
									
										<form class="inbox-compose form-horizontal" id="fileupload" action="javascript:void(0);" method="POST" enctype="multipart/form-data">
												<div class="inbox-form-group mail-to">
													<label class="control-label">To:</label>
													<div class="controls controls-to">
														<input type="text" class="form-control" name="to" value="<?php echo (isset($email->to) && !empty($email->to) )?$email->to:''; ?>" >
														
													</div>
												</div>
												<div class="inbox-form-group input-cc <?php echo (isset($email->cc) && !empty($email->cc) )?'':'display-hide'; ?>">
													
													<label class="control-label">Cc:</label>
													<div class="controls controls-cc">
														<input type="text" name="cc" class="form-control" value="<?php echo (isset($email->cc) && !empty($email->cc) )?$email->cc:''; ?>">
													</div>
												</div>
												<div class="inbox-form-group input-bcc <?php echo (isset($email->bcc) && !empty($email->bcc) )? '':'display-hide'; ?>">
													
													<label class="control-label">Bcc:</label>
													<div class="controls controls-bcc">
														<input type="text" name="bcc" class="form-control" value="<?php echo (isset($email->bcc) && !empty($email->bcc) )?$email->bcc:''; ?>">
													</div>
												</div>
												<?php $language=$this->session->userdata('language_id'); ?>
												<div class="inbox-form-group">
													<label class="control-label">Subject:</label>
													<div class="controls">
														<input type="text" class="form-control <?php echo (isset($language) && !empty($language) && $language=='1' )?'marathi':'';?>" name="subject" value="<?php echo (isset($email->subject) && !empty($email->subject) )?$email->subject:''; ?>">
													</div>
												</div>
												<div class="inbox-form-group">
													<textarea class="inbox-editor inbox-wysihtml5 form-control <?php echo (isset($language) && !empty($language) && $language=='1' )?'marathi':'';?>" name="message" rows="9"><?php echo (isset($email->message) && !empty($email->message) )?$email->message:''; ?></textarea>
												</div>
												<div class="inbox-compose-attachment">
													<div class="input-group col-md-6">
														<label class="control-label">Attachment:</label>
													</div>
													<div class="input-group col-md-6">
													
														<input type="text" placeholder="" name="attachment_file" class="form-control " value="<?php echo (isset($email->attachment_file) && !empty($email->attachment_file) )?$email->attachment_file:''; ?>">
														<span class="input-group-addon attachment_btn" style="cursor:pointer;">
														<i class="fa fa-paperclip"></i>
														</span>
													</div>
												</div>
												
												<div class="inbox-compose-btn">
													<center>
														<button class="btn blue " rel=""><i class="fa fa-check"></i>Send</button>
													</center>	
													
												</div>
											</form>
											

										
									</div>
									
								</div>
							</div>
							<div class="col-md-6">
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption">
											<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
											<span class="caption-subject font-green-sharp bold uppercase">Answer :</span>
											
										</div>
										
									</div>
									
										<div class="portlet-body " style="min-height:344px;">
											<form class="inbox-compose form-horizontal" action="javascript:void(0);" method="POST" enctype="multipart/form-data" rel="submit_email_test" id="test_form">
												<div class="inbox-form-group mail-to">
													<label class="control-label">To:</label>
													<div class="controls controls-to">
														<input type="text" class="form-control" name="to" value="" >
														<input type="hidden" class="form-control" name="email_id" value="<?php echo (isset($email->email_id) && !empty($email->email_id) )?$email->email_id:''; ?>" >

														<!-- <span class="inbox-cc-bcc">
														<span class="inbox-cc">
														Cc </span>
														<span class="inbox-bcc">
														Bcc </span>
														</span> -->
													</div>
												</div>
												<div class="inbox-form-group input-cc display-hide">
													<a href="javascript:;" class="close">
													</a>
													<label class="control-label">Cc:</label>
													<div class="controls controls-cc">
														<input type="text" name="cc" class="form-control" value="">
													</div>
												</div>
												<div class="inbox-form-group input-bcc display-hide">
													<a href="javascript:;" class="close">
													</a>
													<label class="control-label">Bcc:</label>
													<div class="controls controls-bcc">
														<input type="text" name="bcc" class="form-control" value="">
													</div>
												</div>
												<?php $language=$this->session->userdata('language_id'); ?>
												<div class="inbox-form-group">
													<label class="control-label">Subject:</label>
													<div class="controls">
														<input type="text" class="form-control <?php echo (isset($language) && !empty($language) && $language=='1' )?'marathi':'';?>" name="subject" value="">
													</div>
												</div>
												<div class="inbox-form-group">
													<textarea class="inbox-editor inbox-wysihtml5 form-control <?php echo (isset($language) && !empty($language) && $language=='1' )?'marathi':'';?>" name="message" rows="9"></textarea>
												</div>
												<div class="inbox-compose-attachment">
													<div class="input-group col-md-6">
														<label class="control-label">Attachment:</label>
													</div>
													<div class="input-group col-md-6">
													
														<input type="text" placeholder="" name="attachment_file" class="form-control attachment_file" value="">
														<span class="input-group-addon attachment_btn" style="cursor:pointer;">
														<i class="fa fa-paperclip"></i>
														</span>
													</div>
												</div>
												
												<div class="inbox-compose-btn">
													<center>
														<button class="btn blue btn_submit_test" rel=""><i class="fa fa-check"></i>Send</button>
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
<script src="<?php echo base_url();?>assets/admin/pages/scripts/inbox.js" type="text/javascript"></script>
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
   Inbox.init();
   window.history.forward();

   $('.test_countdown').countdown({until:8 * 60 , onExpiry: email_section_expiry});
   /*next_prev*/
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
