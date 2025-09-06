<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->library('authentication');
		$this->load->library('encrypt');
		date_default_timezone_set('Asia/Kolkata');
		header("Access-Control-Allow-Origin: *");
        $this->load->helper('cookie');
	}


	public function user_login()
	{
		$msg = 'online_test';
		$key = 'test';

		if ($this->authentication->logged_in() == FALSE) {
			$data['key_string'] = $this->encrypt->encode($msg, $key);
			$data['role'] = 2;
			$this->session->set_userdata("secret_key", $data['key_string']);
			$data['title'] = "User Login";
			$this->load->view("user_login", $data);
		} else {
			$this->load($msg, $key);
		}
	}


	public function clear_cache()
	{
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}

	public function index()
	{
		$msg = 'online_test';
		$key = 'test';

		if ($this->authentication->logged_in() == FALSE) {
			// 	$data['key_string'] = $this->encrypt->encode($msg, $key);
			// 	$data['role']=2;
			// 	$this->session->set_userdata("secret_key", $data['key_string']);
			// 	$data['title']="User Login";
			// $this->load->view("login",$data);
			$data['key_string'] = $this->encrypt->encode($msg, $key);
			$data['role'] = 2;
			$this->session->set_userdata("secret_key", $data['key_string']);
			$data['title'] = "User Login";
			$this->load->view("user_login", $data);
		} else {
			$this->load($msg, $key);

		}
	}

	public function admin()
	{
		$msg = 'online_test';
		$key = 'test';

		if ($this->authentication->logged_in() == FALSE) {
			$data['key_string'] = $this->encrypt->encode($msg, $key);
			$data['role'] = 1;
			$this->session->set_userdata("secret_key", $data['key_string']);
			$data['title'] = "Admin Login";
			$this->load->view("admin/login", $data);
		} else {
			$this->load($msg, $key);

		}
	}

	public function load($msg = 'online_test', $key = 'test')
	{
		$this->load->model("master_model");
		$data['key_string'] = $this->encrypt->encode($msg, $key);
		$secretkey = $this->encrypt->encode($msg, $key);
		$this->session->set_userdata("secret_key", $data['key_string']);
		$state = $this->authentication->logged_in();
		if ($state == false) {
			$data['key_string'] = $this->encrypt->encode($msg, $key);
			$data['role'] = 1;
			$this->session->set_userdata("secret_key", $data['key_string']);
			$data['title'] = "Admin Login";
			$this->load->view("user_login", $data);
		} else if ($state == true) {
			$value = base_url();
			setcookie("ecommerce", $value, time() + 3600 * 24, '/');
			$state = FALSE;
			$roleId = $this->session->userdata('role_id');
			$userId = $this->session->userdata('user_id');

			$chk_user_permission = $this->master_model->selectDetailsWhr('tbl_userinfo', 'user_id', $userId);
			//print_r($chk_user_permission->apptitude_tracker);
			//print_r($chk_user_permission->apptitude_tracker_admin);
			//print_r($userId);
			if (!empty($userId) && !empty($chk_user_permission->apptitude_tracker_admin) && empty($chk_user_permission->apptitude_tracker) && $chk_user_permission->apptitude_tracker_admin == 'Y') // for admin
			{
				redirect(base_url('admin_user'));
			} else if (!empty($userId) && !empty($chk_user_permission->apptitude_tracker) && $chk_user_permission->apptitude_tracker == 'Y') // for user
			{
				if (!empty($userId) && ($userId == 95 || $userId == 96)) // for admin
				{
					$this->load->view('admin/dashboard');
				} else if (!empty($userId)) // for user
				{
					$exam_roleId = $this->session->userdata('exam_role_id');
					$exam_userId = $this->session->userdata('exam_user_id');
					$this->load->model("test_model_g");
					$this->load->model("master_model");

					if (isset($exam_roleId) && !empty($exam_userId)) {
						$data['test_data'] = $this->test_model_g->getConfiguration($userId);

						$data['test_details'] = $this->test_model_g->test_details();
						$this->load->view('bigin_test', $data);
					} else {
						$msg = 'online_test';
						$key = 'test';
						$data['key_string'] = $this->encrypt->encode($msg, $key);
						$this->session->set_userdata("secret_key", $data['key_string']);
						$emp_dept = $this->master_model->getDeptFromUserId($userId);
						$test_data = $this->test_model_g->getConfiguration($userId, $emp_dept);

						if (!empty($test_data)) {
							$test_ids = explode(",", $test_data);
							$data['test_data'] = '';
							$currentTime = time();
							$foundValidTest = false;

							for ($i = 0; $i < count($test_ids); $i++) {
                                delete_cookie('aptitude_test_id');
                                setcookie("aptitude_test_id", $test_ids[$i], time() + 86400, '/');
								$test_conf_data = $this->master_model->selectDetailsWhr('tbl_test_configuration', 'test_configuration_id', $test_ids[$i]);

								if (!empty($test_conf_data)) {
									$final_timestamp = strtotime($test_conf_data->test_datetime) + ($test_conf_data->test_time * 60);
									$data['final_datetime'] = date("Y-m-d H:i:s", $final_timestamp);
									if (strtotime($data['final_datetime']) > $currentTime) {
										$data['test_data'] = $test_conf_data;
										$foundValidTest = true;
										break;
									}
								}
							}

							if (!$foundValidTest) {
								$data['test_data'] = '';
							}
						} else {
                            $aptitude_test_id = $this->input->cookie('aptitude_test_id', TRUE);
                            $test_data = $this->test_model_g->getTestDataByTestIdByUserId($aptitude_test_id, $userId);
                            if (!empty($test_data)) {
                                $data['final_datetime'] = $this->calculateFinalDataTime($test_data);
                            }
                        }

						$data['user_data'] = $this->test_model_g->user_data($userId);

						$this->load->view('home', $data);
					}
				}
			}


		} else {
			echo "else dashboard in login controllers";
			//redirect('common/dashboard');	
		}
	}

    public function calculateFinalDataTime($test_data)
    {
        $final_datetime = '';
        $test_start_datetime = $test_data->test_datetime;
        $test_time_minutes = $test_data->test_time;
        $test_submitted_datetime = $test_data->submitted_time;
        $buffer_time_minutes = 0;

        $test_end_datetime = strtotime($test_start_datetime) + ($test_time_minutes * 60);

        if (strtotime($test_submitted_datetime) < $test_end_datetime) {
            $remaining_datetime = $test_end_datetime - strtotime($test_submitted_datetime);
            $final_datetime = strtotime($test_submitted_datetime) + $remaining_datetime + ($buffer_time_minutes * 60);
        } else {
            $final_datetime = $test_end_datetime + ($buffer_time_minutes * 60);
        }

        return date("Y-m-d H:i:s", $final_datetime);
    }

	public function showDataInNewTab()
	{
		$data['message'] = "This tab will close in 3 seconds.";
		$this->load->view('new_tab_view', $data);
	}

	public function admin_load($msg = 'online_test', $key = 'test')
	{
		$this->load->model("master_model");
		$data['key_string'] = $this->encrypt->encode($msg, $key);
		$secretkey = $this->encrypt->encode($msg, $key);
		$this->session->set_userdata("secret_key", $data['key_string']);
		$state = $this->authentication->logged_in();
		if ($state == false) {
			$data['key_string'] = $this->encrypt->encode($msg, $key);
			$data['role'] = 1;
			$this->session->set_userdata("secret_key", $data['key_string']);
			$data['title'] = "Admin Login";
			$this->load->view("user_login", $data);
		} else if ($state == true) {
			$value = base_url();
			setcookie("ecommerce", $value, time() + 3600 * 24, '/');
			$state = FALSE;
			$roleId = $this->session->userdata('role_id');
			$userId = $this->session->userdata('user_id');

			$chk_user_permission = $this->master_model->selectDetailsWhr('tbl_userinfo', 'user_id', $userId);

			if (!empty($userId) && !empty($chk_user_permission->apptitude_tracker_admin) && empty($chk_user_permission->apptitude_tracker) && $chk_user_permission->apptitude_tracker_admin == 'Y') // for admin
			{
				$this->load->view('admin/dashboard');
			} else if (!empty($userId) && !empty($chk_user_permission->apptitude_tracker) && empty($chk_user_permission->apptitude_tracker_admin) && $chk_user_permission->apptitude_tracker == 'Y') // for user
			{
				redirect(base_url('user'));
			}
		} else {
			echo "else dashboard in login controllers";
			//redirect('common/dashboard');	
		}
	}

	public function login()
	{
		$secretkey = $this->session->userdata('secret_key');
		$role = $this->input->post("user_role");
		$a = $this->input->post('key');
		$pass = $this->input->post('password');
		$login = $this->input->post('email');
		if (isset($a) && $a == $secretkey) {
			$valid = false;
			if (!isset($login) or strlen($login) == 0) {
				$error = 'Please enter your user name.';
			} elseif (!isset($pass) or strlen($pass) == 0) {
				$error = 'Please enter your password.';
			} else {
				$valid['state'] = $this->authentication->chkinternlogin($login, $pass, $role);
				if (!$valid['state'])
					$error = 'Wrong user/password, please try again.';
			}

			$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

			if ($valid['state'] == true) {
				$roleId = $this->session->userdata('role_id');
				if ($ajax) {
					if (!empty($roleId) && ($roleId == 1)) {
						$data = array(
							'valid' => TRUE,
							'msg' => "Please Wait, We Will Redirect You Soon...",
							'redirect' => base_url() . 'user'
						);
						$this->json->jsonReturn($data);
					} else {
						$data = array(
							'valid' => TRUE,
							'msg' => "Please Wait, We Will Redirect You Soon...",
							'redirect' => ''
						);
						$this->json->jsonReturn($data);
					}
				} else {
					$this->logout();
					//redirect('common/dashboard');
				}
			} else {
				if ($ajax) {
					$data = array(
						'valid' => FALSE,
						'msg' => $error
					);
					$this->json->jsonReturn($data);
				}
			}
		} else {
			$msg = 'online_test';
			$key = 'test';
			$data['key_string'] = $this->encrypt->encode($msg, $key);
			$data['role'] = 1;
			$this->session->set_userdata("secret_key", $data['key_string']);
			// 	$data['title']="Admin Login";
			$this->load->view("admin/login");
		}
	}

	public function admin_login()
	{
		$secretkey = $this->session->userdata('secret_key');
		$role = $this->input->post("user_role");
		$a = $this->input->post('key');
		$pass = $this->input->post('password');
		$login = $this->input->post('email');
		if (isset($a) && $a == $secretkey) {
			$valid = false;
			if (!isset($login) or strlen($login) == 0) {
				$error = 'Please enter your user name.';
			} elseif (!isset($pass) or strlen($pass) == 0) {
				$error = 'Please enter your password.';
			} else {
				$valid['state'] = $this->authentication->chklogin1($login, $pass, $role);
				if (!$valid['state'])
					$error = 'Wrong user/password, please try again.';
			}

			$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

			if ($valid['state'] == true) {
				$roleId = $this->session->userdata('role_id');
				if ($ajax) {
					if (!empty($roleId) && ($roleId == 1)) {
						$data = array(
							'valid' => TRUE,
							'msg' => "Please Wait, We Will Redirect You Soon...",
							'redirect' => base_url() . 'user'
						);
						$this->json->jsonReturn($data);
					} else {
						$data = array(
							'valid' => TRUE,
							'msg' => "Please Wait, We Will Redirect You Soon...",
							'redirect' => ''
						);
						$this->json->jsonReturn($data);
					}
				} else {
					$this->logout();
					//redirect('common/dashboard');
				}
			} else {
				if ($ajax) {
					$data = array(
						'valid' => FALSE,
						'msg' => $error
					);
					$this->json->jsonReturn($data);
				}
			}
		} else {
			$msg = 'online_test';
			$key = 'test';
			$data['key_string'] = $this->encrypt->encode($msg, $key);
			$data['role'] = 1;
			$this->session->set_userdata("secret_key", $data['key_string']);
			// 	$data['title']="Admin Login";
			$this->load->view("admin/login");
		}
	}

	public function register_now()
	{

		$this->load->view("login");
	}

	public function exam_login()
	{
		$secretkey = $this->session->userdata('secret_key');
		$a = $this->input->post('key');
		$pass = $this->input->post('password');
		$login = $this->input->post('email');

		if (isset($a) && $a == $secretkey) {
			$valid = false;
			if (!isset($login) or strlen($login) == 0) {
				$error = 'Please enter your user name.';
			} elseif (!isset($pass) or strlen($pass) == 0) {
				$error = 'Please enter your password.';
			} else {
				$valid['state'] = $this->authentication->chklogin1($login, $pass, '3');
				if (!$valid['state'])
					$error = 'Wrong user/password, please try again.';
			}

			$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

			if ($valid['state'] == true) {
				$roleId = $this->session->userdata('role_id');
				if ($ajax) {
					$data = array(
						'valid' => TRUE,
						'msg' => "Please Wait, We Will Redirect You Soon...",
						'redirect' => ''
					);
					$this->json->jsonReturn($data);
				} else {
					$this->logout();
					//redirect('common/dashboard');
				}
			} else {
				if ($ajax) {
					$data = array(
						'valid' => FALSE,
						'msg' => $error
					);
					$this->json->jsonReturn($data);
				}
			}
		} else {
			$msg = 'online_test';
			$key = 'test';
			$data['key_string'] = $this->encrypt->encode($msg, $key);
			$data['role'] = 1;
			$this->session->set_userdata("secret_key", $data['key_string']);
			// 	$data['title']="Admin Login";
			$this->load->view("admin/login");
		}
	}

	function logout()
	{
		$this->authentication->logout();
		redirect(base_url() . 'user');
	}

	function admin_logout()
	{
		$this->authentication->logout();
		redirect(base_url() . 'admin');
	}

	public function register_user()
	{
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$mobile_no = $this->input->post("mobile_no");
		$organisation = $this->input->post("organisation");
		$designation = $this->input->post("designation");
		$password1 = $this->input->post('password');

		$pass = md5(sha1(md5($password1)));

		$this->load->model("test_model_g");
		if (!$this->authentication->email_available($email, 2)) {
			$data = array(
				'valid' => false,
				'msg' => "An account with this email address already exists."

			);
		} else {

			$user_data = array(
				"role_id" => 2,
				"email" => $email,
				"mobile_no" => $mobile_no,
				"password" => $pass,
				"organisation" => $organisation,
				"designation" => $designation,
				"username" => $fullname,
				"status" => "pending"
			);


			$result = $this->test_model_g->register_user($user_data);

			if ($result) {
				$data = array(
					'valid' => true,
					'msg' => "Your account has successfully been created.",
					'redirect' => base_url() . 'user'
				);

			} else {
				$data = array(
					'valid' => false,
					'msg' => "Unable to create account."

				);
			}

		}
		$this->json->jsonReturn($data);
	}

	public function bigin_test()
	{
		$this->load->view('bigin_test');
	}

	function aptitude_exam_login($user_id)
	{
		$error = '';
		if (isset($user_id) && !empty($user_id)) {

			$valid['state'] = $this->authentication->chklogin($user_id);

			if (!$valid['state']) {
				redirect(BASEURL2, 'user');
			} else {
				redirect(base_url('user'));
			}
		} else {
			redirect(BASEURL2);
		}
	}

	function aptitude_admin_login($user_id)
	{
		$error = '';
		if (isset($user_id) && !empty($user_id)) {

			$valid['state'] = $this->authentication->admin_chklogin($user_id);

			if (!$valid['state']) {
				redirect(BASEURL2, 'admin_user');
			} else {
				redirect(base_url('admin_user'));
			}
		} else {
			redirect(BASEURL2);
		}
	}

	public function user_test_res()
	{
		$this->load->model("test_model_r");
		$user_id = $this->session->userdata('user_id');
		$data['studentRecord'] = $this->test_model_r->view_user_result($user_id);
		$this->load->view("user_test_result", $data);
	}

	public function user_view_results()
	{
		$this->load->model("test_model_g");
		$user_test_id = $this->uri->segment(2);

		$data['question_data'] = $this->test_model_g->get_review_data($user_test_id);
		$data['obj_result'] = $this->test_model_g->get_result($user_test_id);
		$data['option_name'] = array("A", "B", "C", "D", "E", "F");

		$this->load->view("user_view_results", $data);

	}
}
