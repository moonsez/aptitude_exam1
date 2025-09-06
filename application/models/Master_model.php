<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {

	public function addData($tablename,$data)
	{
		$query=$this->db->insert($tablename,$data);

		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}			
	}

	public function updateDetails($tblname,$where,$condition,$data)
	{
	
		$this->db->where($where, $condition);
		$query = $this->db->update($tblname, $data); 
		return $query;
	}

	public function updateTestDetails($tblname,$data)
	{
		
		$data1=count($data);
		//$where=$this->db->where('test_sections_id',$test_id);
		$query = $this->db->update_batch($tblname,$data,'test_sections_id'); 
		return $query;
	  
	    
	}
	public function selectsubSection($sub_section_id)
	{
		$query = $this->db->query("SELECT * FROM tbl_section AS ts,tbl_subsection as tss WHERE ts.section_id =tss.section_id AND tss.display='Y'AND tss.sub_section_id=?",array($sub_section_id));
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }
	}

	public function selectDetailsByDESC($tblname, $asc_column_name)
    {
       	$this->db->select("*");
	    $this->db->from($tblname);
       	$this->db->where('display','Y');
	    $this->db->order_by($asc_column_name, "desc");
	    $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }
    }
    public function selectSubsectionDetails($tblname)
    {
       	
      $query = $this->db->query("SELECT tss.section_id,tss.sub_section_id,tss.sub_section_name,ts.section_name FROM tbl_subsection AS tss LEFT JOIN tbl_section AS ts ON tss.section_id=ts.section_id WHERE tss.display='Y'");
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }

       	$this->db->select("*");
	    $this->db->from($tblname);
       	$this->db->where('display','Y');
	    $this->db->order_by($asc_column_name, "desc");
	    $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }

    }


    public function selectDetailsWhr($tblname,$where,$condition)
	{
		$this->db->where($where,$condition);
		$this->db->where('display','Y');
		$query = $this->db->get($tblname);
		if($query->num_rows()== 1)
		{
			
			return $query->row();
		}
		else
		{
			return false;
		}			
	}

	public function selectAllWhr($tblname,$where,$condition)
	{
		$this->db->where($where,$condition);
		$this->db->where('display','Y');
		$query = $this->db->get($tblname);
		if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }		
	}
	public function selecttestdata()
	{
	$query= $this->db->query("SELECT tts.test_sections_id,tts.section_id,ts.section_name FROM tbl_test_sections as tts LEFT JOIN tbl_section as ts ON tts.section_id=ts.section_id WHERE tts.display='Y'");
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }
	}
	public function getstudentdata()
	{
	$query= $this->db->query("SELECT tu.user_id,tu.section_id,tu.sub_section_id,tu.username,tu.email,tu.mobile_no,tu.organisation,tu.district,ts.section_name,tss.sub_section_name from tbl_userinfo as tu LEFT JOIN tbl_section as ts ON tu.section_id=ts.section_id LEFT JOIN tbl_subsection as tss ON tu.sub_section_id=tss.sub_section_id where tu.role_id='2'and  tu.display='Y'");
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
        	return false;
        }
	}

	public function selectPassageDetails($lang)
	{
		$query =$this->db->query("SELECT * FROM tbl_passage AS tp WHERE tp.display='Y' AND tp.language=? ORDER BY RAND() LIMIT 1",array($lang));
		if($query->num_rows()== 1)
		{			
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function check_result($user_id)
	{
		$passageData = $this->db->query("SELECT * FROM tbl_word_result AS twr JOIN tbl_word_que_heading AS twqh ON twr.que_file=twqh.que_file WHERE twr.display='Y' AND twr.user_id=?",array($user_id));	
		if($passageData->num_rows()== 1)
		{
			
			return $passageData->row();
		}
		else
		{
			return false;
		}	
	}

	public function view_email_question($lang)
	{
		$query =$this->db->query("SELECT * FROM tbl_email AS te WHERE te.display='Y' AND te.language=? ORDER BY RAND() LIMIT 1",array($lang));
		//echo $this->db->last_query();
		if($query->num_rows()== 1)
		{			
			return $query->row();
		}
		else
		{
			return false;
		}			
	}

	public function fetchDataFromTable($table_name, $asc_by_col_name)
	{
		$this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($asc_by_col_name, "asc");
		$qry = $this->db->get();


		if($qry->num_rows()>0)
		{
			foreach ($qry->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
		}
		else
		{
			return false;
		}
	}

	public function check_test_already_exist($department,$location)
	{
		$query = $this->db->query('SELECT * FROM tbl_test_configuration WHERE display = "Y" AND dept_master_id = ? AND station_type_id = ?',array($department,$location));
		
        if($query->num_rows() > 0)
		{			
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function check_test_already_exist_update($department,$location,$test_configuration_id)
	{
		$query = $this->db->query('SELECT * FROM tbl_test_configuration WHERE display = "Y" AND dept_master_id = ? AND station_type_id = ? AND test_configuration_id NOT IN (?)',array($department,$location,$test_configuration_id));
		
        if($query->num_rows() > 0)
		{			
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function selectDetailsByDESCByLimitOne($tblname, $where, $condition, $asc_column_name)
    {
       	$this->db->select("*");
	    $this->db->from($tblname);
	    $this->db->where($where,$condition);
       	$this->db->where('display','Y');
	    $this->db->order_by($asc_column_name, "desc");
	    $this->db->limit(1);
	    
	    $query = $this->db->get();
        
        if($query->num_rows()== 1)
		{	
			return $query->row();
		}
		else
		{
			return false;
		}	
    }

    public function check_tt_with_existing_tests($department, $examdate, $test_time)
	{
//        $query = $this->db->query('SELECT DATE_ADD(test_datetime, INTERVAL test_time MINUTE) as test_endtime FROM tbl_test_configuration WHERE display = "Y" AND ? BETWEEN test_datetime AND DATE_ADD(test_datetime, INTERVAL test_time MINUTE) ORDER BY test_datetime DESC LIMIT 1',array($examdate));
//
//        if($query->num_rows() == 1)
//        {
//            return $query->row(0)->test_endtime;
//        }
//        else
//        {
//            return false;
//        }
        // Calculate new test's end time
        $exam_end_time = date('Y-m-d H:i:s', strtotime($examdate) + ($test_time * 60));

        // Convert department CSV into array for loop match
        $input_dept_array = explode(',', $department);

        // Fetch all existing tests that overlap with time
        $this->db->select('test_datetime, test_time, dept_master_id, test_name');
        $this->db->from('tbl_test_configuration');
        $this->db->where('display', 'Y');
        $this->db->where("(('$examdate' BETWEEN test_datetime AND DATE_ADD(test_datetime, INTERVAL test_time MINUTE)) OR
            (test_datetime BETWEEN '$examdate' AND '$exam_end_time')
            )", null, false);

        $query = $this->db->get();
        $results = $query->result();

        foreach ($results as $test) {
            $existing_depts = explode(',', $test->dept_master_id);

            // If existing test is for all departments → conflict
            if (in_array("0", $existing_depts) || $test->dept_master_id == "0") {
                return $exam_end_time;
            }

            // Check for intersection between input departments and existing test departments
            $overlap = array_intersect($input_dept_array, $existing_depts);
            if (!empty($overlap)) {
                return $exam_end_time;
            }
        }

        return false;
	}

	public function check_tt_with_existing_tests_update($department, $examdate, $test_time, $test_configuration_id)
	{
//		$query = $this->db->query('SELECT DATE_ADD(test_datetime, INTERVAL test_time MINUTE) as test_endtime FROM tbl_test_configuration WHERE display = "Y" AND ? BETWEEN test_datetime AND DATE_ADD(test_datetime, INTERVAL test_time MINUTE) AND test_configuration_id NOT IN (?) ORDER BY test_datetime DESC LIMIT 1',array($examdate,$test_configuration_id));
//
//        if($query->num_rows() == 1)
//		{
//			return $query->row(0)->test_endtime;
//		}
//		else
//		{
//			return false;
//		}
        // Calculate new test's end time
        $exam_end_time = date('Y-m-d H:i:s', strtotime($examdate) + ($test_time * 60));

        // Convert department CSV into array for loop match
        $input_dept_array = explode(',', $department);

        // Fetch all existing tests that overlap with time
        $this->db->select('test_datetime, test_time, dept_master_id, test_name');
        $this->db->from('tbl_test_configuration');
        $this->db->where('display', 'Y');
        $this->db->where("(('$examdate' BETWEEN test_datetime AND DATE_ADD(test_datetime, INTERVAL test_time MINUTE)) OR
            (test_datetime BETWEEN '$examdate' AND '$exam_end_time')
            )", null, false);
        $this->db->where_not_in('test_configuration_id', $test_configuration_id);

        $query = $this->db->get();
        $results = $query->result();

        foreach ($results as $test) {
            $existing_depts = explode(',', $test->dept_master_id);

            // If existing test is for all departments → conflict
            if (in_array("0", $existing_depts) || $test->dept_master_id == "0") {
                return $exam_end_time;
            }

            // Check for intersection between input departments and existing test departments
            $overlap = array_intersect($input_dept_array, $existing_depts);
            if (!empty($overlap)) {
                return $exam_end_time;
            }
        }

        return false;
	}

	public function getDeptFromUserId($user_id)
	{
		$this->db->select('tds.dept_master_id')->from('tbl_userinfo u')->join('tbl_employee_personal_details e','e.user_id=u.user_id');
		$this->db->join('tbl_user_station_dept usd','usd.usd_id = u.usd_id AND usd.display = "Y"');
		$this->db->join('tbl_department_station tds','tds.stat_dept_id = usd.stat_dept_id AND tds.display = "Y"');
		$this->db->where("u.user_id",$user_id)->where("u.account_status",'activate')->where("u.display",'Y');
		
		$query = $this->db->get();
		
        if($query->num_rows() == 1)
		{			
			return $query->row(0)->dept_master_id;
		}
		else
		{
			return false;
		}
	}

	public function getLatestExamData($user_dept_id)
	{
		$query = $this->db->query('SELECT test_configuration_id FROM tbl_test_configuration WHERE (dept_master_id = ? OR dept_master_id = 0) AND display = "Y" ORDER BY test_datetime ASC LIMIT 1',array($user_dept_id));
		
        if($query->num_rows() == 1)
		{			
			return $query->row(0)->test_configuration_id;
		}
		else
		{
			return false;
		}
	}

    public function selectDetailsWhrWhr($tblname,$where,$condition,$where1,$condition1)
    {
        $this->db->where($where,$condition);
        $this->db->where($where1,$condition1);
        $this->db->where('display','Y');
        $query = $this->db->get($tblname);
        if($query->num_rows()>0)
        {
            return $query->row(0);
        }
        else
        {
            return false;
        }
    }
}