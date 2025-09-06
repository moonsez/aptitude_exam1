<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD --> 
<head>
<meta charset="utf-8">
<title>Online Test | Subdepartment</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME STYLES -->

<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>  
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/css/components.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/css/plugins.css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<!-- END THEME STYLES -->

<link rel="shortcut icon" href="favicon.ico">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" cla!-->
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
				
				<li class="active">
					Subdepartment Form
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">	
					<div class="row form">
					    <div class="col-md-12">
							<div class="portlet box blue-hoki">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Subdepartment Form
									</div>							
								</div>
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<form action="save_sub_section" data-tbdiv="#sectionDetailsDiv" data-tburl="fetch_sub_section" id="sub_section_form" class="horizontal-form" method="post" enctype="multipart/form-data">
										<div class="form-body">
											<!--/row-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" > Department <span class="required" aria-required="true">*</span></label>
														<select class="form-control select2me " tabindex="1" name="section">
															<option value="">Select</option>
															<?php foreach ($sectionData as $key) 
															{ ?>
																<option value="<?php echo $key->section_id; ?>" <?php echo (isset($sub_section->section_id) && !empty($sub_section->section_id) && ($sub_section->section_id==$key->section_id))?'selected="selected"':''; ?> > <?php echo $key->section_name; ?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
													<div class="col-md-6 ">
			                                        <div class="form-group">
			                                            <label class="control-label"> Sub Department Name<span class="required" aria-required="true">*</span></label>
			                                            <input type="text" class="form-control" placeholder=" Sub Departmrnt Name" name="sub_section_name" value="<?php echo (isset($sub_section->sub_section_name) && !empty($sub_section->sub_section_name))?$sub_section->sub_section_name:'';?>" tabindex="">
			                                        </div>
			                                   	</div>		
													
									       </div>
										<div class="form-actions">
											<center>
												<button type="submit" class="btn green common_save" rel="<?php echo (isset($sub_section->sub_section_id) && !empty($sub_section->sub_section_id))?$sub_section->sub_section_id:''?>">
													<?php if(isset($sub_section->sub_section_id) && !empty($sub_section->sub_section_id))
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
			<div id="questionDetailsDiv">
				<?php $this->load->view('admin/master_form/subdepartment_table');?>	
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- END PAGE CONTAINER -->
<?php $this->load->view('admin/footer');?>
<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
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
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

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
<script src="<?php echo base_url();?>js/plugins.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>js/common.js"></script>

<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   //PluginPickers.init();
   TableAdvanced.init();
   Demo.init(); // init demo(theme settings page)
});
</script>
<script>
var s = document.createElement('script'); 
s.setAttribute('src','./js/lang.js?lang=Marathi&key=421aa90e079fa326b6494f812ad13e79');
s.setAttribute('id','qpd_script'); 
document.head.appendChild(s);
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>