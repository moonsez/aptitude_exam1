<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Test_model_g extends CI_Model
{

	public function user_data($userId)
	{
		$query = $this->db->query('SELECT tu.user_id,tt.station_type_name,concat((tir.salutation),(" "),(tir.firstname),(" "),(tir.lastname)) emp_name,tu.designation,tu.organisation,tir.image_name,tdm.dept_master_name FROM tbl_userinfo tu LEFT JOIN tbl_employee_personal_details tir ON tu.user_id=tir.user_id LEFT JOIN tbl_station_type tt ON tt.station_type_id=tu.emp_station_id LEFT JOIN tbl_user_station_dept tusd ON tusd.usd_id = tu.usd_id LEFT JOIN tbl_department_station tds ON tds.stat_dept_id = tusd.stat_dept_id LEFT JOIN tbl_department_master tdm ON tdm.dept_master_id = tds.dept_master_id WHERE tu.user_id=?', array($userId));

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}




	public function register_user($user_data)
	{
		$this->db->trans_start();
		$this->db->insert("tbl_userinfo", $user_data);
		$id = $this->db->insert_id();
		$query = $this->db->trans_complete();
		if ($query) {
			return true;
		} else {
			return false;
		}

	}

	// public function getSectionList()
	// {
	// 	$query=$this->db->query("select ts.section_id,ts.section_name,tss.sub_section_id,tss.sub_section_name from tbl_section as ts LEFT JOIN tbl_subsection as tss  ON ts.section_id=tss.section_id where ts.display='Y'");
	// 	if($query->num_rows()>0)
	// 	{
	// 		return $query->result();
	// 	}else
	// 	{
	// 		return null;
	// 	}
	// }

	public function getSectionList()
	{
		$query = $this->db->query("select tnm.per_mark,GROUP_CONCAT(tss.dept_master_name ORDER BY tss.dept_master_id) AS department_names,tst.station_type_name,ts.* from tbl_test_configuration as ts LEFT JOIN tbl_department_master as tss ON FIND_IN_SET(tss.dept_master_id,ts.dept_master_id) LEFT JOIN tbl_station_type as tst ON tst.station_type_id=ts.station_type_id LEFT JOIN tbl_negative_master tnm ON tnm.negative_id = ts.negative_marking AND tnm.display = 'Y' where ts.display='Y' GROUP BY ts.test_configuration_id");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	public function getallsections($section_id, $sub_section_id)
	{
		$query = $this->db->query('select ts.test_sections_id,ts.section_id,ts.sub_section_id from tbl_test_sections as ts where ts.display="Y" AND ts.section_id=? AND ts.sub_section_id=?', array($section_id, $sub_section_id));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function save_configuration1($configuration_array, $online_test_details)
	{



		$this->db->trans_start();
		$this->db->empty_table("tbl_test_configuration");
		$this->db->insert("tbl_test_configuration", $configuration_array);
		$this->db->insert_batch("tbl_test_sections", $online_test_details);

		/*$this->db->empty_table("tbl_test_sections");
			  $this->db->insert_batch("tbl_test_sections",$section);*/
		$query = $this->db->trans_complete();

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function test_details()
	{
		$query = $this->db->query("SELECT * FROM tbl_test_configuration AS tts,tbl_department_station AS ts WHERE tts.dept_master_id = ts.dept_master_id");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function getTestSectionList()
	{
		$query = $this->db->query("select * from tbl_test_sections");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}




	public function getConfiguration($user_id, $emp_dept)
	{
		$query = $this->db->query("select GROUP_CONCAT(ttc.test_configuration_id ORDER BY ttc.test_datetime ASC) as test_id from tbl_test_configuration ttc WHERE ttc.test_configuration_id NOT IN (SELECT tut.test_id FROM tbl_user_test as tut JOIN tbl_test_configuration as ttc ON ttc.test_configuration_id = tut.test_id WHERE tut.display = 'Y' AND tut.user_id = ?) and ttc.display='Y' AND (ttc.dept_master_id = 0 OR FIND_IN_SET(?, ttc.dept_master_id) > 0)and DATE_FORMAT(ttc.test_datetime,'%Y-%m-%d')=CURRENT_DATE GROUP BY DATE_FORMAT(ttc.test_datetime,'%Y-%m-%d')", array($user_id, $emp_dept));

		if ($query->num_rows() == 1) {
			return $query->row()->test_id;
		} else {
			return null;
		}
	}

	// public function get_test_data($user_id)
	// {
	// 	$data=array();
	// 	$query=$this->db->query("SELECT ts.section_id,tss.sub_section_id,s.section_name,tss.sub_section_name,ts.no_of_que,ts.duration,ts.total_marks 
	// 		FROM tbl_section s 
	// 		join tbl_test_sections ts on s.section_id=ts.section_id 
	// 		LEFT JOIN tbl_subsection tss ON tss.sub_section_id=ts.sub_section_id
	// 		LEFT JOIN tbl_userinfo as tu ON tu.section_id=ts.section_id 
	// 		AND tu.sub_section_id=ts.sub_section_id 
	// 		where ts.display='Y' AND tu.user_id=?",array($user_id));
	// 	if($query->num_rows()>0)
	// 	{
	// 		foreach ($query->result() as $key ) {
	// 		$section_data["section"]=$key;

	// 		$section_id=$key->section_id;
	// 		$sub_section_id=$key->sub_section_id;
	// 		$limit=$key->no_of_que;	
	// 		$question_query=$this->db->query("select * from tbl_reference r  right join (SELECT * FROM tbl_question where display='Y' and section_id=? and sub_section_id=? ) q on q.reference_id=r.reference_id  group by q.reference_id,q.question_id order by rand() LIMIT ".$limit,array($section_id,$sub_section_id));

	// 			if($question_query->num_rows()>0)
	// 			{	$question=array();
	// 				foreach ($question_query->result() as $row ) {

	// 					$question_id=$row->question_id;
	// 					$question_data['question']=$row;
	// 					//print_r($question_data);
	// 					//exit();
	// 					$option_query=$this->db->query("select * from tbl_option where question_id=? and display='Y'",array($question_id));
	// 					if($option_query->num_rows()>0)
	// 					{
	// 						$question_data['option']=$option_query->result();
	// 					}else
	// 					{
	// 						$question_data['option']=null;

	// 					}
	// 					$question[]=$question_data;
	// 				}
	// 				//echo '<br/>';
	// 				//print_r(count($question));
	// 			}else
	// 			{
	// 				    $question=null;
	// 			}

	// 			$section_data["question_list"]=$question;
	// 			if(isset($question) && !empty($question))
	// 			{
	// 			$data[]=$section_data;
	// 			}
	// 		}
	// 		return $data;

	// 	}else
	// 	{
	// 		return null;
	// 	}

	// 	//print_r($data[0]);
	// }

	public function get_test_data($user_id)
	{
		$data = array();
		$query = $this->db->query('SELECT concat((tep.salutation),(" "),(tep.firstname),(" "),(tep.lastname)) emp_name, tu.email, tdm.dept_master_id, tst.station_type_id, ttc.question_count,ttc.test_time,ttc.test_configuration_id FROM tbl_employee_personal_details AS tep
              LEFT JOIN tbl_userinfo AS tu ON tep.user_id = tu.user_id AND tu.display="Y"
          		LEFT JOIN tbl_user_station_dept AS tusd ON tusd.usd_id=tu.usd_id AND tusd.display="Y"
          		LEFT JOIN tbl_department_station AS tds ON tds.stat_dept_id=tusd.stat_dept_id AND tds.display="Y"
          		LEFT JOIN tbl_department_master AS tdm ON tds.dept_master_id=tdm.dept_master_id AND tdm.display="Y"
          		LEFT JOIN tbl_station_details AS tsd ON tds.station_id=tsd.station_id AND tsd.display="Y"
          		LEFT JOIN tbl_station_type AS tst ON tsd.station_type_id=tst.station_type_id AND tst.display="Y" 
                LEFT JOIN tbl_test_configuration ttc ON ttc.dept_master_id = tdm.dept_master_id AND ttc.station_type_id = tst.station_type_id AND ttc.display = "Y"
                WHERE tu.account_status = "activate" AND tu.user_id = ?', array($user_id));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key) {
				$section_data["section"] = $key;

				$dept_master_id = $key->dept_master_id;
				$station_type_id = $key->station_type_id;
				$limit = $key->question_count;

				$question_query = $this->db->query(" SELECT *  FROM (SELECT q.* FROM tbl_question q  WHERE q.dept_master_id = ? AND q.station_type_id = ? LIMIT " . $limit . ") AS subquery_alias 
             ORDER BY RAND()", array($dept_master_id, $station_type_id));


				if ($question_query->num_rows() > 0) {
					$question = array();
					foreach ($question_query->result() as $row) {

						$question_id = $row->question_id;
						$question_data['question'] = $row;

						$option_query = $this->db->query("select * from tbl_option where question_id=? and display='Y'", array($question_id));
						if ($option_query->num_rows() > 0) {
							$question_data['option'] = $option_query->result();
						} else {
							$question_data['option'] = null;

						}
						$question[] = $question_data;
					}
				} else {
					$question = null;
				}

				$section_data["question_list"] = $question;
				if (isset($question) && !empty($question)) {
					$data[] = $section_data;
				}
			}
			return $data;

		} else {
			return null;
		}
	}

	public function get_test_data1($user_id)
	{
		$query = $this->db->query('SELECT concat((tep.salutation),(" "),(tep.firstname),(" "),(tep.lastname)) emp_name, tu.email, tdm.dept_master_id, tst.station_type_id, ttc.question_count,ttc.test_time,ttc.test_configuration_id,ttc.negative_marking,ttc.total_mark,tnm.per_mark FROM tbl_employee_personal_details AS tep
              LEFT JOIN tbl_userinfo AS tu ON tep.user_id = tu.user_id AND tu.display="Y"
          		JOIN tbl_user_station_dept AS tusd ON tusd.usd_id=tu.usd_id AND tusd.display="Y"
          		JOIN tbl_department_station AS tds ON tds.stat_dept_id=tusd.stat_dept_id AND tds.display="Y"
          		JOIN tbl_department_master AS tdm ON tds.dept_master_id=tdm.dept_master_id AND tdm.display="Y"
          		JOIN tbl_station_details AS tsd ON tds.station_id=tsd.station_id AND tsd.display="Y"
          		JOIN tbl_station_type AS tst ON tsd.station_type_id=tst.station_type_id AND tst.display="Y" 
                JOIN tbl_test_configuration ttc ON ttc.dept_master_id = tdm.dept_master_id AND ttc.station_type_id = tst.station_type_id AND ttc.display = "Y"
                LEFT JOIN tbl_negative_master tnm ON tnm.negative_id = ttc.negative_marking AND tnm.display="Y"
                WHERE tu.account_status = "activate" AND tu.user_id = ?', array($user_id));

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function get_latest_test_data($test_conf_id)
	{
		$query = $this->db->query('SELECT tnm.per_mark,ttc.* FROM tbl_test_configuration ttc LEFT JOIN tbl_negative_master tnm ON tnm.negative_id = ttc.negative_marking WHERE ttc.display = "Y" AND ttc.test_configuration_id = ?', array($test_conf_id));

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function getQuestionList()
	{
		$query = $this->db->query("select * from tbl_question where display='Y'");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	public function save_test($user_test_data, $user_que_data)
	{
		$this->db->trans_start();

		$user_test_id = 0;
		if (!empty($user_test_data)) {
			$this->db->insert('tbl_user_test', $user_test_data);
			$user_test_id = $this->db->insert_id();
		}

		if (!empty($user_que_data)) {
			for ($j = 0; $j < count($user_que_data); $j++) {
				$user_que_data[$j]['user_test_id'] = $user_test_id;
			}
			$this->db->insert_batch("tbl_user_answer", $user_que_data);
		}

		$query = $this->db->trans_complete();

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function get_review_data($user_test_id)
	{
		$data=array();
		$query=$this->db->query("SELECT ua.*, tu.dept_master_id 
		FROM tbl_user_test ua 
		join tbl_test_configuration tu on tu.test_configuration_id = ua.test_id
		WHERE ua.display = 'Y' AND ua.user_test_id = ? ",array($user_test_id));
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $key ) {
			$section_data["section"]=$key;
				
			$user_test_id=$key->user_test_id;
			
			$question_query=$this->db->query("select q.*,ua.option_id user_ans from tbl_user_answer ua join tbl_question q on q.question_id=ua.question_id WHERE ua.user_test_id=? and ua.display='Y' ",array($user_test_id));
				
				if($question_query->num_rows()>0)
				{	$question=array();
					foreach ($question_query->result() as $row ) {

						$question_id=$row->question_id;
						$question_data['question']=$row;
						$option_query=$this->db->query("select * from tbl_option where question_id=? and display='Y'",array($question_id));
						if($option_query->num_rows()>0)
						{
							$question_data['option']=$option_query->result();
						}else
						{
							$question_data['option']=null;

						}
						$question[]=$question_data;
					}
				}else
				{
					    $question=null;
				}

				$section_data["question_list"]=$question;
				$data[]=$section_data;
			}
			return $data;
			
		}else
		{
			return null;
		}
	}

	public function get_test_result($user_id)
	{
		$query = $this->db->query("select count(*) total_count,sum(if(ua.option_id=q.option_id,1,0)) correct_count,sum(if(ISNULL(ua.option_id),1,0)) not_attempt from tbl_user_answer ua join tbl_question q on ua.question_id=q.question_id and ua.user_id=?", array($user_id));
		//echo $this->db->last_query();
		if ($query->num_rows() > 0) {
			$total_count = $query->row(0)->total_count;
			$correct_count = $query->row(0)->correct_count / $total_count;
			$not_attempt = $query->row(0)->not_attempt / $total_count;
			$incorrect_count = ($total_count - ($query->row(0)->correct_count + $query->row(0)->not_attempt)) / $total_count;
			$data = array(
				array('label' => 'Correct Answers', 'data' => $correct_count),
				array('label' => 'Not Attempted Question', 'data' => $not_attempt),
				array('label' => 'Incorrect Answers', 'data' => $incorrect_count)
			);


		}
		return $data;
	}

	public function get_result($user_test_id)
	{
		$query=$this->db->query("select u.username, CONCAT(tepd.salutation,' ',tepd.firstname,' ',tepd.middlename,' ',tepd.lastname) AS fullname, count(*) as total_count, sum(if(tu.option_id=q.option_id,1,0)) correct_count,  SUM(IF(tu.option_id IS NOT NULL AND tu.option_id != q.option_id, 1, 0)) AS incorrect_count,(ttc.question_count - COUNT(tu.option_id)) AS not_attended_count, ttc.question_count, tnm.per_mark, ttc.total_mark, ttc.test_time,
			ua.start_time,
    		ua.submitted_time,
   			SEC_TO_TIME(TIMESTAMPDIFF(SECOND, ua.start_time, ua.submitted_time)) AS response_time
			from tbl_user_test ua 
			LEFT JOIN tbl_userinfo u on u.user_id=ua.user_id 
			LEFT JOIN tbl_employee_personal_details tepd ON tepd.user_id = u.user_id 
			LEFT JOIN tbl_test_configuration ttc ON ttc.test_configuration_id = ua.test_id 
			LEFT JOIN tbl_user_answer tu ON tu.user_test_id = ua.user_test_id 
			left join tbl_question q on tu.question_id=q.question_id 
			left join tbl_negative_master tnm on tnm.negative_id = ttc.negative_marking 
			where ua.user_test_id = ? AND ua.display = 'Y'",array($user_test_id));

		if($query->num_rows()== 1)
		{
			
			return $query->row();
		}
		else
		{
			return false;
		}		
	}
	
	public function get_sectionValue($user_id)
	{
		$query = $this->db->query("select distinct tu.section_id,tu.sub_section_id from tbl_userinfo as tu LEFT JOIN tbl_test_sections as tts ON tu.section_id=tts.section_id LEFT JOIN tbl_subsection as tss ON tu.section_id=tss.sub_section_id where tu.user_id=?", array($user_id));
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	public function save_cerificate($user_test_id)
	{
		$this->load->model('master_model');
		$this->load->model('test_model_r');
		$this->load->library('report_creation');
		$user_test_data = $this->master_model->selectDetailsWhr('tbl_user_test', 'user_test_id', $user_test_id);
		$data['user_details'] = $this->user_data($user_test_data->user_id);
		$data['testData'] = $this->test_model_r->selectans($user_test_id);

		$pdfname = "Moonsez_Certificate_" . $user_test_data->user_id;
		$html = $this->load->view('certificate', $data, TRUE);
		//print_r($html);die;
		$this->report_creation->create_pdf($html, $pdfname);
	}

	public function passage_result($user_id)
	{
		$query = $this->db->query("SELECT * FROM tbl_student_passage_history AS tsp WHERE tsp.student_id=?", array($user_id));
		if ($query->num_rows() == 1) {

			return $query->row();
		} else {
			return false;
		}
	}


	public function getSingleTestConfiguration($id)
	{
		$query = $this->db->query("select * from tbl_test_configuration where test_configuration_id = ?", array($id));

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function getAllTestNamesFromQuestionMaster()
	{
		$query = $this->db->query('SELECT test_name FROM tbl_question WHERE display = "Y" GROUP BY test_name');

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function get_question_data($user_id, $test_name, $limit)
	{
		$data = array();
		$query = $this->db->query('SELECT concat((tep.salutation),(" "),(tep.firstname),(" "),(tep.lastname)) emp_name, tu.email FROM tbl_employee_personal_details AS tep
              LEFT JOIN tbl_userinfo AS tu ON tep.user_id = tu.user_id AND tu.display="Y"
                WHERE tu.account_status = "activate" AND tu.user_id = ?', array($user_id));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key) {
				$section_data["section"] = $key;

				$test1 = explode(",", $test_name);
				$test2 = "'" . implode("','", $test1) . "'";
				$question_query = $this->db->query('SELECT * FROM (SELECT tq.* FROM tbl_question tq LEFT JOIN tbl_test_configuration ttc ON FIND_IN_SET(tq.test_name,ttc.test_name) AND ttc.display = "Y" WHERE tq.display = "Y" AND tq.test_name IN(' . $test2 . ') LIMIT ' . $limit . ') AS subquery_alias ORDER BY RAND()');


				if ($question_query->num_rows() > 0) {
					$question = array();
					foreach ($question_query->result() as $row) {

						$question_id = $row->question_id;
						$question_data['question'] = $row;

						$option_query = $this->db->query("select * from tbl_option where question_id=? and display='Y'", array($question_id));
						if ($option_query->num_rows() > 0) {
							$question_data['option'] = $option_query->result();
						} else {
							$question_data['option'] = null;

						}
						$question[] = $question_data;
					}
				} else {
					$question = null;
				}

				$section_data["question_list"] = $question;
				if (isset($question) && !empty($question)) {
					$data[] = $section_data;
				}
			}
			return $data;

		} else {
			return null;
		}
	}

	public function isTodayTestScehduled()
	{
		$query = $this->db->query("SELECT * FROM `tbl_test_configuration` where display = 'Y' AND DATE_FORMAT(test_datetime,'%Y-%m-%d') = CURDATE() ORDER BY test_datetime ASC");

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	// public function get_employee_latest_data($test_id,$user_id,$test_status)
	// {
	//    	$query=$this->db->query('SELECT test_id,user_id,test_date,test_status FROM `tbl_user_test` where test_id=? and user_id=? 
	// 	and display="Y" and test_status=?;',array($test_id,$user_id,$test_status));	    
	//     if($query->num_rows()== 1)
	// 	{	
	// 		return $query->row();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}	
	// }

	// query to show upcoming exams
	public function upcomingexamList()
	{
		$query = $this->db->query("SELECT tnm.per_mark, tss.dept_master_name, tst.station_type_name, ts.* FROM tbl_test_configuration AS ts
LEFT JOIN tbl_department_master AS tss ON ts.dept_master_id = tss.dept_master_id
LEFT JOIN tbl_station_type AS tst ON tst.station_type_id = ts.station_type_id
LEFT JOIN tbl_negative_master tnm ON tnm.negative_id = ts.negative_marking AND tnm.display = 'Y'
WHERE ts.display = 'Y'
  AND ts.test_datetime > NOW();
");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

    public function getTestDataByTestIdByUserId($aptitude_test_id, $user_id)
    {
        $query = $this->db->query("SELECT tut.*, ttc.test_time, ttc.test_datetime FROM tbl_user_test as tut JOIN tbl_test_configuration AS ttc ON ttc.test_configuration_id = tut.test_id WHERE tut.test_id = ? AND tut.user_id = ? AND tut.test_status = 'submitted' AND tut.display = 'Y'", array($aptitude_test_id, $user_id));

        if($query->num_rows()== 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    public function getTodayExamUserByDateByDept()
    {
        $query = $this->db->query("SELECT ttc.*
            FROM tbl_test_configuration ttc
            WHERE DATE_FORMAT(ttc.test_datetime,'%Y-%m-%d') = CURRENT_DATE AND ttc.display = 'Y'");

        $data = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $dept_master_id = $key->dept_master_id;

                $sql = "SELECT tepd.emp_id, tu.user_id, tu.username, CONCAT(tepd.salutation,' ',tepd.firstname,' ', tepd.lastname) AS fullname,
                           tet.title, tdm.dept_master_name, tsd.station_name, tst.station_type_name 
                    FROM tbl_userinfo AS tu
                    JOIN tbl_employee_personal_details AS tepd ON tu.user_id = tepd.user_id
                    JOIN tbl_user_emp_type AS tuet ON tu.uet_id = tuet.uet_id
                    JOIN tbl_employee_type AS tet ON tuet.emp_type_id = tet.emp_type_id
                    JOIN tbl_user_station_dept AS tusd ON tu.usd_id = tusd.usd_id
                    JOIN tbl_department_station AS tds ON tusd.stat_dept_id = tds.stat_dept_id
                    JOIN tbl_department_master AS tdm ON tds.dept_master_id = tdm.dept_master_id
                    JOIN tbl_station_details AS tsd ON tds.station_id = tsd.station_id
                    JOIN tbl_station_type AS tst ON tsd.station_type_id = tst.station_type_id
                    WHERE tu.account_status = 'activate' AND tu.display = 'Y' AND tepd.display = 'Y'";

                if ($dept_master_id != 0) {
                    $sql .= " AND tdm.dept_master_id IN (?)";
                    $sub_query = $this->db->query($sql, array($dept_master_id));
                } else {
                    $sub_query = $this->db->query($sql);
                }

                if ($sub_query->num_rows() > 0) {
                    $data[] = array('key' => $key, 'dept_wise_user' => $sub_query->result());
                }
            }
            return $data;
        } else {
            return false;
        }
    }
}
/* End of file demo_cart_model.php */
/* Location: ./application/models/demo_cart_model.php */