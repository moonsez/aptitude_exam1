<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Online Test | Section</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<meta charset="utf-8" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME STYLES -->

<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css" />
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico">


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<?php $this->load->view('admin/header');?>
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
					 Negative MasterForm
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">	
					<div class="row">
					    <div class="col-md-12">
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Negative Mark Form
									</div>							
								</div>
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<form action="save_negative_master_form" data-tbdiv="#referenceDetailsDiv" data-tburl="fetch_negative" id="save_negative_master_form" class="horizontal-form" method="post" enctype="multipart/form-data">
										<div class="form-body">                         
								            <div class="row">
								                <?php /*<div class="col-md-6">
								                    <div class="form-group">
								                        <label class="control-label" >
								                            Question 
								                            <span class="required" aria-required="true">*</span>
								                        </label>
								                        <div class="input-icon right">
								                            <i class="fa"></i>
								                            <input type="text" id="question_name " name="question_name" class="form-control" placeholder="" tabindex="" value="<?php echo (isset($single_reference->question_name) && !empty($single_reference->question_name))?$single_reference->question_name:'';?>">
								                        </div>
								                    </div>
								                </div>*/ ?>
								                <div class="col-md-6">
								                    <div class="form-group">
								                        <label class="control-label" >
								                            Question Mark
								                            <span class="required" aria-required="true">*</span>
								                        </label>
								                        <div class="input-icon right">
								                            <i class="fa"></i>
								                            <input type="text" id="per_mark " name="per_mark" class="form-control" placeholder="" tabindex="" value="<?php echo (isset($single_reference->per_mark) && !empty($single_reference->per_mark))?$single_reference->per_mark:'';?>">
								                        </div>
								                    </div>
								                </div>
								            </div>
								        </div>
										<div class="form-actions">
											<center>
												<button type="submit" class="btn green common_save" rel="<?php echo (isset($single_reference->negative_id) && !empty($single_reference->negative_id))?$single_reference->negative_id:''?>">
													<?php if(isset($single_reference->negative_id) && !empty($single_reference->negative_id))
													{
														echo 'Update';
													}
													else
													{
														echo 'Submit';
													}?>
												</button>
												<button type="button" class="btn red clearData">Clear</button>
											</center>
										</div>										
									</form>
									<!-- END FORM-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div id="referenceDetailsDiv">
				<?php $this->load->view('admin/master_form/negative_table');?>	
			</div>
		</div>		
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- END PAGE CONTAINER -->
<?php $this->load->view('admin/footer');?>

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
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/global/plugins/select2/select2.min.js"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url();?>js/plugins.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>js/common.js"></script>

<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   TableAdvanced.init();
   //PluginPickers.init();
   
   Demo.init(); // init demo(theme settings page)
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>