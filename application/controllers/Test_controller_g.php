<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_controller_g extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->clear_cache();
        $this->load->model('percent_model');
        $this->load->library('authentication');
        date_default_timezone_set('Asia/Kolkata');
    }



    public function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    public function test_configuration()
    {
        $this->load->model('test_model_g');
        $this->load->model('percent_model');
        $this->load->model('master_model');
        $data['deptdata'] = $this->master_model->fetchDataFromTable('tbl_department_master', 'dept_master_name');
        $data['locationdata'] = $this->master_model->fetchDataFromTable('tbl_station_type', 'station_type_id');
        $data['section'] = $this->test_model_g->getSectionList();
        $data['upcoming_exams'] = $this->percent_model->upcomingexamList();
        $data['completed_exams'] = $this->percent_model->completedexamList();
        $data['negativeData'] = $this->master_model->fetchDataFromTable('tbl_negative_master', 'negative_id');
        //$data['test_section'] = $this->test_model_g->getTestSectionList();
        $data['testData'] = $this->test_model_g->getAllTestNamesFromQuestionMaster();
        //$data['singleConfiguration'] = $this->test_model_g->getConfiguration($user_id);
        $this->load->view("admin/test_configuration", $data);
    }


    public function email_question()
    {
        $this->load->model('master_model');
        //$data['email']=$this->master_model->selectDetailsWhr('tbl_email','email_id',1);
        $data['emailData'] = $this->master_model->selectDetailsByDESC('tbl_email', 'email_id');
        $this->load->view("admin/email_question", $data);
    }

    public function fetch_email()
    {
        $this->load->model('master_model');
        $data['emailData'] = $this->master_model->selectDetailsByDESC('tbl_email', 'email_id');
        $this->load->view('admin/email_table', $data);
    }

    public function edit_email()
    {
        $this->load->model('master_model');
        $email_id = $this->input->post('id');
        $data['email'] = $this->master_model->selectDetailsWhr('tbl_email', 'email_id', $email_id);
        $data['emailData'] = $this->master_model->selectDetailsByDESC('tbl_email', 'email_id');
        $this->load->view('admin/email_question', $data);
    }

    public function delete_email()
    {
        $this->load->model('master_model');
        $email_id = $this->input->post('id');

        $data = array('display' => 'N');

        $result = $this->master_model->updateDetails('tbl_email', 'email_id', $email_id, $data);

        if ($result) {
            $this->json->jsonReturn(array(
                'valid' => TRUE,
                'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Email Successfully!</div>'
            ));
        } else {
            $this->json->jsonReturn(array(
                'valid' => FALSE,
                'msg' => '<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Email Details !</div>'
            ));
        }
    }


    public function view_email_question()
    {
        $this->load->model('master_model');
        $language_id = $this->session->userdata('language_id');

        $data['email'] = $this->master_model->view_email_question($language_id);
        $this->load->view("view_email_question", $data);
    }

    public function load_file_select()
    {
        $view = $this->load->view("admin/load_file_select", null, true);
        $this->json->jsonReturn(array('view' => $view));
    }
    public function begin_test()
    {
        if ($this->authentication->logged_in() == FALSE) {
            redirect(base_url());

        } else {
            $this->load->model("test_model_g");
            $this->load->model("master_model");

            $user_id = $this->uri->segment(2);
            $test_conf_id = $this->uri->segment(3);

            $data["test_data"] = $this->test_model_g->get_latest_test_data($test_conf_id);

            $startTime = new DateTime($data["test_data"]->test_datetime);
            $startTime->modify("+{$data["test_data"]->test_time} minutes");
            $data['examEndTime'] = $startTime->format('Y-m-d H:i');

            $currentTime = new DateTime();
            $data['currentTimeFormatted'] = $currentTime->format('Y-m-d H:i');

            $view = $this->load->view("bigin_test", $data);
        }
    }
    public function save_configuration()
    {
        $this->load->model("master_model");
        $test_configuration_id = $this->input->post('id');
        $department1 = $this->input->post('dept_name');
        $department = implode(",", $department1);
        $location = $this->input->post('location');
        $negative_marking = $this->input->post('negative_marking');
        $examdate = $this->input->post('test_datetime');
        $examdate = str_replace('T', ' ', $examdate);
        $formattedDate = date('Y-m-d H:i:s', strtotime($examdate));
        $question_count = $this->input->post('question_count');
        $total_mark = $this->input->post('total_mark');
        $test_time = $this->input->post('test_time');
        $test_name = $this->input->post('test_name');
        $test_name1 = implode(",", $test_name);

        $test_data = array(
            'dept_master_id' => $department,
            'station_type_id' => $location,
            'negative_marking' => $negative_marking,
            'test_datetime' => $examdate,
            'question_count' => $question_count,
            'total_mark' => $total_mark,
            'test_time' => $test_time,
            'test_name' => $test_name1
        );

        if (isset($test_configuration_id) && !empty($test_configuration_id) && ($test_configuration_id > 0)) {
            $test_endtime = $this->master_model->check_tt_with_existing_tests_update($department, $examdate, $test_time, $test_configuration_id);

            if (!empty($test_endtime)) {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> Exam is already scheduled between this date and time. Please schedule new exam date and time after ' . $test_endtime . ' </div>'
                ));
            } else {
                // $t_data = $this->master_model->check_test_already_exist_update($department,$location,$test_configuration_id);

                // if (!empty($t_data)) {
                //     $this->json->jsonReturn(array(
                //         'valid' => FALSE,
                //         'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> This Test Is Already Exists!</div>'
                //     ));
                // } else {
                $result = $this->master_model->updateDetails('tbl_test_configuration', 'test_configuration_id', $test_configuration_id, $test_data);

                if ($result) {
                    $this->json->jsonReturn(array(
                        'valid' => TRUE,
                        'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Test Configuration Details Updated Successfully!</div>'
                    ));
                } else {
                    $this->json->jsonReturn(array(
                        'valid' => FALSE,
                        'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Updating Test Configuration Details !</div>'
                    ));
                }
                // }
            }
        } else {
            $test_endtime = $this->master_model->check_tt_with_existing_tests($department, $examdate, $test_time);

            if (!empty($test_endtime)) {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> Exam is already scheduled between this date and time. Please schedule new exam date and time after ' . $test_endtime . ' </div>'
                ));
            } else {
                // $t_data = $this->master_model->check_test_already_exist($department,$location);

                // if (!empty($t_data)) {
                //     $this->json->jsonReturn(array(
                //         'valid' => FALSE,
                //         'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> This Test Is Already Exists!</div>'
                //     ));
                // } else {
                $result = $this->master_model->addData('tbl_test_configuration', $test_data);

                if ($result) {
                    $this->json->jsonReturn(array(
                        'valid' => TRUE,
                        'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Test Configuration Details Saved Successfully!</div>'
                    ));
                } else {
                    $this->json->jsonReturn(array(
                        'valid' => FALSE,
                        'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Saving Test Configuration Details !</div>'
                    ));
                }
                //}
            }
        }
    }


    public function fetch_test()
    {
        $this->load->model("master_model");
        $this->load->model("test_model_g");
        $test_configuration_id = $this->input->post('id'); // Assuming it's passed from the frontend

        $data['section'] = $this->test_model_g->getSectionList();
        $data['test_section'] = $this->test_model_g->getTestSectionList();
        $data['upcoming_exams'] = $this->percent_model->upcomingexamList();
        $data['completed_exams'] = $this->percent_model->completedexamList();
        //$data['singleConfiguration'] = $this->test_model_g->getConfiguration($test_configuration_id); // Pass the ID here

        $this->load->view('admin/master_form/configuration_table', $data);
    }

    public function getConfiguration($test_configuration_id = null)
    {
        if ($test_configuration_id === null) {
            return []; // Or handle appropriately if no ID is provided
        }

        // Your logic to fetch configuration by ID
        $query = $this->db->get_where('tbl_test_configuration', ['test_configuration_id' => $test_configuration_id]);
        return $query->row_array();
    }



    public function edit_test()
    {
        $this->load->model("master_model");
        $this->load->model("test_model_g");
        $id = $this->input->post('id');

        $data['deptdata'] = $this->master_model->fetchDataFromTable('tbl_department_master', 'dept_master_name');
        $data['locationdata'] = $this->master_model->fetchDataFromTable('tbl_station_type', 'station_type_id');
        $data['section'] = $this->test_model_g->getSectionList();
        $data['upcoming_exams'] = $this->percent_model->upcomingexamList();
        $data['completed_exams'] = $this->percent_model->completedexamList();
        $data['test_section'] = $this->test_model_g->getTestSectionList();
        $data['singleTestConfiguration'] = $this->test_model_g->getSingleTestConfiguration($id);
        $data['negativeData'] = $this->master_model->fetchDataFromTable('tbl_negative_master', 'negative_id');
        $data['testData'] = $this->test_model_g->getAllTestNamesFromQuestionMaster();

        $this->load->view("admin/test_configuration", $data);
    }




    public function save_email_content()
    {
        $id = $this->input->post('id');
        $this->load->model('master_model');
        $to = $this->input->post('to');
        $cc = $this->input->post('cc');
        $bcc = $this->input->post('bcc');
        $message = $this->input->post('message');
        $subject = $this->input->post('subject');
        $attachment_file = $this->input->post('attachment_file');
        // $language=$this->input->post('language');


        $data = array(
            'to' => $to,
            'cc' => $cc,
            'bcc' => $bcc,
            'subject' => $subject,
            'message' => $message,
            'attachment_file' => $attachment_file
            //'language'=>$language
        );


        if (isset($id) && !empty($id) && ($id > 0)) {
            $result = $this->master_model->updateDetails('tbl_email', 'email_id', $id, $data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Email Details Updated Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Updating Section Details !</div>'
                ));
            }
        } else {
            $result = $this->master_model->addData('tbl_email', $data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Email Details Saved Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Saving Section Details !</div>'
                ));
            }
        }
    }

    public function attempt_test()
    {
        if ($this->authentication->logged_in() == FALSE) {
            redirect(base_url());

        } else {
            $this->load->model("test_model_g");
            $this->load->model("master_model");
            $test_configuration_id = $this->uri->segment(2);
            $user_id = $this->session->userdata('user_id');
            // for checking test response
            $test_status = 'submitted';
            $attempted_test = $this->percent_model->get_employee_latest_data($test_configuration_id, $user_id, $test_status);

            if ($attempted_test) {
                echo "<script>alert('You have already submitted this test!'); window.location.href='" . base_url() . "';</script>";
                exit;
            }
            // $test_conf_data = $this->master_model->selectAllWhr('tbl_test_configuration','dept_master_id',0);
            // if (!empty($test_conf_data)) {
            $data['test_data'] = $this->test_model_g->get_latest_test_data($test_configuration_id);

            $examStartTime = $data['test_data']->test_datetime;
            $examDurationInMinutes = $data['test_data']->test_time;

            $userStartTime = date('Y-m-d H:i:s');

            $examStartTimestamp = strtotime($examStartTime);
            $userStartTimestamp = strtotime($userStartTime);

            $lateTimeInMinutes = round(($userStartTimestamp - $examStartTimestamp) / 60);

            if ($lateTimeInMinutes > 0) {
                $adjustedExamDurationInMinutes = $examDurationInMinutes - $lateTimeInMinutes;

                $adjustedExamDurationInMinutes = max(0, $adjustedExamDurationInMinutes);

                $adjustedExamEndTime = date("H:i:s", $userStartTimestamp + ($adjustedExamDurationInMinutes * 60));

                $data['new_test_time'] = $adjustedExamDurationInMinutes;
            }

            $limit = $data['test_data']->question_count;
            $test_name = $data['test_data']->test_name;
            $data["question_data"] = $this->test_model_g->get_question_data($user_id, $test_name, $limit);
            // } else {
            //     $data["question_data"] = $this->test_model_g->get_test_data($user_id);
            // }

            $this->load->view("attempt_test", $data);
        }
    }

    public function submit_test()
    {
        $this->load->model("test_model_g");
        $user_id = $this->session->userdata("user_id");
        $login_id = $this->session->userdata("login_id");
        $test_id = $this->input->post('test_id');
        $test_status = 'submitted';
        $start_time = $this->input->post("start_time");
        $submitted_time = date('Y-m-d H:i:s');
        $attempted_test = $this->percent_model->get_employee_latest_data($test_id, $user_id, $test_status);

        if ($attempted_test) {
            $data = array(
                'valid' => false,
                'msg' => "You have already submitted this test!",
                'redirect' => base_url("aptitude_exam_login/" . $user_id) // Correct redirection URL
            );

            $this->json->jsonReturn($data);
            return;
        }

        $user_test_data = array(
            'test_id' => $test_id,
            'user_id' => $user_id,

            'login_id' => $login_id,
            'test_date' => date('Y-m-d'),
            'test_status' => 'submitted',
            'start_time' => $start_time,
            'submitted_time' => $submitted_time
        );


        $hidden_question_array = $this->input->post('hidden_question_list');
        $question_list = unserialize(base64_decode($hidden_question_array));
        foreach ($question_list as $key) {
            $user_que_data[] = array(
                "user_id" => $user_id,
                "question_id" => $key,
                "option_id" => $this->input->post("answer_" . $key),
                "user_test_id" => ''
            );
        }
        // print_r( $user_que_data);
        // die();
        $result = $this->test_model_g->save_test($user_test_data, $user_que_data);
        $user_info = $this->percent_model->check_user_type($login_id);

        if ($user_info && $user_info->user_type === "Intern") {
            $redirect_url = "intern_aptitude_exam_login/" . $user_id;
        } else {
            $redirect_url = "aptitude_exam_login/" . $user_id;
        }

        if ($result) {
            $data = array(
                'valid' => true,
                'msg' => "Test response has been submitted successfully.",
                'redirect' => $redirect_url
            );
        } else {
            $data = array(
                'valid' => false,
                'msg' => "Unable to save test. Please try again.",
                'redirect' => $redirect_url
            );
        }

        $this->json->jsonReturn($data);
    }


    public function submit_email_test()
    {
        $this->load->model("master_model");
        $this->load->model("test_model_g");
        $user_id = $this->session->userdata("user_id");
        $email_id = $this->input->post('email_id');
        $to = $this->input->post('to');
        $cc = $this->input->post('cc');
        $bcc = $this->input->post('bcc');
        $message = $this->input->post('message');
        $subject = $this->input->post('subject');
        $attachment_file = $this->input->post('attachment_file');

        $data['email'] = $this->master_model->selectDetailsWhr('tbl_email', 'email_id', $email_id);
        $org_to = $data['email']->to;
        $org_subject = $data['email']->subject;
        $org_message = $data['email']->message;
        $org_attachment_file = $data['email']->attachment_file;

        $total_marks = 1;

        if ($to == $org_to) {
            $total_marks++;
        }
        if ($attachment_file == $org_attachment_file) {
            $total_marks++;
        }

        $subject1 = explode(' ', $subject);
        $subject_cnt = count($subject1);
        $org_subject1 = explode(' ', $org_subject);
        $org_subject_cnt = count($org_subject1);

        $singleWordNumber1 = (1 / $org_subject_cnt);
        $singleWordNumber1 = number_format($singleWordNumber1, 2, '.', ' ');
        $differentWord1 = array_diff($subject1, $org_subject1);
        $wrongWord1 = count($differentWord1);
        $correctWord1 = $subject_cnt - $wrongWord1;
        $totalsubMarks = $correctWord1 * $singleWordNumber1;
        $total_marks = $total_marks + $totalsubMarks;

        $body = explode(' ', $message);
        $body_cnt = count($body);
        $org_body = explode(' ', $org_message);
        $org_body_cnt = count($org_body);
        $singleWordNumber = (1 / $org_body_cnt);
        $singleWordNumber = number_format($singleWordNumber, 2, '.', ' ');
        $differentWord = array_diff($body, $org_body);
        $wrongWord = count($differentWord);
        $correctWord = $body_cnt - $wrongWord;
        $totalbodyMarks = $correctWord * $singleWordNumber;
        $total_marks = $total_marks + $totalbodyMarks;


        $data = array(
            'user_id' => $user_id,
            'email_id' => $email_id,
            'to' => $to,
            'cc' => $cc,
            'bcc' => $bcc,
            'subject' => $subject,
            'message' => $message,
            'attachment_file' => $attachment_file,
            'total_marks' => $total_marks
        );

        $result = $this->master_model->addData('tbl_user_email_answer', $data);
        if ($result) {
            $data = array(
                'valid' => true,
                'msg' => "Test response has been submitted successfully.",
                'redirect' => "passage_test"//"passage_test"


            );

        } else {
            $data = array(
                'valid' => false,
                'msg' => "Unable to save test. Please try again.",
                'redirect' => ""


            );
        }
        $this->json->jsonReturn($data);
        // $question=$this->test_model_g->getQuestionList();


    }

    public function review()
    {
        if ($this->authentication->logged_in() == FALSE) {
            redirect(base_url());

        } else {
            $this->load->model("test_model_g");
            $this->load->model("master_model");
            $user_id = $this->session->userdata('user_id');

            $data['question_data'] = $this->test_model_g->get_review_data($user_id);
            $data['obj_result'] = $this->test_model_g->get_result($user_id);

            $data['passage_ans_data'] = $this->master_model->selectDetailsWhr('tbl_student_passage_history', 'student_id', $user_id);
            $data['email_ans'] = $this->master_model->selectDetailsWhr('tbl_user_email_answer', 'user_id', $user_id);
            $data['option_name'] = array("A", "B", "C", "D", "E", "F");
            $data['user_id'] = $user_id;
            $this->load->view("review", $data);
        }


    }

    public function get_test_result()
    {
        $this->load->model("test_model_g");
        $user_id = $this->session->userdata('user_id');
        $this->authentication->logout();
        $result = $this->test_model_g->get_test_result($user_id);
        $this->json->jsonReturn($result);
    }

    public function para()
    {
        $this->load->model('master_model');
        $data['paragraph'] = $this->master_model->selectDetailsWhr('tbl_passage', 'passage_id', 1);
        $this->load->view('para', $data);
    }

    public function save_paragraph_content()
    {
        $id = $this->input->post('id');
        $this->load->model('master_model');
        $paragraph = $this->input->post('paragraph');

        $data = array(
            'passage' => $paragraph,
        );

        $result = $this->master_model->updateDetails('tbl_passage', 'passage_id', '1', $data);
        if ($result) {
            $this->json->jsonReturn(array(
                'valid' => TRUE,
                'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Paragraph Details Updated Successfully!</div>'
            ));
        } else {
            $this->json->jsonReturn(array(
                'valid' => FALSE,
                'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Updating Section Details !</div>'
            ));
        }
    }


    public function delete_test()
    {
        $this->load->model('master_model');
        $test_configuration_id = $this->input->post('id');

        $data = array('display' => 'N');

        $result = $this->master_model->updateDetails('tbl_test_configuration', 'test_configuration_id', $test_configuration_id, $data);

        if ($result) {
            $this->json->jsonReturn(array(
                'valid' => TRUE,
                'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Email Successfully!</div>'
            ));
        } else {
            $this->json->jsonReturn(array(
                'valid' => FALSE,
                'msg' => '<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Email Details !</div>'
            ));
        }
    }

    public function submit_test_if_user_not_attempted()
    {
        $this->load->model("test_model_g");
        $this->load->model("master_model");
        $test_data = $this->test_model_g->getTodayExamUserByDateByDept();

        if (!empty($test_data)) {
            foreach ($test_data as $test) {
                $test_key = $test['key'];
                $dept_wise_user = $test['dept_wise_user'];
                $end_time = date('Y-m-d H:i:s', strtotime($test_key->test_datetime . " +{$test_key->test_time} minutes"));

                foreach ($dept_wise_user as $dept) {
                    $user_test = $this->master_model->selectDetailsWhrWhr('tbl_user_test', 'user_id', $dept->user_id, 'test_id', $test_key->test_configuration_id);
                    if (empty($user_test)) {
                        $user_test_data = array(
                            'test_id' => $test_key->test_configuration_id,
                            'user_id' => $dept->user_id,
                            'test_date' => date('Y-m-d'),
                            'test_status' => 'submitted',
                            'start_time' => $end_time,
                            'submitted_time' => $end_time
                        );
                        $this->db->insert('tbl_user_test', $user_test_data);
                    }
                }
            }
        }
    }
}