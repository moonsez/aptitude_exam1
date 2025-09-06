<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class percent_model extends CI_Model
{

    public function view_percentage($test_id = null)
    {
        if (empty($test_id) || $test_id === "all") {
            return false;
        }

        $query_str = "
    SELECT 
        ua.question_id,
        q.question,
        q.question_mar,
        q.test_name,
        q.explanation,
        SUM(CASE WHEN ua.option_id = q.option_id THEN 1 ELSE 0 END) AS correct_count,
        SUM(CASE WHEN ua.option_id != q.option_id AND ua.option_id IS NOT NULL THEN 1 ELSE 0 END) AS wrong_count,
        SUM(CASE WHEN ua.option_id IS NULL THEN 1 ELSE 0 END) AS na_count,
        COUNT(ua.user_test_id) AS total_users
    FROM tbl_user_answer ua
    JOIN tbl_user_test tu ON tu.user_test_id = ua.user_test_id AND tu.display = 'Y'
    JOIN tbl_question q ON q.question_id = ua.question_id AND q.display = 'Y'
    WHERE ua.display = 'Y' AND tu.test_id = ?
    GROUP BY ua.question_id";

        $query = $this->db->query($query_str, [$test_id]);
        return $query->num_rows() > 0 ? $query->result() : false;
    }


    // In your controller before loading the view, load options for questions
    public function get_question_options($question_id)
    {
        $query = $this->db->query("
        SELECT `option` FROM tbl_option 
        WHERE question_id = ? AND display = 'Y' ORDER BY option_id ASC",
            [$question_id]
        );

        return $query->result();
    }

    // Query to show exam list 
    public function fetch_exam_list($table_name, $desc_by_col_name)
    {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->order_by('test_datetime', "desc");
        $qry = $this->db->get();


        if ($qry->num_rows() > 0) {
            foreach ($qry->result() as $row) {
                $tbl_data[] = $row;
            }
            return $tbl_data;
        } else {
            return false;
        }
    }
    public function get_correct_answered_employees($test_id, $question_id)
    {
        $query = $this->db->query("
        SELECT CONCAT(tepd.firstname, ' ', tepd.lastname) AS emp 
        FROM tbl_user_answer ua 
        JOIN tbl_employee_personal_details tepd ON ua.user_id = tepd.user_id 
        JOIN tbl_question q ON ua.question_id = q.question_id AND q.display = 'Y' 
        JOIN tbl_user_test tu ON tu.user_test_id = ua.user_test_id AND tu.display = 'Y' 
        WHERE ua.question_id = ? 
        AND ua.option_id = q.option_id 
        AND ua.display = 'Y'
        " . ($test_id != 0 ? " AND tu.test_id = ?" : "") . "
    ", $test_id != 0 ? [$question_id, $test_id] : [$question_id]);

        return ($query->num_rows() > 0) ? $query->result() : [];
    }

    public function get_wrong_answered_employees($test_id, $question_id)
    {
        $query = $this->db->query("
        SELECT CONCAT(tepd.firstname, ' ', tepd.lastname) AS emp 
        FROM tbl_user_answer ua 
        JOIN tbl_employee_personal_details tepd ON ua.user_id = tepd.user_id 
        JOIN tbl_question q ON ua.question_id = q.question_id AND q.display = 'Y' 
        JOIN tbl_user_test tu ON tu.user_test_id = ua.user_test_id AND tu.display = 'Y' 
        WHERE ua.question_id = ? 
        AND ua.option_id != q.option_id 
        AND ua.display = 'Y'
        " . ($test_id != 0 ? " AND tu.test_id = ?" : "") . "
    ", $test_id != 0 ? [$question_id, $test_id] : [$question_id]);

        return ($query->num_rows() > 0) ? $query->result() : [];
    }

    public function na_answered_employees($test_id, $question_id)
    {
        $query = $this->db->query("
        SELECT CONCAT(tepd.firstname, ' ', tepd.lastname) AS emp 
        FROM tbl_user_answer ua 
        JOIN tbl_employee_personal_details tepd ON ua.user_id = tepd.user_id 
        JOIN tbl_question q ON ua.question_id = q.question_id AND q.display = 'Y' 
        JOIN tbl_user_test tu ON tu.user_test_id = ua.user_test_id AND tu.display = 'Y' 
        WHERE ua.question_id = ? 
        AND ua.option_id IS NULL 
        AND ua.display = 'Y'
        " . ($test_id != 0 ? " AND tu.test_id = ?" : "") . "
    ", $test_id != 0 ? [$question_id, $test_id] : [$question_id]);

        return ($query->num_rows() > 0) ? $query->result() : [];
    }

    public function get_employee_latest_data($test_id, $user_id, $test_status)
    {
        $query = $this->db->query('SELECT test_id,user_id,test_date,test_status FROM `tbl_user_test` where test_id=? and user_id=? 
		and display="Y" and test_status=?;', array($test_id, $user_id, $test_status));
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function get_assets_chart_details()
    {
        /*$q = $this->db->query("SELECT taa.status AS sts, count(taa.asset_id) as ttl
                                      FROM tbl_asset_allocation as taa WHERE taa.display='Y'
                                      UNION
                                      SELECT tad.status AS sts, count(tad.asset_id) as ttl
                                      FROM tbl_asset_data as tad WHERE tad.display='Y'");*/

        $q = $this->db->query("SELECT tad.status AS sts, count(tad.asset_id) as ttl
								FROM tbl_asset_data as tad WHERE tad.display='Y' GROUP BY tad.status");

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $key) {
                $data[] = array(
                    "title" => $key->sts,
                    "value" => $key->ttl
                );
            }
            return $data;
        } else {
            return array();
        }
    }



    public function graphical_user_scoring($test_id, $user_id)
    {
        $sql = "
        SELECT 
            u.username, 
            ut.test_id,
            CONCAT(tepd.salutation, ' ', tepd.firstname, ' ', COALESCE(tepd.middlename, ''), ' ', tepd.lastname) AS fullname, 
            tc.test_name, 
            COUNT(DISTINCT ua.user_test_id) AS total_attempted, 
            SUM(IF(ua.option_id = q.option_id, 1, 0)) AS correct_count, 
            SUM(IF(ua.option_id != q.option_id, 1, 0)) AS incorrect_count, 
            (tc.question_count - COUNT(ua.option_id)) AS not_attended_count, 
            tc.question_count, 
            tc.total_mark, 
            tnm.per_mark,
            (SUM(IF(ua.option_id = q.option_id, 1, 0)) * (tc.total_mark / tc.question_count)) - 
            (SUM(IF(ua.option_id != q.option_id, 1, 0)) * tnm.per_mark) AS obtained_marks
        FROM tbl_user_test ut
        LEFT JOIN tbl_userinfo u ON u.user_id = ut.user_id
        LEFT JOIN tbl_employee_personal_details tepd ON tepd.user_id = u.user_id
        LEFT JOIN tbl_test_configuration tc ON tc.test_configuration_id = ut.test_id
        LEFT JOIN tbl_user_answer ua ON ua.user_test_id = ut.user_test_id
        LEFT JOIN tbl_question q ON ua.question_id = q.question_id
        LEFT JOIN tbl_negative_master tnm ON tnm.negative_id = tc.negative_marking
        WHERE ut.user_id = ?
        " . (!empty($test_id) ? " AND ut.test_id = ?" : "") . "
        AND ut.display = 'Y'
        GROUP BY ut.test_id, ut.user_id";

        $query = $this->db->query($sql, (!empty($test_id) ? array($user_id, $test_id) : array($user_id)));

        return (!empty($test_id)) ? $query->row() : $query->result();
    }

    public function graphical_question_scoring($test_id, $user_id)
    {
        $sql = "SELECT u.username, COUNT(DISTINCT ut.test_id) AS total_exams_attempted,concat(tepd.firstname,'',tepd.lastname) as empname,
    Sum(IF(ua.option_id = q.option_id, 1, 0)) AS total_correct_count, 
    SUM(IF(ua.option_id != q.option_id, 1, 0)) AS total_incorrect_count, 
    SUM(IF(ua.option_id IS NULL, 1, 0)) AS total_not_attended_count,
     Count(tc.question_count) AS total_questions
    FROM 
    tbl_user_test ut 
    LEFT JOIN tbl_userinfo u ON u.user_id = ut.user_id 
    LEFT JOin tbl_employee_personal_details tepd ON tepd.user_id = u.user_id
    LEFT JOIN tbl_test_configuration tc ON tc.test_configuration_id = ut.test_id
    LEFT JOIN tbl_user_answer ua ON ua.user_test_id = ut.user_test_id 
    LEFT JOIN tbl_question q ON ua.question_id = q.question_id 
    WHERE 
    ut.user_id = ? AND ut.display = 'Y'";

        // Optionally filter by test_id
        if (!empty($test_id)) {
            $sql .= " AND ut.test_id = ?";
        }

        $query = $this->db->query($sql, (!empty($test_id) ? array($user_id, $test_id) : array($user_id)));

        // Return the first row for a single test or all results for multiple tests
        return $query->row();
    }



    // query to show upcoming exams
    public function upcomingexamList()
    {
        $query = $this->db->query("SELECT tnm.per_mark, tss.dept_master_name, tst.station_type_name, ts.*FROM tbl_test_configuration AS ts LEFT JOIN    tbl_department_master AS tss ON ts.dept_master_id = tss.dept_master_id LEFT JOIN tbl_station_type AS tst ON tst.station_type_id = ts.station_type_id LEFT JOIN tbl_negative_master tnm ON tnm.negative_id = ts.negative_marking AND tnm.display = 'Y'WHERE ts.display = 'Y' AND date(ts.test_datetime) > current_date();");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    //query to show completed exams
    public function completedexamList()
    {
        $query = $this->db->query("SELECT tnm.per_mark, tss.dept_master_name, tst.station_type_name, ts.*FROM tbl_test_configuration AS ts LEFT JOIN    tbl_department_master AS tss ON ts.dept_master_id = tss.dept_master_id LEFT JOIN tbl_station_type AS tst ON tst.station_type_id = ts.station_type_id LEFT JOIN tbl_negative_master tnm ON tnm.negative_id = ts.negative_marking AND tnm.display = 'Y'WHERE ts.display = 'Y' AND ts.test_datetime < NOW();");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    // Queries to show data by employee wise
    public function view_test_result($test_id, $user_id = null)
    {
        $sql = "
            SELECT 
    u.username, 
    tdm.dept_master_id,
    ttc.test_name,
    CONCAT(tepd.salutation, ' ', tepd.firstname, ' ', COALESCE(tepd.middlename, ''), ' ', tepd.lastname) AS fullname,
    tdm.dept_master_name, tet.title, tepd.emp_joining_date, tst.station_type_name, 
    COUNT(tu.user_test_id) AS total_count, 
    SUM(IF(tu.option_id IS NOT NULL AND tu.option_id = q.option_id, 1, 0)) AS correct_count, 
    SUM(IF(tu.option_id IS NOT NULL AND tu.option_id != q.option_id, 1, 0)) AS incorrect_count, 
    (ttc.question_count - COUNT(tu.option_id)) AS not_attended_count, 
    ttc.question_count, 
    tnm.per_mark, 
    ttc.total_mark, 
    ttc.test_time,
    (
        (SUM(IF(tu.option_id IS NOT NULL AND tu.option_id = q.option_id, 1, 0)) * (ttc.total_mark / ttc.question_count)) 
        -
        (SUM(IF(tu.option_id IS NOT NULL AND tu.option_id != q.option_id, 1, 0)) * tnm.per_mark)
    ) AS obtain_mark,
    CASE
        WHEN TRIM(COALESCE(tpg.degree, '')) != '' THEN tpg.degree  -- Check degree, excluding NULL or empty
        WHEN TRIM(COALESCE(tg.graduation, '')) != '' THEN tg.graduation  -- Check graduation
        WHEN TRIM(COALESCE(te.education, '')) != '' THEN te.education  -- Check education
        ELSE NULL
    END AS latest_education

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
WHERE ua.test_id = ? AND ua.display = 'Y'
 ";


        if (!empty($user_id) && $user_id != '0') {
            $sql .= " AND ua.user_id = ? ";
        }

        $sql .= " GROUP BY ua.user_id 
                  ORDER BY obtain_mark DESC, TRIM(CONCAT_WS(' ', tepd.firstname, tepd.middlename, tepd.lastname)) ASC";


        $params = array($test_id);
        if (!empty($user_id) && $user_id != '0') {
            $params[] = $user_id;
        }

        $query = $this->db->query($sql, $params);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $tbl_data[] = $row;
            }
            return $tbl_data;
        } else {
            return false;
        }
    }

    public function get_all_departments()
    {
        return $this->db->select('dept_master_id, dept_master_name')
            ->from('tbl_department_master')
            ->where('display', 'Y')
            ->get()
            ->result();
    }
    public function get_all_designations()
    {
        return $this->db->select('title')
            ->from('tbl_employee_type')
            ->where('display', 'Y')
            ->group_by('title')
            ->get()
            ->result();
    }


    public function get_all_location()
    {
        return $this->db->select('station_type_name')
            ->from('tbl_station_type')
            ->where('display', 'Y')
            ->group_by('station_type_name')
            ->get()
            ->result();
    }

    public function get_all_name()
    {
        return $this->db->select("GROUP_CONCAT(CONCAT(tepd.salutation, ' ', tepd.firstname, ' ', COALESCE(tepd.middlename, ''), ' ', tepd.lastname) SEPARATOR ', ') AS fullname")
            ->from('tbl_employee_personal_details AS tepd')
            ->join('tbl_userinfo as tu', 'tu.user_id = tepd.user_id')
            ->where('tepd.display', 'Y')
            ->where('tu.account_status', 'activate')
            ->group_by('tepd.user_id')
            ->get()
            ->result();
    }

    function fetch_department()
    {
        $query = $this->db->query("select dept_master_name,dept_master_id from tbl_department_master where display='Y'");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    function fetch_all_active_user()
    {
        $query = $this->db->query(" select tu.user_id,concat(tepd.firstname,' ',tepd.lastname) emp_name  from tbl_userinfo as tu ,tbl_employee_personal_details as tepd
								where
                                tu.user_id = tepd.user_id
								AND tu.display='Y'
								AND tu.account_status = 'activate'");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }




    public function emp_wise_report($test_id = null, $user_id = null)
    {
        $where = "WHERE ust.display = 'Y'";
        $params = [];

        if (!empty($user_id)) {
            $where .= " AND ust.user_id = ?";
            $params[] = $user_id;
        }

        if (!empty($test_id)) {
            $where .= " AND ust.test_id = ?";
            $params[] = $test_id;
        }

        $query = $this->db->query("
            SELECT 
                ttc.test_name,
                ttc.test_datetime,
                ttc.total_mark,
                (SELECT COUNT(*) FROM tbl_user_test_result WHERE user_id = ust.user_id AND display = 'Y') AS total_exams_attempted,
                CONCAT( tepd.firstname, ' ', COALESCE(tepd.middlename, ''), ' ', tepd.lastname) AS fullname,
                ust.correct_count,
                ust.incorrect_count,
                ust.not_attempted,
                ttc.question_count,
                ust.result,
                ust.rank,
                ust.marks_obtained,
                CASE 
                    WHEN ttc.total_mark > 0 THEN ROUND((ust.marks_obtained / ttc.total_mark) * 100, 2)
                    ELSE 0
                END AS percentage,
                (
                    SELECT SUM(marks_obtained)
                    FROM tbl_user_test_result
                    WHERE user_id = ust.user_id AND display = 'Y'
                ) AS overall_marks
            FROM tbl_user_test_result ust
            JOIN tbl_test_configuration ttc ON ust.test_id = ttc.test_configuration_id
            JOIN tbl_employee_personal_details tepd ON tepd.user_id = ust.user_id
            $where
            ORDER BY ttc.test_datetime DESC
        ", $params);

        return $query->num_rows() > 0 ? $query->result() : false;
    }


    public function overall_emp_report($test_id = null, $user_id = null)
    {
        $where = "WHERE ust.display = 'Y'";
        $params = [];

        if (!empty($user_id)) {
            $where .= " AND ust.user_id = ?";
            $params[] = $user_id;
        }

        if (!empty($test_id)) {
            $where .= " AND ust.test_id = ?";
            $params[] = $test_id;
        }

        $query = $this->db->query("
        SELECT 
            ttc.total_mark,
            (SELECT COUNT(*) 
             FROM tbl_user_test_result 
             WHERE user_id = ust.user_id AND display = 'Y') AS total_exams_attempted,
            CONCAT(tepd.firstname, ' ', COALESCE(tepd.middlename, ''), ' ', tepd.lastname) AS fullname,
            SUM(ust.correct_count) AS total_correct,
            SUM(ust.incorrect_count) AS total_incorrect,
            SUM(ust.not_attempted) AS total_na,
            SUM(ttc.question_count) AS total_question,
            (
                SELECT SUM(marks_obtained)
                FROM tbl_user_test_result
                WHERE user_id = ust.user_id AND display = 'Y'
            ) AS overall_marks,
            (
                SELECT 
                    CASE 
                        WHEN COUNT(*) > 0 THEN ROUND(SUM(marks_obtained) / COUNT(*), 2)
                        ELSE 0
                    END
                FROM tbl_user_test_result
                WHERE user_id = ust.user_id AND display = 'Y'
            ) AS average_marks,
            ( SELECT  SEC_TO_TIME(FLOOR(AVG(TIME_TO_SEC(tut.start_time)))) FROM tbl_user_test tut WHERE tut.user_id = ust.user_id ) AS avg_start_time,
            ( SELECT  SEC_TO_TIME(FLOOR(AVG(TIME_TO_SEC(tut.submitted_time)))) FROM tbl_user_test tut WHERE tut.user_id = ust.user_id ) AS avg_submitted_time,
             (SELECT SEC_TO_TIME(FLOOR(AVG(TIME_TO_SEC(tut.submitted_time) - TIME_TO_SEC(tut.start_time))))FROM tbl_user_test tut WHERE tut.user_id = ust.user_id) AS avg_response_time

    
        FROM tbl_user_test_result ust
        JOIN tbl_test_configuration ttc ON ust.test_id = ttc.test_configuration_id
        JOIN tbl_employee_personal_details tepd ON tepd.user_id = ust.user_id
        $where
        ORDER BY ttc.test_datetime DESC
    ", $params);

        return $query->num_rows() > 0 ? $query->result() : false;
    }



    public function get_exam_attendance_report($test_id)
    {
        if (empty($test_id)) {
            return false;
        }

        // Get test date
        $test = $this->db->select("DATE(test_datetime) as punch_date")
            ->from("tbl_test_configuration")
            ->where("test_configuration_id", $test_id)
            ->get()
            ->row();

        if (!$test) {
            return false;
        }

        $punch_date = $test->punch_date;

        $query_str = "
        SELECT 
            CONCAT(tepd.firstname, ' ', tepd.lastname) AS `Employee_Name`, 
            tp.punch_date, 
            ttc.test_name,
            tdm.dept_master_name,
            tst.station_type_name
        FROM tbl_punching tp
        JOIN tbl_employee_personal_details tepd ON tepd.user_id = tp.user_id
        JOIN tbl_test_configuration ttc ON ttc.test_configuration_id = ?
        JOIN tbl_userinfo u ON u.user_id = tp.user_id 
        JOIN tbl_user_station_dept tusd ON tusd.usd_id = u.usd_id AND tusd.user_id = u.user_id
        JOIN tbl_department_station tds ON tusd.stat_dept_id = tds.stat_dept_id AND tds.display = 'Y'
        JOIN tbl_station_details tsd ON tsd.station_id = tds.station_id AND tsd.display = 'Y'
        JOIN tbl_station_type tst ON tst.station_type_id = tsd.station_type_id AND tst.display = 'Y'
        JOIN tbl_department_master tdm ON tdm.dept_master_id = tds.dept_master_id AND tdm.display = 'Y'
        WHERE tp.user_id NOT IN (
            SELECT user_id 
            FROM tbl_user_test_result 
            WHERE test_id = ?
        )
        AND DATE(tp.punch_date) = ?
        ORDER BY `Employee_Name` ASC
    ";

        $query = $this->db->query($query_str, [$test_id, $test_id, $punch_date]);
        return $query->num_rows() > 0 ? $query->result() : false;
    }


    // Below code is for Interns
//     public function register_user($user_data)
// {
//     // Get next auto-increment ID for tbl_intern_info
//     $query = $this->db->query("SHOW TABLE STATUS LIKE 'tbl_intern_info'");
//     $next_id = $query->row()->Auto_increment;

//     // Create login_id like IN01, IN02, IN10, etc.
//     $login_id = 'IN' . str_pad($next_id, 2, '0', STR_PAD_LEFT);

//     // Add login_id to user data
//     $user_data['login_id'] = $login_id;

//     // Insert data
//     $this->db->insert("tbl_intern_info", $user_data);

//     // Return login_id if insert was successful
//     return $this->db->affected_rows() > 0 ? $login_id : false;
// }

// public function intern_data($userId)
// 	{
// 		$query = $this->db->query('SELECT tti.user_id,tti.user_name,tti.user_type,tti.intern_img_file_name,tti.login_id FROM tbl_intern_info tti
//                 WHERE tti.user_id=?', array($userId));

// 		if ($query->num_rows() == 1) {
// 			return $query->row();
// 		} else {
// 			return false;
// 		}
// 	}

public function check_user_type($login_id)
{
    $query = $this->db->query('SELECT tti.user_id,tti.user_name,tti.user_type,tti.intern_img_file_name,tti.login_id FROM tbl_intern_info tti
                WHERE tti.login_id=?', array($login_id));

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}

}

// public function view_intern_result($login_id)
// 	{
// 		$query = $this->db->query("SELECT tua.user_test_id,tnm.per_mark,ttc.*
// 			FROM tbl_user_test AS tua 
// 			LEFT JOIN tbl_intern_info AS tii ON tii.login_id=tua.login_id 
// 			LEFT JOIN tbl_test_configuration ttc ON ttc.test_configuration_id = tua.test_id
//             left join tbl_negative_master tnm on tnm.negative_id = ttc.negative_marking 
// 			WHERE tua.display = 'Y' AND tua.login_id = ?", array($login_id));
// 		if ($query->num_rows() > 0) {
// 			foreach ($query->result() as $row) {
// 				$tbl_data[] = $row;
// 			}
// 			return $tbl_data;
// 		} else {
// 			return false;
// 		}
// 	}

//     public function intern_review_data($user_test_id)
// 	{
// 		$data = array();
// 		$query = $this->db->query("SELECT ua.*, tu.dept_master_id 
// 		FROM tbl_user_test ua 
// 		join tbl_test_configuration tu on tu.test_configuration_id = ua.test_id
// 		WHERE ua.display = 'Y' AND ua.user_test_id = ? ", array($user_test_id));
// 		if ($query->num_rows() > 0) {
// 			foreach ($query->result() as $key) {
// 				$section_data["section"] = $key;

// 				$user_test_id = $key->user_test_id;

// 				$question_query = $this->db->query("select q.*,ua.option_id user_ans from tbl_user_answer ua join tbl_question q on q.question_id=ua.question_id WHERE ua.user_test_id=? and ua.display='Y' ", array($user_test_id));

// 				if ($question_query->num_rows() > 0) {
// 					$question = array();
// 					foreach ($question_query->result() as $row) {

// 						$question_id = $row->question_id;
// 						$question_data['question'] = $row;
// 						$option_query = $this->db->query("select * from tbl_option where question_id=? and display='Y'", array($question_id));
// 						if ($option_query->num_rows() > 0) {
// 							$question_data['option'] = $option_query->result();
// 						} else {
// 							$question_data['option'] = null;

// 						}
// 						$question[] = $question_data;
// 					}
// 				} else {
// 					$question = null;
// 				}

// 				$section_data["question_list"] = $question;
// 				$data[] = $section_data;
// 			}
// 			return $data;

// 		} else {
// 			return null;
// 		}
// 	}
    

    
// 	public function intern_get_result($user_test_id)
// 	{
// 		$query=$this->db->query("select tii.user_name AS fullname, count(*) as total_count, sum(if(tu.option_id=q.option_id,1,0)) correct_count,  SUM(IF(tu.option_id IS NOT NULL AND tu.option_id != q.option_id, 1, 0)) AS incorrect_count,(ttc.question_count - COUNT(tu.option_id)) AS not_attended_count, ttc.question_count, tnm.per_mark, ttc.total_mark, ttc.test_time,
// 			ua.start_time,
//     		ua.submitted_time,
//    			SEC_TO_TIME(TIMESTAMPDIFF(SECOND, ua.start_time, ua.submitted_time)) AS response_time
// 			from tbl_user_test ua 
// 			LEFT JOIN tbl_intern_info tii on tii.login_id=ua.login_id
			
// 			LEFT JOIN tbl_test_configuration ttc ON ttc.test_configuration_id = ua.test_id 
// 			LEFT JOIN tbl_user_answer tu ON tu.user_test_id = ua.user_test_id 
// 			left join tbl_question q on tu.question_id=q.question_id 
// 			left join tbl_negative_master tnm on tnm.negative_id = ttc.negative_marking 
// 			where ua.user_test_id = ? AND ua.display = 'Y'",array($user_test_id));

// 		if($query->num_rows()== 1)
// 		{
			
// 			return $query->row();
// 		}
// 		else
// 		{
// 			return false;
// 		}		
// 	}


//     public function intern_save_cerificate($user_test_id)
// 	{
// 		$this->load->model('master_model');
// 		$this->load->model('test_model_r');
// 		$this->load->library('report_creation');
// 		$user_test_data = $this->master_model->selectDetailsWhr('tbl_user_test', 'user_test_id', $user_test_id,'login_id');
// 		$data['user_details'] = $this->user_data($user_test_data->login_id);
// 		$data['testData'] = $this->test_model_r->selectans($user_test_id);

// 		$pdfname = "Moonsez_Certificate_" . $user_test_data->login_id;
// 		$html = $this->load->view('certificate', $data, TRUE);
// 		//print_r($html);die;
// 		$this->report_creation->create_pdf($html, $pdfname);
// 	}


    public function user_data($login_id)
	{
		$query = $this->db->query('SELECT tti.login_id,tti.user_name from tbl_intern_info tti
                WHERE tti.login_id=?', array($login_id));

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}


    // public function intern_get_question_data($user_id, $test_name, $limit)
	// {
	// 	$data = array();
	// 	$query = $this->db->query('SELECT tii.user_name, tii.email,tii.login_id,tii.user_id FROM tbl_intern_info AS tii
                
    //             WHERE tii.status = "Active" AND tii.user_id = ? and  tii.display="Y"', array($user_id));
	// 	if ($query->num_rows() > 0) {
	// 		foreach ($query->result() as $key) {
	// 			$section_data["section"] = $key;

	// 			$test1 = explode(",", $test_name);
	// 			$test2 = "'" . implode("','", $test1) . "'";
	// 			$question_query = $this->db->query('SELECT * FROM (SELECT tq.* FROM tbl_question tq LEFT JOIN tbl_test_configuration ttc ON FIND_IN_SET(tq.test_name,ttc.test_name) AND ttc.display = "Y" WHERE tq.display = "Y" AND tq.test_name IN(' . $test2 . ') LIMIT ' . $limit . ') AS subquery_alias ORDER BY RAND()');


	// 			if ($question_query->num_rows() > 0) {
	// 				$question = array();
	// 				foreach ($question_query->result() as $row) {

	// 					$question_id = $row->question_id;
	// 					$question_data['question'] = $row;

	// 					$option_query = $this->db->query("select * from tbl_option where question_id=? and display='Y'", array($question_id));
	// 					if ($option_query->num_rows() > 0) {
	// 						$question_data['option'] = $option_query->result();
	// 					} else {
	// 						$question_data['option'] = null;

	// 					}
	// 					$question[] = $question_data;
	// 				}
	// 			} else {
	// 				$question = null;
	// 			}

	// 			$section_data["question_list"] = $question;
	// 			if (isset($question) && !empty($question)) {
	// 				$data[] = $section_data;
	// 			}
	// 		}
	// 		return $data;

	// 	} else {
	// 		return null;
	// 	}
	// }
}








