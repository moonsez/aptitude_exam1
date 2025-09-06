<?php defined('BASEPATH') or exit('No direct script access allowed');

class percent_result extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('percent_model');
        $this->load->model('test_model_r');
        $this->load->library('imageupload');
        $this->load->library('upload');
        $this->load->library('report_creation');
        $this->load->model("test_model_g");
        $this->load->model("test_model_r");
        $this->load->library('authentication');
        $this->load->library('encrypt');

    }

    public function percentage_exam_result($test_configuration_id = 0)
    {
        $this->load->model('percent_model');
        $data['exam_list'] = $this->percent_model->fetch_exam_list('tbl_test_configuration', 'test_name', 'test_configuration_id');
        $report = [];
        if (empty($test_configuration_id) || !is_numeric($test_configuration_id)) {
            $query = $this->db->query("
                SELECT test_configuration_id 
                FROM tbl_test_configuration 
                WHERE DATE(test_datetime) = CURDATE() 
                LIMIT 1
            ");
            if ($query->num_rows() > 0) {
                $test_configuration_id = $query->row()->test_configuration_id;
            }
        }
        if (!empty($test_configuration_id) && is_numeric($test_configuration_id)) {
            $report = $this->percent_model->view_percentage($test_configuration_id);
            if (!empty($report)) {
                foreach ($report as &$row) {
                    $row->options_data = $this->percent_model->get_question_options($row->question_id);
                }
            }
        }
        $data['test_report_percent'] = $report;
        $data['test_id'] = $test_configuration_id;

        $this->load->view('admin/percent_report_view', $data);
    }


    public function export_percentage_report($test_id = null)
    {
        $this->load->library('excel');
        $this->load->model('percent_model');

        if (empty($test_id) || !is_numeric($test_id)) {
            echo "Test ID is required.";
            return;
        }

        $report_data = $this->percent_model->view_percentage($test_id);

        if (empty($report_data)) {
            echo "No results found for this test.";
            return;
        }

        // Attach options to each question
        foreach ($report_data as &$row) {
            $row->options_data = $this->percent_model->get_question_options($row->question_id);
        }

        $data['test_report_percent'] = $report_data;

        // Call the function to generate the Excel file
        $this->excel->generate_percentage_report($data);
    }







    // public function get_answer_report()
    // {
    //     $test_id = $this->input->post('test_id');
    //     $question_id = $this->input->post('question_id');
    //     $type = $this->input->post('type'); // 'correct', 'wrong', or 'not_answered'

    //     if (!empty($question_id) && !empty($type)) {
    //         if ($type == "correct") {
    //             $data = $this->percent_model->get_correct_answered_employees($test_id, $question_id);
    //         } elseif ($type == "wrong") {
    //             $data = $this->percent_model->get_wrong_answered_employees($test_id, $question_id);
    //         } elseif ($type == "na") {
    //             $data = $this->percent_model->na_answered_employees($test_id, $question_id);
    //         } else {
    //             $data = [];
    //         }
    //         echo json_encode($data);
    //     } else {
    //         echo json_encode([]);
    //     }


    public function graphically_score_tracking()
    {
        $user_id = $this->session->userdata('user_id');
        $test_id = $this->input->post('test_id'); // Get selected test_id from POST

        // Fetch the graphical test report
        $data['graphical_test_report'] = $this->percent_model->graphical_user_scoring($test_id, $user_id);
        $data['exam_list'] = $this->percent_model->fetch_exam_list('tbl_test_configuration', 'test_name', 'test_configuration_id');
        $data['graphical_question_report'] = $this->percent_model->graphical_question_scoring($test_id, $user_id);


        // Load the view with data
        $this->load->view('graphically_score_tracking', $data);
    }





    public function result($test_id = null, $user_id = 0)
    {

        $data['exam_list'] = $this->percent_model->fetch_exam_list('tbl_test_configuration', 'test_name', 'test_configuration_id');
        $data['emp_name'] = $this->percent_model->fetch_active_user();


        if ($test_id && $test_id != 'all') {
            $data['test_id'] = $test_id;
            $data['user_id'] = $user_id;

            if ($user_id != 0) {
                $data['user_result'] = $this->percent_model->view_test_result($test_id, $user_id);
            } else {
                $data['user_result'] = $this->percent_model->view_test_result($test_id);
            }

        } else {
            $data['test_id'] = 'all';
            $data['user_id'] = 0; // optional fallback
            $data['user_result'] = [];
        }
        $this->load->view('admin/result', $data);
    }

    public function export_test_report($test_id = null)
    {
        $this->load->library('excel');  // Load PHPExcel library

        // Fetch test results based on the test ID
        $data['user_result'] = $this->percent_model->view_test_result($test_id);
        // If no data is found, display an error
        if (empty($data['user_result'])) {
            echo "No results found for this test.";
            return;
        }

        // Call the function to generate the Excel file
        $this->excel->generate_test_report($data);
    }


    public function get_departments()
    {
        $departments = $this->percent_model->get_all_departments();
        echo json_encode($departments);
    }

    public function get_designations()
    {
        $data = $this->percent_model->get_all_designations();
        echo json_encode($data);
    }

    public function get_location()
    {
        $data = $this->percent_model->get_all_location();
        echo json_encode($data);
    }

    public function get_empname()
    {
        $data = $this->percent_model->get_all_name();

        echo json_encode($data);
    }


    public function emp_wise_report()
    {
        // Load necessary models
        $this->load->model('test_model_g');
        $this->load->model('percent_model');

        // Fetch active users and exam list for the dropdowns
        $data['all_active_user'] = $this->percent_model->fetch_all_active_user();
        $data['exam_list'] = $this->percent_model->fetch_exam_list('tbl_test_configuration', 'test_name', 'test_configuration_id');
        $data['testData'] = $this->test_model_g->getAllTestNamesFromQuestionMaster();
        $this->load->view('admin/emp_wise_report', $data);
    }


    public function fetch_empwise_report()
    {
        $selected_user_id = $this->input->post('emp_name');
        $test_id = $this->input->post('test_name');
        $test_id = ($test_id == 0 || $test_id === '0') ? null : $test_id;

        $report_data = $this->percent_model->emp_wise_report($test_id, $selected_user_id);

        // Debug only (you can remove this line after testing)
        // echo $this->db->last_query(); die();

        $data['report_data'] = $report_data;
        $view = $this->load->view('admin/emp_wise_report_table', $data, true);
        echo json_encode(['view' => $view]);
    }



    public function export_emp_wise_report($test_id = null)
    {
        $this->load->library('excel');
        $this->load->model('percent_model');

        if (empty($test_id) || !is_numeric($test_id)) {
            echo "Test ID is required.";
            return;
        }

        $report_data = $this->percent_model->view_percentage($test_id);

        if (empty($report_data)) {
            echo "No results found for this test.";
            return;
        }

        // Attach options to each question
        foreach ($report_data as &$row) {
            $row->options_data = $this->percent_model->get_question_options($row->question_id);
        }

        $data['test_report_percent'] = $report_data;

        // Call the function to generate the Excel file
        $this->excel->generate_percentage_report($data);
    }


    public function overall_emp_report()
    {
        // Load necessary models
        $this->load->model('test_model_g');
        $this->load->model('percent_model');

        // Fetch active users and exam list for the dropdowns
        $data['all_active_user'] = $this->percent_model->fetch_all_active_user();
        $data['exam_list'] = $this->percent_model->fetch_exam_list('tbl_test_configuration', 'test_name', 'test_configuration_id');
        $data['testData'] = $this->test_model_g->getAllTestNamesFromQuestionMaster();
        $this->load->view('admin/overall_emp_report', $data);
    }

    public function fetch_overall_emp_report()
    {
        $selected_user_id = $this->input->post('emp_name');
        $test_id = $this->input->post('test_name');
        $test_id = ($test_id == 0 || $test_id === '0') ? null : $test_id;

        $report_data = $this->percent_model->overall_emp_report($test_id, $selected_user_id);

        // Debug only (you can remove this line after testing)
        // echo $this->db->last_query(); die();

        $data['report_data'] = $report_data;
        $view = $this->load->view('admin/overall_emp_report_table', $data, true);
        // echo $this->db->last_query();
        // die();
        echo json_encode(['view' => $view]);
    }

    public function exam_attendance_report($test_id = null)
    {
        $data['exam_list'] = $this->percent_model->fetch_exam_list('tbl_test_configuration', 'test_name', 'test_configuration_id');
        if (empty($test_id)) {
            $today = date('Y-m-d');
            $today_exam = $this->db->select('test_configuration_id')
                ->from('tbl_test_configuration')
                ->where('DATE(test_datetime)', $today)
                ->get()
                ->row();


            if ($today_exam) {
                $test_id = $today_exam->test_configuration_id;
            }
        }
        if (!empty($test_id)) {
            $data['report_data'] = $this->percent_model->get_exam_attendance_report($test_id);
            $data['selected_test_id'] = $test_id;
        } else {
            $data['report_data'] = false;
            $data['selected_test_id'] = null;
        }
        $this->load->view('admin/exam_attendance_report', $data);
    }

   
    public function export_attendance_report($test_id = null)
    {
        $this->load->library('excel');
        $this->load->model('percent_model');

        if (empty($test_id) || !is_numeric($test_id)) {
            echo "Test ID is required.";
            return;
        }

        $report_data = $this->percent_model->get_exam_attendance_report($test_id);

        if (empty($report_data)) {
            echo "No results found for this test.";
            return;
        }
        $data['report_data'] = $report_data;

        // Call the function to generate the Excel file
        $this->excel->generate_attendance_report($data);
    }


   
    // Below code is for Interns
    // public function register_intern()
    // {
        
    //     $username = $this->input->post('user_name');
    //     $email = $this->input->post('email');
    //     $mobile_no = $this->input->post("mobile_no");
    //     $emergency_no = $this->input->post("emergency_no");
    //     $date_of_birth = $this->input->post("date_of_birth");
    //     $gender = $this->input->post("gender");
    //     $per_address = $this->input->post("per_address");
    //     $curr_address = $this->input->post("curr_address");
    //     $pan_number = $this->input->post("pan_number");
    //     $joining_date = $this->input->post("joining_date");
    //     $education = $this->input->post("education");
    //     $password_org = $this->input->post("password_org");
    
    //     $password_hash = md5(sha1(md5($password_org)));
    
    //     $this->load->model("percent_model");
    
    //     $data = array();
    //     $file_name = "";
    //     $file_org_name = "";
    //     $degree_file_name = "";
    //     $degree_file_org_name = "";
    //     $Img_file_name="";
    //     $Img_file_org_name="";
    
    //     // Handle Aadhar Card File Upload
    //     if (isset($_FILES['aadhar_card_path']['name'])) {
    //         $logo = $_FILES['aadhar_card_path']['name'];
    //         $logoImg = array(
    //             'upload_path' => './uploads/intern_doc/',
    //             'fieldname' => 'aadhar_card_path',
    //             'encrypt_name' => TRUE,
    //             'overwrite' => FALSE
    //         );
    
    //         $logo_img = $this->imageupload->image_upload($logoImg);
    //         if (isset($logo_img) && !empty($logo_img)) {
    //             $logoData = $this->upload->data();
    //             $file_name = $logoData['file_name'];
    //             $file_org_name = $logoData['orig_name'];
    //         }
    //     }
    
    //     // Handle Degree Certificate File Upload
    //     if (isset($_FILES['degree_cert_path']['name'])) {
    //         $degree = $_FILES['degree_cert_path']['name'];
    //         $degreeImg = array(
    //             'upload_path' => './uploads/intern_doc/',
    //             'fieldname' => 'degree_cert_path',
    //             'encrypt_name' => TRUE,
    //             'overwrite' => FALSE
    //         );
    
    //         $degree_img = $this->imageupload->image_upload($degreeImg);
    //         if (isset($degree_img) && !empty($degree_img)) {
    //             $degreeData = $this->upload->data();
    //             $degree_file_name = $degreeData['file_name'];
    //             $degree_file_org_name = $degreeData['orig_name'];
    //         }
    //     }
    
    //     // Handle Intern Profile Img
    //     if (isset($_FILES['intern_img_file_path']['name'])) {
           
    //         $profile_img = $_FILES['intern_img_file_path']['name'];
           
    //         $profileImg = array(
    //             'upload_path' => './uploads/intern_image/',
    //             'fieldname' => 'intern_img_file_path',
    //             'encrypt_name' => TRUE,
    //             'overwrite' => FALSE
    //         );
           
    
    //         $profile_img = $this->imageupload->image_upload($profileImg);
    //         if (isset($profile_img) && !empty($profile_img)) {
    //             $ImgData = $this->upload->data();
    //             $Img_file_name = $ImgData['file_name'];
    //             $Img_file_org_name = $ImgData['orig_name'];
    //         }
    //     }
       
    
    //     // Check if the combination of email, mobile number, and date of birth is available
    //     if (!$this->authentication->check_intern_info($email, $mobile_no, $date_of_birth, 2)) {
    //         $data = array(
    //             'valid' => false,
    //             'msg' => "An account with this credentials already exists."
    //         );
    //     } else {
    //         // If no existing record found, proceed to create the account
    //         $user_data = array(
    //             "role_id" => 4,
    //             "email" => $email,
    //             "mobile_no" => $mobile_no,
    //             "emergency_no" => $emergency_no,
    //             "date_of_birth" => $date_of_birth,
    //             "gender" => $gender,
    //             "per_address" => $per_address,
    //             "curr_address" => $curr_address,
    //             "pan_number" => $pan_number,
    //             "joining_date" => $joining_date,
    //             "education" => $education,
    //             "user_name" => $username,
    //             "password_org" => $password_org,
    //             "password_hash" => $password_hash,
    //             "status" => "Active",
    //             "aadhar_card_path" => $file_name,
    //             "aadhar_file_name" => $file_org_name,
    //             "degree_cert_path" => $degree_file_name,
    //             "degree_file_name" => $degree_file_org_name,
    //             "intern_img_file_name"=>$Img_file_name,
    //             "intern_img_file_path"=>$Img_file_org_name,
    //             "user_type"=>'Intern'
    //         );
     
            
            
    
           
    //         $login_id = $this->percent_model->register_user($user_data);

    //         if ($login_id) {
            
    //             // Send email to user
    //             $to = $email;
    //             $cc = ''; // optional
    //             $subject = 'Your Aptitude Exam Login Credentials';
    //             $mail_data = array(
    //                 'user_name' => $username,
    //                 'login_id' => $login_id,
    //                 'password' => $password_org
    //             );
                
    //             $msg = $this->load->view('admin/intern_credentails_mail_body', $mail_data, TRUE);
                
    //             $from = "moonit@sezindia.co.in";
    //             $fromname = "Moonsez and Management Consultants LLP";
    //             $attachment_file = array(); 
               
                
                
    //            $this->sendEmail($to, $cc, $subject, $msg, $from, $fromname, $attachment_file);
    
    //             $data = array(
    //                 'valid' => true,
    //                 'msg' => "Registration complete. Login details have been sent to your registered email address.",
    //                 'redirect' => base_url() . 'user'
    //             );
    //         } else {
    //             $data = array(
    //                 'valid' => false,
    //                 'msg' => "Unable to create account."
    //             );
    //         }
    //     }
    
    //     $this->json->jsonReturn($data);
    // }
    

    // public function sendEmail($to, $cc, $subject, $msg, $from, $fromname, $attachment_file)
    // { 
        
    //     $config = array(
    //         'protocol' => 'smtp',
    //         'smtp_host' => 'ssl://smtp.sendgrid.net',
    //         'smtp_port' => 465,
    //         'smtp_user' => 'apikey',
    //         'smtp_pass' => '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'
    //     );
        

    //     $this->load->library('email', $config);
    //     $this->email->set_mailtype("html");
    //     $this->email->reply_to($from, $fromname);//ashish@sezindia.co.in

    //     if (isset($attachment_file) && !empty($attachment_file)) {
    //         for ($i = 0; $i < count($attachment_file); $i++) {
    //             $this->email->attach($attachment_file[$i]);
    //         }
    //     }

    //     $this->email->set_newline("\r\n");
    //     $this->email->from($from, $fromname); // ashish@sezindia.co.in
    //     $this->email->to($to);// change it to yours
    //     $this->email->cc($cc);
    //     $this->email->subject($subject);
    //     $this->email->message($msg);
    //     if ($this->email->send()) {
    //         //$this->email->clear(TRUE);
    //         return true;
    //     } else {
    //         //$this->email->clear(TRUE);
    //         show_error($this->email->print_debugger());
    //         return false;
    //     }
    // }
   

   
    // public function intern()
    // {
    //     $msg = 'intern_test';
	// 	$key = 'test';

	// 	if($this->authentication->logged_in()==FALSE)
	// 	{
	// 		$data['key_string'] = $this->encrypt->encode($msg, $key);
	// 	 	$data['role']=4;
	// 	 	$this->session->set_userdata("secret_key", $data['key_string']);
	// 	 	$data['title']="Intern Login";
	// 		$this->load->view("admin/intern_login",$data);
	// 	}
	// 	else
	// 	{
	// 		$this->intern_load();
			
	// 	}
    // }

   
    // public function intern_login() 
	// {
	// 	$secretkey = $this->session->userdata('secret_key');
	// 	$role=$this->input->post("user_role");
	// 	$a=$this->input->post('key');
	// 	$pass=$this->input->post('password'); 
	// 	$login=$this->input->post('email');
	// 	if (isset($a) && $a==$secretkey)
	// 	{
	// 		$valid = false;
	// 		if (!isset($login) or strlen($login) == 0)
	// 		{
	// 			$error = 'Please enter your user name.';
	// 		}
	// 		elseif (!isset($pass) or strlen($pass) == 0)
	// 		{
	// 			$error = 'Please enter your password.';
	// 		}
	// 		else
	// 		{
	// 			$valid['state']=$this->authentication->chkinternlogin($login,$pass,$role);
    //          //  echo $this->db->last_query();die;
	// 			if (!$valid['state'])
	// 				$error = 'Wrong user/password, please try again.';
	// 		}
            
	// 		$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

	// 		if ($valid['state']==true)
	// 		{
    //             //print_r($_SESSION);die;
	// 			 $roleId=$this->session->userdata('role_id');			
    // 			if ($ajax)
	// 			{
	// 				if (!empty($roleId) && ($roleId==4) )
	// 				{
	// 					$data=array(
	// 						'valid' => TRUE,
	// 						'msg'=>"Please Wait, We Will Redirect You Soon...",
	// 						'redirect' => base_url().'intern_user'
	// 					);
	// 					$this->json->jsonReturn($data);					
	// 				}
	// 				else
	// 				{
	// 					$data=array(
	// 						'valid' => TRUE,
	// 						'msg'=>"Please Wait, We Will Redirect You Soon...",
	// 						'redirect' => ''
	// 					);
	// 					$this->json->jsonReturn($data);		
	// 				}								
	// 			}
	// 			else
	// 			{					
	// 				$this->intern_logout();
	// 				//redirect('common/dashboard');
	// 			}					
	// 		}
	// 		else
	// 		{
	// 			if ($ajax)
	// 			{
	// 				$data=array(
	// 					'valid' => FALSE,
	// 					'msg' => $error
	// 				);
	// 				$this->json->jsonReturn($data);
	// 			}
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$msg = 'intern_test';
	// 		$key = 'test';
	// 	 	$data['key_string'] = $this->encrypt->encode($msg, $key);
	// 	 	$data['role']=4;
	// 	 	$this->session->set_userdata("secret_key", $data['key_string']);
	// 		$data['title']="Intern Login";
	// 		$this->load->view("admin/intern_login");
	// 	}		
    // }
    

    // public function intern_load() 
	// {	
    //     $msg='intern_test';
    //     $key='test';
	// 	$this->load->model("master_model");
	// 	$data['key_string'] = $this->encrypt->encode($msg, $key);
	// 	$secretkey = $this->encrypt->encode($msg, $key);
	// 	$this->session->set_userdata("secret_key", $data['key_string']);
    //    //print_r($_SESSION);die;
    //    // var_dump($this->session->userdata("role_id"));die;
	// 	$state=$this->authentication->intern_logged_in();
    //     // var_dump($state);die;
	// 	if($state==false)
	// 	{		
	// 		$data['key_string'] = $this->encrypt->encode($msg, $key);
	// 		$data['role']=4;
	// 		$this->session->set_userdata("secret_key", $data['key_string']);
	// 		$data['title']="Intern Login";
	// 		$this->load->view("admin/intern_login",$data);
	// 	}				
	// 	else if($state==true)
	// 	{	
	// 		$value = base_url();
	// 		setcookie("ecommerce",$value, time()+3600*24,'/');$state=FALSE;
	// 		$roleId=$this->session->userdata('role_id');
    //         $login_id=$this->session->userdata('login_id');
           
	// 		$userId=$this->session->userdata('user_id');

    //         if(!empty($userId)) // for intern user
    //         {
    //             $this->load->model("test_model_g");
    //             $this->load->model("master_model");

    //             $msg = 'intern_test';
    //             $key = 'test';
    //             $data['key_string'] = $this->encrypt->encode($msg, $key);
    //             $this->session->set_userdata("secret_key", $data['key_string']);
    //             $emp_dept = $this->master_model->getDeptFromUserId($userId);
    //             $test_data = $this->test_model_g->getConfiguration($userId,$emp_dept);

    //             if (!empty($test_data)) {
    //                 $test_ids = explode(",",$test_data);
    //                 $data['test_data'] = '';
    //                 $currentTime = time();
    //                 $foundValidTest = false;
                    
    //                 for ($i=0; $i < count($test_ids); $i++) { 
    //                     $test_conf_data = $this->master_model->selectDetailsWhr('tbl_test_configuration','test_configuration_id',$test_ids[$i]);

    //                     if (!empty($test_conf_data)) {
    //                         $final_timestamp = strtotime($test_conf_data->test_datetime) + ($test_conf_data->test_time * 60);
    //                         $data['final_datetime'] = date("Y-m-d H:i:s", $final_timestamp);
    //                         if (strtotime($data['final_datetime']) > $currentTime) {
    //                             $data['test_data'] = $test_conf_data;
    //                             $foundValidTest = true;
    //                             break;
    //                         }
    //                     }
    //                 }

    //                 if (!$foundValidTest) {
    //                     $data['test_data'] = '';
    //                 }
    //             }
                
    //             $data['user_data']=$this->percent_model->intern_data($userId);
    //             $this->load->view('intern_home',$data);			
    //         }	
											 		
	// 	}
	// 	else 
	// 	{
	// 		echo "else dashboard in login controllers";
	// 		//redirect('common/dashboard');	
	// 	}
	// }

    // function intern_logout()	
	// {
	// 	$this->authentication->logout(); 
	// 	redirect(base_url().'intern_user');		
	// } 

    // public function intern_begin_test()
    // {
    //     if ($this->authentication->intern_logged_in() == FALSE) {
    //         redirect(base_url());

    //     } else {
    //         $this->load->model("test_model_g");
    //         $this->load->model("master_model");

    //         $user_id = $this->uri->segment(2);
    //         $test_conf_id = $this->uri->segment(3);

    //         $data["test_data"] = $this->test_model_g->get_latest_test_data($test_conf_id);

    //         $startTime = new DateTime($data["test_data"]->test_datetime);
    //         $startTime->modify("+{$data["test_data"]->test_time} minutes");
    //         $data['examEndTime'] = $startTime->format('Y-m-d H:i');

    //         $currentTime = new DateTime();
    //         $data['currentTimeFormatted'] = $currentTime->format('Y-m-d H:i');

    //         $view = $this->load->view("intern_begin_test", $data);
    //     }
    // }

    // public function intern_attempt_test()
    // {
    //     if ($this->authentication->logged_in() == FALSE) {
    //         redirect(base_url());

    //     } else {
    //         $this->load->model("test_model_g");
    //         $this->load->model("master_model");
    //         $test_configuration_id = $this->uri->segment(2);
    //         $user_id = $this->session->userdata('user_id');
    //         // for checking test response
    //         $test_status = 'submitted';
    //         $attempted_test = $this->percent_model->get_employee_latest_data($test_configuration_id, $user_id, $test_status);

    //         if ($attempted_test) {
    //             echo "<script>alert('You have already submitted this test!'); window.location.href='" . base_url() . "';</script>";
    //             exit;
    //         }
    //         // $test_conf_data = $this->master_model->selectAllWhr('tbl_test_configuration','dept_master_id',0);
    //         // if (!empty($test_conf_data)) {
    //         $data['test_data'] = $this->test_model_g->get_latest_test_data($test_configuration_id);

    //         $examStartTime = $data['test_data']->test_datetime;
    //         $examDurationInMinutes = $data['test_data']->test_time;

    //         $userStartTime = date('Y-m-d H:i:s');

    //         $examStartTimestamp = strtotime($examStartTime);
    //         $userStartTimestamp = strtotime($userStartTime);

    //         $lateTimeInMinutes = round(($userStartTimestamp - $examStartTimestamp) / 60);

    //         if ($lateTimeInMinutes > 0) {
    //             $adjustedExamDurationInMinutes = $examDurationInMinutes - $lateTimeInMinutes;

    //             $adjustedExamDurationInMinutes = max(0, $adjustedExamDurationInMinutes);

    //             $adjustedExamEndTime = date("H:i:s", $userStartTimestamp + ($adjustedExamDurationInMinutes * 60));

    //             $data['new_test_time'] = $adjustedExamDurationInMinutes;
    //         }

    //         $limit = $data['test_data']->question_count;
    //         $test_name = $data['test_data']->test_name;
    //         $data["question_data"] = $this->percent_model->intern_get_question_data($user_id, $test_name, $limit);
    //         // } else {
    //         //     $data["question_data"] = $this->test_model_g->get_test_data($user_id);
    //         // }
    //         // echo $this->db->last_query();
    //         // die();

    //         $this->load->view("intern_attempt_test", $data);
    //     }
    // }

    // function intern_aptitude_exam_login($login_id)
	// {
	// 	$error='';
	// 	if(isset($login_id) && !empty($login_id))
	// 	{

	// 		$valid['state']=$this->authentication->intern_logged_in($login_id);
			
	// 		if (!$valid['state'])
	// 		{
	// 			redirect(BASEURL2,'intern');
	// 		}else
	// 		{
	// 			redirect(base_url('intern'));
	// 		}
	// 	}
	// 	else
	// 	{
	// 	  	redirect(BASEURL2);
	// 	}
	// }


    // public function intern_test_res()
	// {
	// 	$this->load->model("test_model_r");
	// 	//$user_id = $this->session->userdata('user_id');
    //     $login_id = $this->session->userdata('login_id');
	// 	$data['internrecord'] = $this->percent_model->view_intern_result($login_id);
	// 	$this->load->view("intern_test_result",$data);
	// }


    // public function intern_view_results()
    // {
    //     $this->load->model("test_model_g");
    //     $user_test_id=$this->uri->segment(2);

    //     $data['question_data']=$this->percent_model->intern_review_data($user_test_id);
    //     $data['obj_result']=$this->percent_model->intern_get_result($user_test_id);
    //     $data['option_name']=array("A","B","C","D","E","F");

    //     $this->load->view("intern_view_results",$data);

    // }


    // public function intern_download_certificate()
    // {
    //     $this->load->model("test_model_g");

    //     $user_test_id = $this->uri->segment(2);
    
      
    //     $this->percent_model->intern_save_cerificate($user_test_id);
       

    // }

}
?>