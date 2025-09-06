<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller_ats extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_model');
        $this->load->model('test_model_r');
        $this->load->library('imageupload');
        $this->load->library('upload');
        $this->load->library('report_creation');
        $this->load->model("test_model_g");
        $this->load->model("percent_model");
    }

    /* *************************************************************************************************** */
    public function student_record()
    {
        $data['centerRecord'] = $this->master_model->selectDetailsByDESC('tbl_institute_record', 'center_name');
        //$data['studentRecord']=$this->master_model->selectAllWhr('tbl_userinfo','role_id','2');

        $data['studentRecord'] = $this->master_model->getstudentdata();
        $data['sectionData'] = $this->master_model->selectDetailsByDESC('tbl_section', 'section_name');



        $data['subsectionData'] = $this->master_model->selectDetailsByDESC('tbl_subsection', 'sub_section_name');

        //$data['testName']=$this->master_model->selecttestdata(); 
        //echo $this->db->last_query();
        //exit();

        $this->load->view('admin/master_form/student_record', $data);
    }

    public function save_student_record()
    {
        $student_id = $this->input->post('id');
        $student_name = $this->input->post('student_name');
        $email = $this->input->post('student_email');
        $mobile = $this->input->post('student_mobile');
        $institute = $this->input->post('institute');
        $exam_center = $this->input->post('exam_center');
        $taluka = $this->input->post('taluka');
        $distruct = $this->input->post('distruct');
        $department = $this->input->post('section_id');

        $sub_department = $this->input->post('sub_section');


        $student_data = array(
            'role_id' => 2,
            'user_name' => $student_name,
            'email' => $email,
            'mobile_no' => $mobile,
            'organisation' => $institute,
            'exam_center' => $exam_center,
            'taluka' => $taluka,
            'district' => $distruct,
            'section_id' => $department,
            'sub_section_id' => $sub_department
        );


        if (isset($student_id) && !empty($student_id) && ($student_id > 0)) {
            $result = $this->master_model->updateDetails('tbl_userinfo', 'user_id', $student_id, $student_data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Student Record Details Updated Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Updating Student Record Details !</div>'
                ));
            }
        } else {
            $result = $this->master_model->addData('tbl_userinfo', $student_data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Student Record Details Saved Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Saving Student Record Details !</div>'
                ));
            }
        }
    }

    public function fetch_student_record()
    {
        $data['centerRecord'] = $this->master_model->selectDetailsByDESC('tbl_institute_record', 'center_name');
        //$data['studentRecord']=$this->master_model->selectAllWhr('tbl_userinfo','role_id','2');
        $data['studentRecord'] = $this->master_model->getstudentdata();

        $this->load->view('admin/master_form/student_record_table', $data);
    }

    public function edit_student_record()
    {
        $student_id = $this->input->post('id');

        //$data['centerRecord']=$this->master_model->selectDetailsByDESC('tbl_institute_record','center_name');
        $data['single_student_record'] = $this->master_model->selectDetailsWhr('tbl_userinfo', 'user_id', $student_id);

        $data['sectionData'] = $this->master_model->selectDetailsByDESC('tbl_section', 'section_name');


        $data['subsectionData'] = $this->master_model->selectDetailsByDESC('tbl_subsection', 'sub_section_name');

        //$data['studentRecord']=$this->master_model->selectAllWhr('tbl_userinfo','role_id','2');
        $data['studentRecord'] = $this->master_model->getstudentdata();
        $this->load->view('admin/master_form/student_record', $data);
    }

    public function delete_student_record()
    {
        $student_id = $this->input->post('id');

        $data = array('display' => 'N');

        $result = $this->master_model->updateDetails('tbl_userinfo', 'user_id', $student_id, $data);

        if ($result) {
            $this->json->jsonReturn(array(
                'valid' => TRUE,
                'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Student Record Successfully!</div>'
            ));
        } else {
            $this->json->jsonReturn(array(
                'valid' => FALSE,
                'msg' => '<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Student Record Details !</div>'
            ));
        }
    }

    /* *************************************************************************************************** */

    /* *************************************************************************************************** */
    public function institute_record()
    {
        $data['instituteRecord'] = $this->master_model->selectDetailsByDESC('tbl_institute_record', 'center_name');
        $this->load->view('admin/master_form/institute_record', $data);
    }

    public function save_institute_record()
    {
        $instituteId = $this->input->post('id');

        $center_code = $this->input->post('center_code');
        $center_name = $this->input->post('center_name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $distruct = $this->input->post('distruct');
        $taluka = $this->input->post('taluka');


        $institute_data = array(
            'center_code' => $center_code,
            'center_name' => $center_name,
            'email' => $email,
            'mobile' => $mobile,
            'district' => $distruct,
            'taluka' => $taluka
        );


        if (isset($instituteId) && !empty($instituteId) && ($instituteId > 0)) {
            $result = $this->master_model->updateDetails('tbl_institute_record', 'institute_id', $instituteId, $institute_data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Institute Record Details Updated Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Updating Institute Record Details !</div>'
                ));
            }
        } else {
            $result = $this->master_model->addData('tbl_institute_record', $institute_data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Institute Record Details Saved Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Saving Institute Record Details !</div>'
                ));
            }
        }
    }

    public function fetch_institute_record()
    {
        $data['instituteRecord'] = $this->master_model->selectDetailsByDESC('tbl_institute_record', 'center_name');
        $this->load->view('admin/master_form/institute_record_table', $data);
    }

    public function edit_institute_record()
    {
        $instituteId = $this->input->post('id');

        $data['single_institute_record'] = $this->master_model->selectDetailsWhr('tbl_institute_record', 'institute_id', $instituteId);
        $data['instituteRecord'] = $this->master_model->selectDetailsByDESC('tbl_institute_record', 'center_name');
        $this->load->view('admin/master_form/institute_record', $data);
    }

    public function delete_institute_record()
    {
        $instituteId = $this->input->post('id');

        $data = array('display' => 'N');

        $result = $this->master_model->updateDetails('tbl_institute_record', 'institute_id', $instituteId, $data);

        if ($result) {
            $this->json->jsonReturn(array(
                'valid' => TRUE,
                'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Institute Record Successfully!</div>'
            ));
        } else {
            $this->json->jsonReturn(array(
                'valid' => FALSE,
                'msg' => '<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Institute Record Details !</div>'
            ));
        }
    }
    /* *************************************************************************************************** */


    /* *************************************************************************************************** */
    public function coordinator()
    {
        $data['centerRecord'] = $this->master_model->selectDetailsByDESC('tbl_institute_record', 'center_name');
        $data['coordinatorRecord'] = $this->master_model->selectAllWhr('tbl_userinfo', 'role_id', '3');
        $this->load->view('admin/master_form/coordinator', $data);
    }

    public function save_coordinator()
    {
        $coordinator_id = $this->input->post('id');

        $coordinator_name = $this->input->post('coordinator_name');
        $Coordinator_email = $this->input->post('Coordinator_email');
        $Coordinator_mobile = $this->input->post('Coordinator_mobile');
        $institute = $this->input->post('institute');
        $exam_center = $this->input->post('exam_center');
        $taluka = $this->input->post('taluka');
        $distruct = $this->input->post('distruct');


        $coordinator_data = array(
            'role_id' => 3,
            'user_name' => $coordinator_name,
            'email' => $Coordinator_email,
            'mobile_no' => $Coordinator_mobile,
            'organisation' => $institute,
            'exam_center' => $exam_center,
            'taluka' => $taluka,
            'district' => $distruct
        );


        if (isset($coordinator_id) && !empty($coordinator_id) && ($coordinator_id > 0)) {
            $result = $this->master_model->updateDetails('tbl_userinfo', 'user_id', $coordinator_id, $coordinator_data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Coordinator Record Details Updated Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Updating Coordinator Record Details !</div>'
                ));
            }
        } else {
            $result = $this->master_model->addData('tbl_userinfo', $coordinator_data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Coordinator Record Details Saved Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Saving Coordinator Record Details !</div>'
                ));
            }
        }
    }

    public function fetch_coordinator()
    {
        $data['centerRecord'] = $this->master_model->selectDetailsByDESC('tbl_institute_record', 'center_name');
        $data['coordinatorRecord'] = $this->master_model->selectAllWhr('tbl_userinfo', 'role_id', '3');
        $this->load->view('admin/master_form/coordinator_table', $data);
    }

    public function edit_coordinator()
    {
        $Coordinator_id = $this->input->post('id');
        $data['centerRecord'] = $this->master_model->selectDetailsByDESC('tbl_institute_record', 'center_name');
        $data['single_coordinator_record'] = $this->master_model->selectDetailsWhr('tbl_userinfo', 'user_id', $Coordinator_id);
        $data['coordinatorRecord'] = $this->master_model->selectAllWhr('tbl_userinfo', 'role_id', '3');
        $this->load->view('admin/master_form/coordinator', $data);
    }

    public function delete_coordinator()
    {
        $Coordinator_id = $this->input->post('id');

        $data = array('display' => 'N');

        $result = $this->master_model->updateDetails('tbl_userinfo', 'user_id', $Coordinator_id, $data);

        if ($result) {
            $this->json->jsonReturn(array(
                'valid' => TRUE,
                'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Coordinator Record Successfully!</div>'
            ));
        } else {
            $this->json->jsonReturn(array(
                'valid' => FALSE,
                'msg' => '<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Coordinator Record Details !</div>'
            ));
        }
    }
   
    public function view_result_modal()
    {
        $test_id = $this->input->post('id');

        // Validate test_id if needed
        // Send redirect URL to JavaScript instead of HTML view
        $this->json->jsonReturn([
            'redirect_url' => 'admin/view_result/' . $test_id
        ]);
    }


    public function viewResult()
    {
        $this->load->model("test_model_g");
        $user_test_id = $this->uri->segment(2);

        $data['question_data'] = $this->test_model_g->get_review_data($user_test_id);
        // echo '<pre>';
        // print_r($data['question_data']);die;

        $data['obj_result'] = $this->test_model_g->get_result($user_test_id);

        $data['option_name'] = array("A", "B", "C", "D", "E", "F");

        $this->load->view("admin/view_result", $data);

    }

    public function update_word_result()
    {
        $user_id = $this->input->post('id');

        $heading = $this->input->post('heading');
        $reference_no_date = $this->input->post('reference_no_date');
        $addr_of_recipient = $this->input->post('addr_of_recipient');
        $subject_reference = $this->input->post('subject_reference');
        $salutation = $this->input->post('salutation');
        $paragraph = $this->input->post('paragraph');
        $sign_your_name = $this->input->post('sign_your_name');
        $enclosure = $this->input->post('enclosure');

        $auto_heading = $this->input->post('auto_heading');
        $auto_reference_no_date = $this->input->post('auto_reference_no_date');
        $auto_addr_of_recipient = $this->input->post('auto_addr_of_recipient');
        $auto_subject_reference = $this->input->post('auto_subject_reference');
        $auto_salutation = $this->input->post('auto_salutation');
        $auto_paragraph = $this->input->post('auto_paragraph');
        $auto_sign_your_name = $this->input->post('auto_sign_your_name');
        $auto_enclosure = $this->input->post('auto_enclosure');

        if (isset($heading) && !empty($heading)) {
            $total_word_marks = $heading + $reference_no_date + $addr_of_recipient + $subject_reference + $salutation + $paragraph + $sign_your_name + $enclosure;
        } else {
            $word_result = $this->master_model->check_result($user_id);

            $que_heading1 = explode(' ', $word_result->que_heading);
            $que_heading_cnt = count($que_heading1);
            $auto_heading1 = explode(' ', $auto_heading);
            $auto_heading_cnt = count($auto_heading1);
            $singleWordNumber1 = (1 / $que_heading_cnt);
            $singleWordNumber1 = number_format($singleWordNumber1, 2, '.', ' ');
            $differentWord1 = array_diff($auto_heading1, $que_heading1);
            $wrongWord1 = count($differentWord1);
            $correctWord1 = $que_heading_cnt - $wrongWord1;
            $totalMarks1 = $correctWord1 * $singleWordNumber1;
            $totalheaderMarks = 0;
            $totalheaderMarks = $totalheaderMarks + $totalMarks1;

            $que_addr1 = explode(' ', $word_result->que_addr_of_recipient);
            $que_addr_cnt = count($que_addr1);
            $auto_addr1 = explode(' ', $auto_reference_no_date);
            $auto_addr_cnt = count($auto_addr1);
            $singleWordNumber2 = (1 / $que_addr_cnt);
            $singleWordNumber2 = number_format($singleWordNumber2, 2, '.', ' ');
            $differentWord2 = array_diff($que_addr1, $auto_addr1);
            $wrongWord2 = count($differentWord2);
            $correctWord2 = $que_heading_cnt - $wrongWord2;
            $totalMarks2 = $correctWord2 * $singleWordNumber2;
            $totaladdrMarks = 0;
            $totaladdrMarks = $totaladdrMarks + $totalMarks2;

            $que_sub1 = explode(' ', $word_result->que_subject_reference);
            $que_sub_cnt = count($que_sub1);
            $auto_sub1 = explode(' ', $auto_subject_reference);
            $auto_sub_cnt = count($auto_sub1);
            $singleWordNumber3 = (1 / $que_sub_cnt);
            $singleWordNumber3 = number_format($singleWordNumber3, 2, '.', ' ');
            $differentWord3 = array_diff($que_sub1, $auto_sub1);
            $wrongWord3 = count($differentWord3);
            $correctWord3 = $que_heading_cnt - $wrongWord3;
            $totalMarks3 = $correctWord3 * $singleWordNumber3;
            $totalsubMarks = 0;
            $totalsubMarks = $totalsubMarks + $totalMarks3;

            $que_para1 = explode(' ', $word_result->que_paragraph);
            $que_para_cnt = count($que_para1);
            $auto_para1 = explode(' ', $auto_paragraph);
            $auto_para_cnt = count($auto_para1);
            $singleWordNumber4 = (2 / $que_para_cnt);
            $singleWordNumber4 = number_format($singleWordNumber4, 2, '.', ' ');
            $differentWord4 = array_diff($que_para1, $auto_para1);
            $wrongWord4 = count($differentWord4);
            $correctWord4 = $que_heading_cnt - $wrongWord4;
            $totalMarks4 = $correctWord4 * $singleWordNumber4;
            $totalparaMarks = 0;
            $totalparaMarks = $totalparaMarks + $totalMarks4;

            $total_word_marks = $totalheaderMarks + $totaladdrMarks + $totalsubMarks + $totalparaMarks;

            if (strcmp($word_result->que_reference_no_date, $auto_reference_no_date) == 0) {
                $total_word_marks = $total_word_marks + 0.5;
            }
            if (strcmp($word_result->que_salutation, $auto_salutation) == 0) {
                $total_word_marks = $total_word_marks + 0.5;
            }
            if (strcmp($word_result->que_sign_your_name, $auto_sign_your_name) == 0) {
                $total_word_marks++;
            }
            if (strcmp($word_result->que_enclosure, $auto_enclosure) == 0) {
                $total_word_marks = $total_word_marks + 0.5;
            }
        }

        $data = array(
            'heading' => $heading,
            'reference_no_date' => $reference_no_date,
            'addr_of_recipient' => $addr_of_recipient,
            'subject_reference' => $subject_reference,
            'salutation' => $salutation,
            'paragraph' => $paragraph,
            'sign_your_name' => $sign_your_name,
            'enclosure' => $enclosure,
            'auto_heading' => $auto_heading,
            'auto_reference_no_date' => $auto_reference_no_date,
            'auto_addr_of_recipient' => $auto_addr_of_recipient,
            'auto_subject_reference' => $auto_subject_reference,
            'auto_salutation' => $auto_salutation,
            'auto_paragraph' => $auto_paragraph,
            'auto_sign_your_name' => $auto_sign_your_name,
            'auto_enclosure' => $auto_enclosure,
            'total_word_marks' => $total_word_marks
        );
        // print_r($data);
        //exit();
/*
        $result = $this->master_model->updateDetails('tbl_word_result','user_id', $user_id, $data);
        echo $this->db->last_query();

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Result Updated Successfully!</div>'
            ));
        }
        else
        { 
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While Updating Result Details !</div>'
            ));
        } */
    }

    public function update_excel_result()
    {
        $user_id = $this->input->post('rel');
        $marks = $this->input->post('marks');

        $data = array('marks' => $marks);

        $result = $this->master_model->updateDetails('tbl_excel_result', 'user_id', $user_id, $data);
        if ($result) {
            $this->json->jsonReturn(array(
                'valid' => TRUE,
                'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Result Updated Successfully!</div>'
            ));
        } else {
            $this->json->jsonReturn(array(
                'valid' => FALSE,
                'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Updating Result Details !</div>'
            ));
        }
    }
    /* ************************************* Student Result Records ****************************************** */

    /************************************* Passage **************************************************/
    public function passage()
    {
        $data['passageData'] = $this->master_model->selectDetailsByDESC('tbl_passage', 'passage_id');
        $this->load->view('admin/master_form/passage', $data);
    }

    public function save_passage()
    {
        $id = $this->input->post('id');
        $language = $this->input->post('language');
        $passagedesc = $this->input->post('passagedesc');

        $passage_data = array(
            // 'role_id'=>2,
            'language' => $language,
            'passage' => $passagedesc
        );


        if (isset($id) && !empty($id) && ($id > 0)) {
            $result = $this->master_model->updateDetails('tbl_passage', 'passage_id', $id, $passage_data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Passage Details Updated Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Updating Passage Details !</div>'
                ));
            }
        } else {
            $result = $this->master_model->addData('tbl_passage', $passage_data);

            if ($result) {
                $this->json->jsonReturn(array(
                    'valid' => TRUE,
                    'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Passage Details Saved Successfully!</div>'
                ));
            } else {
                $this->json->jsonReturn(array(
                    'valid' => FALSE,
                    'msg' => '<div class="alert modify alert-error"><strong>Error!</strong> While Saving Passage Details !</div>'
                ));
            }
        }
    }

    public function fetch_passage()
    {
        $data['passageData'] = $this->master_model->selectDetailsByDESC('tbl_passage', 'passage_id');
        $this->load->view('admin/master_form/passage_table', $data);
    }

    public function edit_passage()
    {
        $passage_id = $this->input->post('id');
        $data['single_passage'] = $this->master_model->selectDetailsWhr('tbl_passage', 'passage_id', $passage_id);
        $data['passageData'] = $this->master_model->selectDetailsByDESC('tbl_passage', 'passage_id');
        $this->load->view('admin/master_form/passage', $data);
    }

    public function delete_passage()
    {
        $passage_id = $this->input->post('id');

        $data = array('display' => 'N');

        $result = $this->master_model->updateDetails('tbl_passage', 'passage_id', $passage_id, $data);

        if ($result) {
            $this->json->jsonReturn(array(
                'valid' => TRUE,
                'msg' => '<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Passage Record Successfully!</div>'
            ));
        } else {
            $this->json->jsonReturn(array(
                'valid' => FALSE,
                'msg' => '<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Passage Record Details !</div>'
            ));
        }
    }
    /************************************ Passage ***************************************************/

    public function download_certificate()
    {
        $this->load->model("test_model_g");

        $user_test_id = $this->uri->segment(2);

        $this->test_model_g->save_cerificate($user_test_id);

    }

    public function exam_report()
    {
        $data['studentRecord'] = $this->test_model_r->view_student_result();

        $this->load->view('admin/exam_report', $data);
    }

    public function view_report_modal()
    {
        $test_id = $this->input->post('id');
        $data['test_report_data'] = $this->test_model_r->view_test_report($test_id);
        $data['user_test_data'] = $this->test_model_r->get_emp_test_data($test_id);

        $view = $this->load->view('view_report_modal', $data, TRUE);
        $this->json->jsonReturn(array('view' => $view));
    }

    public function view_exam_result()
    {
        $test_id = $this->uri->segment(2);

        $data['test_report_data'] = $this->test_model_r->view_test_report($test_id);
        $data['user_test_data'] = $this->test_model_r->get_emp_test_data($test_id);

        $this->load->view('admin/exam_report_view', $data);
    }

    // public function view_result($test_id)
    // {
    //     $data['user_result'] = $this->test_model_r->view_test_result($test_id);
    //     $this->load->view('admin/view_result_page1', $data);
    // }

    public function view_result($test_id)
    {
        $user_result = $this->test_model_r->view_test_result($test_id);
        $rank = 1;
    
        if (!empty($user_result)) {
            foreach ($user_result as $user) {
                $per_que_mark = $user->total_mark / $user->question_count;
                $wrong_marks = $user->incorrect_count * $user->per_mark;
                $correct_marks = $user->correct_count * $per_que_mark;
                $marks_obtained = $correct_marks - $wrong_marks;
                $not_attempted = $user->not_attended_count;
                $result = ($marks_obtained / $user->total_mark) * 100 >= 35 ? 'PASS' : 'FAIL';
    
                // Check if this user + test combo already exists
                $this->db->where('test_id', $test_id);
                $this->db->where('user_id', $user->user_id);
                $exists = $this->db->get('tbl_user_test_result')->row();
    
                if (!$exists) {
                    // Record doesn't exist, so insert it
                    $data = [
                        'test_id' => $test_id,
                        'user_id' => $user->user_id,
                        'correct_count' => $user->correct_count,
                        'incorrect_count' => $user->incorrect_count,
                        'marks_obtained' => $marks_obtained,
                        'not_attempted' => $not_attempted,
                        'response_time' => $user->response_time,
                        'result' => $result,
                        'rank' => $rank
                    ];
    
                    $this->db->insert('tbl_user_test_result', $data);
                } else {
                    // Check if the existing record needs updating
                    $update_data = [];
    
                    if ($exists->correct_count != $user->correct_count) {
                        $update_data['correct_count'] = $user->correct_count;
                    }
    
                    if ($exists->incorrect_count != $user->incorrect_count) {
                        $update_data['incorrect_count'] = $user->incorrect_count;
                    }
    
                    if ($exists->marks_obtained != $marks_obtained) {
                        $update_data['marks_obtained'] = $marks_obtained;
                    }
    
                    if ($exists->not_attempted != $not_attempted) {
                        $update_data['not_attempted'] = $not_attempted;
                    }
    
                    if ($exists->response_time != $user->response_time) {
                        $update_data['response_time'] = $user->response_time;
                    }
    
                    if ($exists->result != $result) {
                        $update_data['result'] = $result;
                    }
                    
    
                    if ($exists->rank != $rank) {
                        $update_data['rank'] = $rank;
                    }
    
                    // If there are any changes, update the record
                    if (!empty($update_data)) {
                        $this->db->where('test_id', $test_id);
                        $this->db->where('user_id', $user->user_id);
                        $this->db->update('tbl_user_test_result', $update_data);
                    }
                }
    
                $rank++;
            }
        }
    
        $data['user_result'] = $user_result;
        $this->load->view('admin/view_result_page1', $data);
    }
    



    public function result()
    {
        $data['studentRecord']=$this->test_model_r->view_student_result();
       
        $this->load->view('admin/result',$data); 
    }

    public function question_wise_report($test_id = null)
    {
        $this->load->library('excel');  // Load PHPExcel library

        $test_id = $this->uri->segment(2);

        $data['test_report_data'] = $this->test_model_r->view_test_report($test_id);
        $data['user_test_data'] = $this->test_model_r->get_emp_test_data($test_id);

        // Call the function to generate the Excel file
        $this->excel->generate_question_report($data);
    }


}