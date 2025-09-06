<html>
	<head> 
 		<style>
 			body{width:100%; margin-left: 10px; padding: 0; font-family: 'Bookman Old Style'; font-size: 8pt;} 
 		</style>
 	</head> 
 	<body style="font-siz:6px; height:125%; background-image:url('./images/certificate.jpg');">
 		<section>
 		 	<div style="width:100%; text-align:center; ">
 		 		<div style="font-size: 19pt; color:#b30605; margin-top: 40%; font-size: 28pt;" ><b><?php echo (isset($user_details->emp_name) && !empty($user_details->emp_name))?$user_details->emp_name:'';?></b></div>
 		 		<div style="padding-top:10px; font-size: 18pt; font-size: 23pt"><?php echo (isset($user_details->designation) && !empty($user_details->designation))?$user_details->designation:'&nbsp;';?></div>
				<!-- <div style="font-size: 18pt; letter-spacing: 1px;">Of M/S <?php //echo (isset($user_details->organisation) && !empty($user_details->organisation))?$user_details->organisation:'';?></div> -->
				<?php if(isset($testData) && !empty($testData))
				{ 	$t_marks=0;
					$obt_marks=0;
					foreach ($testData as $key) 
					{
						if($key->answer==$key->user_answer)
						{
							$obt_marks=$obt_marks+$key->marks_per_que;
						}	
						$t_marks=$t_marks+$key->marks_per_que;
					}
					$percent=($obt_marks*100)/$t_marks;

					if($percent>=80)
					{
						$grade='A';
					}
					else if($percent>=60)
					{
						$grade='B';
					}
					else if($percent>=50)
					{
						$grade='C';
					}
					else 
					{
						$grade='Satisfactory';
					}				

				} ?>
				<div style="font-size: 15pt; color:#000000; font-weight:10px; margin-top: 38px;">
					<span style="margin-right: 100px;"><b>Grade <?php echo $grade; ?></b></span>
					<span style="margin-left:150px;"><?php echo date('d/m/Y');?></span>
				</div>
			</div>
 		</section> 		
 	</body>
</html>