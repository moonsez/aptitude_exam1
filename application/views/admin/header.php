<style>
	.drop-menu li {
		width: 230px !important;
	}
</style>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="<?php echo base_url(); ?>index"><img src="<?php echo base_url(); ?>images/moon_logo.png"
						alt="logo" class="logo-default" style="margin: 0px; height:70px;"></a>
			</div>

			<a href="javascript:;" class="menu-toggler"></a>

			<!-- <div class="top-menu">
				<ul class="nav navbar-nav pull-right">					
					
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/admin/layout3/img/avatar9.jpg">
						<span class="username username-hide-mobile">Admin</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="<?php echo base_url(); ?>admin_logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					
				</ul>
			</div> -->

		</div>
	</div>

	<div class="page-header-menu">
		<div class="container">
			<div class="hor-menu">
				<ul class="nav navbar-nav">
					<!-- <li class="active">
						<a href="<?php echo base_url(); ?>index"><i class="fa fa-tachometer"></i> Dashboard</a>
					</li> -->
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown"
							href="javascript:;"> Master Form <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu pull-left">
							<li class="">
								<a href="<?php echo base_url(); ?>negative_master" ;><i class="icon-puzzle"></i>
									Negative
									Mark</a>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="<?php echo base_url(); ?>question" ;><i class="fa fa-question-circle"></i>
							Question</a>
					</li>


					<li class="">
						<a href="<?php echo base_url(); ?>test_configuration" ;><i class="icon-puzzle"></i> Test
							Configuration</a>
					</li>
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown"
							href="javascript:;">Report <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu pull-left drop-menu">


							<li class="">
								<a href="<?php echo base_url(); ?>exam_result" ;><i class="icon-check"></i> Result</a>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>exam_report" ;><i class="fa fa-file-excel-o"></i>
									Question Wise Employee Wise Rport</a>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>percentage_exam_result" ;><i
										class="fa fa-file-excel-o"></i>Correct vs Wrong % Report</a>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>emp_wise_report" ;><i
										class="fa fa-file-excel-o"></i>Employee Wise
									Report</a>
							</li>
							<!-- <li class="">
								<a href="<?php echo base_url(); ?>overall_emp_report" ;><i
								class="fa fa-file-excel-o"></i>Overall Report of Employee</a>
							</li> -->
							<li class="">
								<a href="<?php echo base_url();?>exam_attendance_report";><i class="fa fa-file-excel-o"></i>Exam Not-attended Report</a>
							</li>
						</ul>
					</li>

				</ul>
			</div>
			<!-- END MEGA MENU -->
		</div>
	</div>
	<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->