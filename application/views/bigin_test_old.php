<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Online Test | Instruction </title>
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
<?php $this->load->view('header');?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="row">	
			<div class="col-md-1">
			</div>			
			<div class="col-md-10">
				<!-- BEGIN ALERTS PORTLET-->
				<div class="portlet light portlet_1" style="min-height:380px;">
					<div class="portlet-title">
						<div class="caption">
							<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
							<span class="caption-subject font-green-sharp bold uppercase"><?php echo (isset($test_data->test_name) && !empty($test_data->test_name))? $test_data->test_name :'';?></span>
							<span class="caption-helper">Instructions Page 1 of 3</span>
							<br><h4> रीक्षार्थींसाठी  रीक्षेसबंंधी सवसवाधारण माहिती व सूचना :</h4>
						</div>							
					</div>
					<div class="portlet-body" style="height:400px;">
						<p style="font-size:11pt; padding:10px;"><b>एकूण गुण :- </b>100 (वस्तुननष्ठ (Objective) 50 + प्रात्यक्षक्षक (Practical) 50) </p>
						<p style="font-size:11pt; padding:10px;"><b>रीक्षा कालावधी :-</b> 90  मिनिटे</p>
						<p style="font-size:11pt; padding:10px;">प्रश्न 1 :- कॉम्प्युटर अभ्यासक्रमावर आधाररत ऑब्जेक्टटव प्रश्न – गुण 50  </p>
						<p style="font-size:11pt; padding:10px; text-align:center;"><b>प्रश्न 1 :- कॉम्प्युटर अभ्यासक्रमावर आधाररत ऑब्जेक्टटव प्रश्न – गुण 50  (कालावधी 25 मिनिटे)  </b></p>
						<table width="70%" style="margin-left:50px; width:91%; " class="table table-bordered">
							<tr>
								<th style="text-align:center;">प्रश्न</th>
								<th style="text-align:center;">वेळ (ममननटांमध्ये) </th>
								<th style="text-align:center;">एकूण गुण </th>
								<th style="text-align:center;"> ास िोण्यासाठी ककमान गुण (52%) </th>
							</tr>						
							<tr>
								<td style="text-align:center;">वस्तुनिष्ठ प्रश्ि </td>
								<td style="text-align:center;">25</td>
								<td style="text-align:center;">50</td>
								<td style="text-align:center;">26</td>
							</tr>
						</table>
						<p style="font-size:11pt; padding:10px;">एकूण 25 वस्तुनिष्ठ (ऑब्जेक्टीव) बहुपर्ाार्ी प्रश्ि असतील. प्रत्र्ेक बरोबर उत्तरासाठी 2 गुण असतील. उत्तीण ाहोण्र्ासाठी परीक्षार्थीिे ककिाि 13 प्रश्िाांची बरोबर उत्तरे देणे आवश्र्क आहे. म्हणजेच उत्तीण ाहोण्र्ासाठी 50 पकैी 26 गुण मिळणे अनिवार् ाराहील. (टीप: सदर वस्तुनिष्ठ प्रश्ि िराठी/इांग्रजी/हहदांी र्ा तीिही भाषाांिध्र्े वाचता र्ेतील.) </p>

					</div>
					<div class="portlet-footer">
						<div class="row">
							<div class="col-md-6" style="float:left;">
							</div>
							<div class="col-md-6" >
								<button class="btn blue next_prev" rel="2" type="button" style="float:right;">Next</button>
							</div>
						</div>
					</div>
				</div>
				<!-- END ALERTS PORTLET-->

				<!-- BEGIN ALERTS PORTLET-->
				<div class="portlet light portlet_2" style="display:none; min-height:380px;">
					<div class="portlet-title">
						<div class="caption">
							<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
							<span class="caption-subject font-green-sharp bold uppercase"><?php echo (isset($test_data->test_name) && !empty($test_data->test_name))? $test_data->test_name :'';?></span>
							<span class="caption-helper">Instructions Page 2 of 3</span>
							<br><h4> रीक्षार्थींसाठी  रीक्षेसबंंधी सवसवाधारण माहिती व सूचना :</h4>
						</div>							
					</div>
					<div class="portlet-body" style="min-height:400px;">
						<p style="font-size:11pt; ">कॉम्प्युटर प्रॅक्टटकल  रीक्षा : गुण 50 (कालावधी 65 ममननटे) </p> 
						<table width="70%" style="margin-left:50px; width:91%; " class="table table-bordered">
							<tr>
								<th style="text-align:center;">प्रश्न</th>
								<th style="text-align:center;">वेळ (ममननटांमध्ये) </th>
								<th style="text-align:center;">एकूण गुण </th>
								<th style="text-align:center;"> ास िोण्यासाठी ककमान गुण (50%प्रत्येकी) </th>
							</tr>						
							<tr>
								<td style="text-align:center;">इिेल / Email </td>
								<td style="text-align:center;">08</td>
								<td style="text-align:center;">05</td>
								<td style="text-align:center;">2.5</td>
							</tr>
							<tr>
								<td style="text-align:center;">पत्र / Letter  </td>
								<td style="text-align:center;">30</td>
								<td style="text-align:center;">15</td>
								<td style="text-align:center;">7.5</td>
							</tr>
							<tr>
								<td style="text-align:center;">तक्ता / Statement </td>
								<td style="text-align:center;">20</td>
								<td style="text-align:center;">10</td>
								<td style="text-align:center;">5</td>
							</tr>
							<tr>
								<td style="text-align:center;">गती उतारा / Speed Passage  </td>
								<td style="text-align:center;">07</td>
								<td style="text-align:center;">20</td>
								<td style="text-align:center;">10</td>
							</tr>
							<tr>
								<td style="text-align:center;"><b>एकूण</b> </td>
								<td style="text-align:center;">65</td>
								<td style="text-align:center;">50</td>
								<td style="text-align:center;">25</td>
							</tr>
						</table>
						<br>
						<p style="font-size:11pt; ">प्रत्र्ेक प्रश्िासाठी वरीलप्रिाणे कालावधी देण्र्ात आलेला आहे. सांगणकाच्र्ा स्रीिवर वरील उजव्र्ा बाजूला Timer हदसेल.  वेळे आधी प्रश्ि पूणा झाल्र्ास सबमिट करण्र्ाचे Guidelines - GCC - TBC 30 w.p.m.                           Page 2 स्वातांत्र्र् ववद्र्ार्थर्ााला हदलेले आहे. परांतु जर त्र्ा प्रश्नाची  ननक्श्चत केलेली वेळ सं ली तर प्रश्न automatic submit िोईल.  प्रश्ि ठराववक वेळेआधी पूणा झाला असेल तर ववद्र्ार्थी परत एकदा वाचूि घेऊ शकेल व काही चुका झाल्र्ा असल्र्ास त्र्ा दुरूस्त करूि घेता र्ेतील.   ईिेल, पत्र, तक्ता व गती उतारा सांगणकाच्र्ा स्रीि वर डाव्र्ा बाजूस हदसेल.  त्र्ािुसार ववद्र्ार्थर्ाािे सांगणकाच्र्ा स्रीि वर उजव्र्ा बाजूस जसेच्र्ा तसे टाईप करणे अपेक्षक्षत आहे.  </p>
						<p style="font-size:11pt; "><b>या  रीक्षेतील कोणत्यािी प्रश्नासाठी/ उत्तीणतवेसाठी सवलतीचे गुण (Grace Marks) असणार नािीत याची पवद्यार्थयाांनी नोंद घ्यावी. </b></p>
					</div>
					<div class="portlet-footer">
						<div class="row">
							<div class="col-md-6" style="float:left;">
								<button class="btn blue next_prev" rel="1"  type="button" style="">Previous</button>
							</div>
							<div class="col-md-6" >
								<button class="btn blue next_prev" rel="3" type="button" style="float:right;">Next</button>
							</div>
						</div>
					</div>
				</div>
				<!-- END ALERTS PORTLET-->

				<!-- BEGIN ALERTS PORTLET-->
				<div class="portlet light portlet_3" style="display:none; min-height:380px;">
					<div class="portlet-title">
						<div class="caption">
							<!-- <i class="fa fa-cogs font-green-sharp"></i> -->
							<span class="caption-subject font-green-sharp bold uppercase"><?php echo (isset($test_data->test_name) && !empty($test_data->test_name))? $test_data->test_name :'';?></span>
							<span class="caption-helper">Instructions Page 3 of 3</span>
							<br><h4> रीक्षार्थींसाठी  रीक्षेसबंंधी सवसवाधारण माहिती व सूचना :</h4>
						</div>							
					</div>
					<div class="portlet-body" style="height:400px;">
						<p style="font-size:11pt; padding:10px;">1. Work as fast as you can. If you find a question too difficult or an unsure of an answer, select your best choice and move on quickly.</p>
						<p style="font-size:11pt; padding:10px;">2. Please ensure you do not close the browser or do not disconnect to internet or do not press refresh button  while you are appearing for online test.</p>
						<p style="font-size:11pt; padding:10px;">3. Do not  use the keyboard, instead use mouse for navigation.</p>
						<br><p style="text-align:right;"><b>If you are ready for the test, press 'Start Exam' button to commence online test.</b></p>						
						
					</div>
					<div class="portlet-footer">
						<div class="row">
							<div class="col-md-6" style="float:left;">
								<button class="btn blue next_prev" rel="2" type="button">Previous</button>
							</div>
							<div class="col-md-6" >
								<a class="btn blue" href="<?php echo base_url();?>attempt_test"  style="float:right;">Start Exam</a>
							</div>
						</div>
					</div>
				</div>
				<!-- END ALERTS PORTLET-->
			</div>
			<div class="col-md-1">
			</div>
		</div>
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
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/custom_g.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   UIGeneral.init();
   /*next_prev*/
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>