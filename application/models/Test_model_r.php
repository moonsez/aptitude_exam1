<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Test_model_r extends CI_Model
{

	public function insert_question($question_data, $option_data, $ans_option)
	{
		$this->db->trans_start();

		$this->db->insert('tbl_question', $question_data);
		$question_id = $this->db->insert_id();

		for ($i = 0; $i < count($option_data); $i++) {
			$option_data[$i]['question_id'] = $question_id;
			$this->db->insert('tbl_option', $option_data[$i]);
			if ($ans_option == $i + 1) {
				$option_id = $this->db->insert_id();
				$this->db->where('question_id', $question_id);
				$this->db->update('tbl_question', array('option_id' => $option_id));
			}
		}
		//$this->db->insert_batch('tbl_option',$option_data);

		$query = $this->db->trans_complete();

		if ($query) {
			return $question_id;
		} else {
			return false;
		}
	}


	public function update_question($question_data, $option_data, $option_id, $question_id, $ans_option)
	{

		$this->db->trans_start();

		$this->db->where('question_id', $question_id)
			->update('tbl_question', $question_data);


		for ($i = 0; $i < count($option_data); $i++) {
			if (!empty($option_id[$i])) {
				$option_data[$i]['question_id'] = $question_id;
				$this->db->where('option_id', $option_id[$i])
					->update('tbl_option', $option_data[$i]);
				if ($ans_option == $i + 1) {
					$this->db->where('question_id', $question_id);
					$this->db->update('tbl_question', array('option_id' => $option_id[$i]));
				}
			} else {
				$option_data[$i]['question_id'] = $question_id;
				$this->db->insert('tbl_option', $option_data[$i]);
				if ($ans_option == $i + 1) {
					$option_id = $this->db->insert_id();
					$this->db->where('question_id', $question_id);
					$this->db->update('tbl_question', array('option_id' => $option_id[$i]));
				}
			}
		}

		$query = $this->db->trans_complete();

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function selectans($user_test_id)
	{
		$query = $this->db->query("SELECT tua.option_id AS user_answer,tq.option_id AS answer,(tts.total_mark/tts.question_count) as marks_per_que FROM tbl_user_test AS tut, tbl_user_answer AS tua, tbl_question AS tq, tbl_test_configuration AS tts WHERE tut.user_test_id = ? AND tut.user_test_id = tua.user_test_id AND tua.question_id=tq.question_id AND tut.test_id=tts.test_configuration_id ", array($user_test_id));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function selectQuestion()
	{
		$query = $this->db->query("SELECT tq.test_name,tq.question_id,ts.dept_master_name,tss.station_type_name,tq.question,tq.question_mar,top.option FROM tbl_question AS tq LEFT JOIN tbl_option as top ON tq.option_id = top.option_id AND top.display = 'Y' LEFT JOIN tbl_department_master AS ts ON tq.dept_master_id=ts.dept_master_id AND ts.display = 'Y' LEFT JOIN tbl_station_type as tss ON tq.station_type_id =tss.station_type_id AND tss.display='Y' WHERE tq.display='Y'");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function fetch_question_data($question_id)
	{
		$query = $this->db->query('SELECT ts.section_name,tss.sub_section_name,tr.reference_name FROM tbl_question tq LEFT JOIN tbl_section as ts ON ts.section_id=tq.section_id LEFT JOIN tbl_subsection as tss ON tss.sub_section_id=tq.sub_section_id LEFT JOIN tbl_reference as tr ON tr.reference_id=tq.reference_id WHERE tq.display="Y" and tq.question_id=?', array($question_id));


		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}
	public function view_student_result()
	{
		$query = $this->db->query("SELECT ttc.*
			FROM tbl_test_configuration ttc 
			WHERE ttc.display = 'Y' ORDER BY ttc.test_datetime DESC");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function insert_excel_question($question_data, $option_data)
	{
		$this->db->trans_start();
		// echo '<pre>';
		// print_r($question_data);
		// echo '<pre>';
		// print_r($option_data);
		// die;
		for ($i = 0; $i < count($question_data); $i++) {
			$question_id = '';
			$option_d = [];
			$question_mar = '';
			$option_id = '';

			$this->db->insert('tbl_question', $question_data[$i]);
			$question_id = $this->db->insert_id();

			$option_d = $option_data[$i];
			$opt_data = [];
			for ($j = 0; $j < count($option_d); $j++) {
				$opt_data[] = array('option' => $option_d[$j], 'question_id' => $question_id);
			}

			$this->db->insert_batch('tbl_option', $opt_data);

			$question_mar = trim($question_data[$i]['question_mar']);

			if (!empty($question_mar)) {
				$option_id = $this->selectDetailsWhrWhr('tbl_option', 'option', $question_mar, 'question_id', $question_id);

				if (!empty($option_id)) {
					$this->db->where('question_id', $question_id);
					$this->db->update('tbl_question', array('option_id' => $option_id));
				}
			}
		}

		$query = $this->db->trans_complete();

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function check_que_already_exist($question)
	{
		$query = $this->db->query('SELECT * FROM tbl_question WHERE display = "Y" AND question LIKE "%' . htmlentities($question) . '%"');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function check_que_already_exist_update($question, $question_id)
	{
		$query = $this->db->query('SELECT * FROM tbl_question WHERE question LIKE "%' . $question . '%" AND display = "Y" AND question_id NOT IN (' . $question_id . ')');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function selectDetailsWhrWhr($tblname, $where, $condition, $where1, $condition1)
	{
		$this->db->where($where, $condition);
		$this->db->where($where1, $condition1);
		$this->db->where('display', 'Y');
		$query = $this->db->get($tblname);

		if ($query->num_rows() == 1) {

			return $query->row()->option_id;
		} else {
			return false;
		}
	}

	public function view_user_result($user_id)
	{
		$query = $this->db->query("SELECT tua.user_test_id,ttc.*
			FROM tbl_user_test AS tua 
			LEFT JOIN tbl_userinfo AS tu ON tu.user_id=tua.user_id 
			LEFT JOIN tbl_department_master as tir ON tu.user_id=tir.dept_master_id 
			LEFT JOIN tbl_employee_personal_details tepd ON tepd.user_id = tu.user_id
			LEFT JOIN tbl_test_configuration ttc ON ttc.test_configuration_id = tua.test_id
			WHERE tua.display = 'Y' AND tua.user_id = ?", array($user_id));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function view_test_result($test_id)
	{
		$query = $this->db->query("
     SELECT 
    u.username, 
    tii.user_name,
    ua.user_id,
    
    -- Full name logic
    IF(tii.user_name IS NOT NULL AND TRIM(tii.user_name) != '', 
       tii.user_name, 
       CONCAT(tepd.firstname, ' ', COALESCE(tepd.middlename, ''), ' ', tepd.lastname)
    ) AS fullname,
    
    -- Department shown only for employees
    IF(tii.user_name IS NOT NULL, NULL, tdm.dept_master_name) AS dept_master_name,
    
    -- Designation only for employees
    IF(tii.user_name IS NOT NULL, NULL, tet.title) AS title,
    
    -- Joining date: intern or employee
    IF(tii.user_name IS NOT NULL, tii.joining_date, tepd.emp_joining_date) AS emp_joining_date,
    
    -- Station type only for employees
    IF(tii.user_name IS NOT NULL, NULL, tst.station_type_name) AS station_type_name,
    
    COUNT(tu.user_test_id) AS total_count, 
    SUM(IF(tu.option_id IS NOT NULL AND tu.option_id = q.option_id, 1, 0)) AS correct_count, 
    SUM(IF(tu.option_id IS NOT NULL AND tu.option_id != q.option_id, 1, 0)) AS incorrect_count, 
    (ttc.question_count - COUNT(tu.option_id)) AS not_attended_count, 
    ttc.question_count, 
    tnm.per_mark, 
    ttc.total_mark, 
    
    -- Education: interns get education from tii; employees from degree/graduation/education tables
    IF(tii.user_name IS NOT NULL, 
       tii.education, 
       CASE
           WHEN TRIM(COALESCE(tpg.degree, '')) != '' THEN tpg.degree  
           WHEN TRIM(COALESCE(tg.graduation, '')) != '' THEN tg.graduation  
           WHEN TRIM(COALESCE(te.education, '')) != '' THEN te.education  
           ELSE NULL
       END
    ) AS latest_education,

    ttc.test_time,
    
    -- Marks calculation
    (
        (SUM(IF(tu.option_id IS NOT NULL AND tu.option_id = q.option_id, 1, 0)) * (ttc.total_mark / ttc.question_count)) 
        -
        (SUM(IF(tu.option_id IS NOT NULL AND tu.option_id != q.option_id, 1, 0)) * tnm.per_mark)
    ) AS obtain_mark,
    
    ua.start_time,
    ua.submitted_time,
    
    SEC_TO_TIME(TIMESTAMPDIFF(SECOND, ua.start_time, ua.submitted_time)) AS response_time

FROM tbl_user_test ua 
LEFT JOIN tbl_userinfo u ON u.user_id = ua.user_id 
LEFT JOIN tbl_employee_personal_details tepd ON tepd.user_id = u.user_id 
LEFT JOIN tbl_test_configuration ttc ON ttc.test_configuration_id = ua.test_id 
LEFT JOIN tbl_user_answer tu ON tu.user_test_id = ua.user_test_id 
LEFT JOIN tbl_question q ON tu.question_id = q.question_id 
LEFT JOIN tbl_negative_master tnm ON tnm.negative_id = ttc.negative_marking 
LEFT JOIN tbl_user_station_dept tusd ON tusd.usd_id = u.usd_id AND tusd.user_id = u.user_id
LEFT JOIN tbl_department_station tds ON tusd.stat_dept_id = tds.stat_dept_id AND tds.display = 'Y'
LEFT JOIN tbl_department_master tdm ON tdm.dept_master_id = tds.dept_master_id AND tdm.display = 'Y'
LEFT JOIN tbl_user_emp_type tuet ON tuet.uet_id = u.uet_id AND tuet.user_id = u.user_id AND tuet.display = 'Y'
LEFT JOIN tbl_employee_type tet ON tet.emp_type_id = tuet.emp_type_id AND tet.display = 'Y'
LEFT JOIN tbl_station_details tsd ON tsd.station_id = tds.station_id AND tsd.display = 'Y'
LEFT JOIN tbl_station_type tst ON tst.station_type_id = tsd.station_type_id AND tst.display = 'Y'
LEFT JOIN tbl_education te ON te.education_id = tepd.education
LEFT JOIN tbl_graduation tg ON tg.graduation_id = tepd.graduation
LEFT JOIN tbl_post_graduation tpg ON tpg.postgraduation_id = tepd.degree
LEFT JOIN tbl_intern_info tii ON tii.login_id = ua.login_id

WHERE ua.test_id = ? 
AND ua.display = 'Y' 

GROUP BY ua.user_id 

ORDER BY 
    obtain_mark DESC,
    TIMESTAMPDIFF(SECOND, ua.start_time, ua.submitted_time) ASC,
    TRIM(CONCAT_WS(' ', tepd.firstname, tepd.middlename, tepd.lastname)) ASC;



",

			array($test_id)
		);

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function view_test_report($test_id)
	{
		$query = $this->db->query("
		    SELECT q.option_id,ua.question_id,q.question 
			FROM tbl_user_answer ua 
			LEFT JOIN tbl_user_test tu ON tu.user_test_id = ua.user_test_id AND tu.display = 'Y'
			LEFT JOIN tbl_question q ON ua.question_id = q.question_id AND q.display = 'Y'
			WHERE tu.test_id = ? 
			AND ua.display = 'Y' GROUP BY ua.question_id ORDER BY ua.question_id ASC",
			array($test_id)
		);

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$tbl_data[] = $row;
			}
			return $tbl_data;
		} else {
			return false;
		}
	}

	public function get_emp_test_data($test_id)
{
	$query = $this->db->query("
		SELECT 
			-- Fullname logic: intern name if present
			IF(tii.user_name IS NOT NULL AND TRIM(tii.user_name) != '', 
			   tii.user_name, 
			   CONCAT(tepd.firstname, ' ', COALESCE(tepd.middlename, ''), ' ', tepd.lastname)
			) AS fullname,
			
			-- Department, designation, and station shown only for employees
			IF(tii.user_name IS NOT NULL, NULL, tdm.dept_master_name) AS dept_master_name,
			IF(tii.user_name IS NOT NULL, NULL, tet.title) AS title,
			IF(tii.user_name IS NOT NULL, tii.joining_date, tepd.emp_joining_date) AS emp_joining_date,
			IF(tii.user_name IS NOT NULL, NULL, tst.station_type_name) AS station_type_name,

			ua.*
		
		FROM tbl_user_test ua 
		LEFT JOIN tbl_userinfo u ON u.user_id = ua.user_id 
		LEFT JOIN tbl_employee_personal_details tepd ON tepd.user_id = u.user_id 
		LEFT JOIN tbl_test_configuration ttc ON ttc.test_configuration_id = ua.test_id
		LEFT JOIN tbl_user_station_dept tusd ON tusd.usd_id = u.usd_id AND tusd.user_id = u.user_id
		LEFT JOIN tbl_department_station tds ON tusd.stat_dept_id = tds.stat_dept_id AND tds.display = 'Y'
		LEFT JOIN tbl_department_master tdm ON tdm.dept_master_id = tds.dept_master_id AND tdm.display = 'Y'
		LEFT JOIN tbl_user_emp_type tuet ON tuet.uet_id = u.uet_id AND tuet.user_id = u.user_id AND tuet.display = 'Y'
		LEFT JOIN tbl_employee_type tet ON tet.emp_type_id = tuet.emp_type_id AND tet.display = 'Y'
		LEFT JOIN tbl_station_details tsd ON tsd.station_id = tds.station_id AND tsd.display = 'Y'
		LEFT JOIN tbl_station_type tst ON tst.station_type_id = tsd.station_type_id AND tst.display = 'Y'
		LEFT JOIN tbl_intern_info tii ON tii.login_id = ua.login_id

		WHERE ua.test_id = ? 
		AND ua.display = 'Y'
	", array($test_id));

	if ($query->num_rows() > 0) {
		foreach ($query->result() as $key) {
			$user_id = $key->user_id;
			$user_test_id = $key->user_test_id;

			$sub_query = $this->db->query("
				SELECT tua.*, tq.option_id as que_ans 
				FROM tbl_user_answer AS tua 
				LEFT JOIN tbl_question tq ON tq.question_id = tua.question_id AND tq.display='Y' 
				WHERE tua.user_test_id = ? AND tua.user_id = ? AND tua.display = 'Y'
			", array($user_test_id, $user_id));

			if ($sub_query->num_rows() > 0) {
				$data[] = array('key' => $key, 'user_ans' => $sub_query->result());
			}
		}
		return $data;
	} else {
		return false;
	}
}


	public function get_result_details($test_config_id)
	{
		return $this->db
			->where('test_configuration_id', $test_config_id)
			->get('tbl_user_test')
			->result();
	}


}
