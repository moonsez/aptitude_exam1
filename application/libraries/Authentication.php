<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication
{

	function _construct() 
	{
	    $CI =& get_instance();     
		$CI->load->database('database');     
		$CI->load->library("session");
	} 
 
	function get_userdata() 
	{
	    $CI =& get_instance();     
		if( ! $this->logged_in())
		{        
			return false;
		}     
		else     
		{     
			//` (`user_id`, `username`, `password`, `role_id`, `display`     
			$query = $CI->db->get_where("tbl_userinfo", array("role_id" => $CI->session->userdata("role_id")));          
			return $query->row();     
		}
	 }
 
	function logged_in() 
	{     
		$CI =& get_instance();     
		return ($CI->session->userdata("role_id")) ? true : false; 
	}

	function chklogin($user_id) 
	{ 

		$CI =& get_instance();  
		$CI->db->select('*')->from('tbl_userinfo u')->join('tbl_employee_personal_details e','e.user_id=u.user_id');
		$CI->db->where("u.user_id",$user_id)->where("u.account_status",'activate')->where("u.display",'Y');
		$query = $CI->db->get();
		if($query->num_rows() != 1) 
		{
			return false;
		}     
		else     
		{ 
			$CI->session->set_userdata("user_id",$query->row()->user_id);
			$CI->session->set_userdata("email",$query->row()->email);
			$CI->session->set_userdata("salutation",$query->row()->salutation);
			$CI->session->set_userdata("username",$query->row()->firstname);
			$CI->session->set_userdata("last_name",$query->row()->lastname);
			$CI->session->set_userdata("role_id",$query->row()->role_id); 
			$CI->session->set_userdata("image_name", $query->row()->image_name);
			$CI->session->set_userdata("ISlogin", true);  
			$CI->session->sess_expire_on_close = TRUE;
			return true;  
		} 
	}

	function admin_chklogin($user_id) 
	{ 

		$CI =& get_instance();  
		$CI->db->select('*')->from('tbl_userinfo u')->join('tbl_employee_personal_details e','e.user_id=u.user_id');
		$CI->db->where("u.user_id",$user_id)->where("u.account_status",'activate')->where("u.display",'Y');
		$query = $CI->db->get();
		if($query->num_rows() != 1) 
		{
			return false;
		}     
		else     
		{ 
			$CI->session->set_userdata("user_id",$query->row()->user_id);
			$CI->session->set_userdata("email",$query->row()->email);
			$CI->session->set_userdata("salutation",$query->row()->salutation);
			$CI->session->set_userdata("username",$query->row()->firstname);
			$CI->session->set_userdata("last_name",$query->row()->lastname);
			$CI->session->set_userdata("role_id",$query->row()->role_id); 
			$CI->session->set_userdata("image_name", $query->row()->image_name);
			$CI->session->set_userdata("apptitude_tracker_admin", $query->row()->apptitude_tracker_admin);
			$CI->session->set_userdata("ISlogin", true);  
			$CI->session->sess_expire_on_close = TRUE;
			return true;  
		} 
	}

	function chklogin1($username,$password,$role) 
	{     
		// $CI =& get_instance(); 
		// $pass = md5(sha1($password)); 
		// $data = "(email = '$name' AND password = '$pass' AND role_id = '$role' AND display='Y' AND status='pending')";
		// $CI->db->where($data);
	    // $query = $CI->db->get_where("tbl_userinfo");     
		// if($query->num_rows()!=1)
		// {        
		// 	return false;
		// }     
		// else     
		// {         
		// 	//store user id in the session        
		// 	$CI->session->set_userdata("exam_user_id",$query->row()->user_id);		 
		// 	$CI->session->set_userdata("exam_email", $query->row()->email);
		// 	$CI->session->set_userdata("exam_user_name", $query->row()->email);
        //     $CI->session->set_userdata("language",'English');
		// 	$CI->session->set_userdata("exam_role_id",$query->row()->role_id);
		// 	$CI->session->set_userdata("exam_account_status",$query->row()->status);	
	 	// 	$CI->session->set_userdata("exam_ISlogin", true);         
		// 	$CI->session->sess_expire_on_close = TRUE;
		// 	return true;     
		// } 
		$pass = md5(sha1($password)); 
		$CI =& get_instance();  
		$CI->db->select('*')->from('tbl_userinfo u')->join('tbl_employee_personal_details e','e.user_id=u.user_id');
		$CI->db->where("u.username",$username)->where("u.password",$pass)->where("u.account_status",'activate')->where("u.display",'Y');
		$query = $CI->db->get();
		//echo $CI->db->last_query();die;
		if($query->num_rows() != 1) 
		{
			return false;
		}     
		else     
		{ 
			$CI->session->set_userdata("user_id",$query->row()->user_id);
			$CI->session->set_userdata("email",$query->row()->email);
			$CI->session->set_userdata("salutation",$query->row()->salutation);
			$CI->session->set_userdata("username",$query->row()->firstname);
			$CI->session->set_userdata("last_name",$query->row()->lastname);
			$CI->session->set_userdata("role_id",$query->row()->role_id); 
			$CI->session->set_userdata("image_name", $query->row()->image_name);
			$CI->session->set_userdata("ISlogin", true);  
			$CI->session->sess_expire_on_close = TRUE;
			return true;  
		} 
	}

	function logout() 
	{	     
		$CI =& get_instance();
		
		// $CI->session->unset_userdata("exam_user_id");
		// $CI->session->unset_userdata("exam_user_name");
		// $CI->session->unset_userdata("exam_role_id");				 
		// $CI->session->unset_userdata("exam_account_status");				 
		// $CI->session->unset_userdata("exam_ISlogin");
		// $CI->session->unset_userdata("user_id");
		// $CI->session->unset_userdata("user_name");
		// $CI->session->unset_userdata("role_id");				 
		// $CI->session->unset_userdata("account_status");				 
		// $CI->session->unset_userdata("language_id");				 
		// $CI->session->unset_userdata("ISlogin");
		$CI->session->unset_userdata("user_id");
		$CI->session->unset_userdata("salutation");
		$CI->session->unset_userdata("username");
		$CI->session->unset_userdata("last_name");
		$CI->session->unset_userdata("role_id");
		$CI->session->unset_userdata("image_name");
		$CI->session->unset_userdata("ISlogin");			
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * email_available
	 * Check email does not exist in database.
	 * NOTE: This should not be used if the email field is defined in the 'identity_cols' set via the config file.
	 * In this case, use the identity_available() function instead.
	 * 
	 * @return bool
	 * @author Rob Hussey
	 */
	public function email_available($email = FALSE, $role_id = FALSE)
	{	
		//echo "email".$email;
		$CI =& get_instance();
	    if (empty($email))
	    {
			return FALSE;
	    }

		// Try and get the $user_id from the users current session if not passed to function.
		if (!is_numeric($role_id) && !empty($role_id))
		{
			$role_id = $CI->session->userdata("role_id");
		}

		// If $user_id is set, remove user from query so their current email is not found during the duplicate email check.
		if (is_numeric($role_id))
		{
			$CI->db->where('role_id',$role_id);
		}
		
	     $result=$CI->db->where('email', $email)->count_all_results('tbl_userinfo') == 0;
	     return $result;
	}

	// Intern code
	// public function check_intern_info($email = FALSE, $mobile_no = FALSE, $date_of_birth = FALSE, $role_id = FALSE)
	// {
	// 	$CI =& get_instance();
	// 	if (empty($email) || empty($mobile_no) || empty($date_of_birth)) {
	// 		return FALSE;
	// 	}
	// 	// Check if the combination of email, mobile_no, and date_of_birth exists
	// 	$CI->db->where('email', $email);
	// 	$CI->db->where('mobile_no', $mobile_no);
	// 	$CI->db->where('date_of_birth', $date_of_birth);
	// 	$result = $CI->db->count_all_results('tbl_intern_info');

	// 	return $result == 0; // Return true if no records found (i.e., available)
	// }

	// Code to login as intern
	// function chkinternlogin($login_id, $password, $role) 
	// { 
	// 	$pass = md5(sha1($password)); 
	// 	$CI =& get_instance();  
	// 	$CI->db->select('*')->from('tbl_intern_info');
	// 	$CI->db->where("login_id",$login_id)->where("password_hash",$pass)->where("role_id",$role)->where("status",'Active')->where("display",'Y');
	// 	$query = $CI->db->get();
	// 	//echo $CI->db->last_query();die;
	// 	if($query->num_rows() != 1) 
	// 	{
	// 		return false;
	// 	}     
	// 	else     
	// 	{ 
	// 		//print_r($query->row());die;
	// 		$CI->session->set_userdata("user_id",$query->row()->user_id);
	// 		$CI->session->set_userdata("email",$query->row()->email);
	// 		$CI->session->set_userdata("user_name",$query->row()->user_name);
	// 		$CI->session->set_userdata("login_id",$query->row()->login_id);
	// 		$CI->session->set_userdata("role_id",$query->row()->role_id); 
	// 		$CI->session->set_userdata("ISlogin", true);  
	// 		$CI->session->sess_expire_on_close = TRUE;
	// 		return true;  
	// 	} 
	// }

	// function intern_logged_in() 
	// {     
	// 	$CI =& get_instance();     
	// 	return ($CI->session->userdata("role_id")) ? true : false; 
	// }


	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
}/*class end*/