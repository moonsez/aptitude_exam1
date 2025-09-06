<?php defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = 'login_controller/index';
$route['user_login'] = 'login_controller/user_login';


/****************** Login Functionality **************/
$route['admin'] = 'login_controller/admin';
$route['admin_login'] = 'login_controller/admin_login';
$route['login'] = "login_controller/login";
$route['register_now'] = 'login_controller/register_now';
$route['user'] = 'login_controller/load';
$route['admin_user'] = 'login_controller/admin_load';
$route['logout'] = 'login_controller/logout';
$route['admin_logout'] = 'login_controller/admin_logout';
$route['register_user'] = 'login_controller/register_user';
$route['aptitude_exam_login/(:any)'] = 'login_controller/aptitude_exam_login/$1';
$route['aptitude_admin_login/(:any)'] = 'login_controller/aptitude_admin_login/$1';

$route['exam_login'] = "login_controller/exam_login";

$route['lang_change'] = "test_controller_r/lang_change";
/****************** end login function ****************/
/****************** Start Section Form **************/
$route['section'] = 'test_controller_r/section';
$route['save_section'] = 'test_controller_r/save_section';
$route['fetch_section'] = 'test_controller_r/fetch_section';
$route['edit_section'] = 'test_controller_r/edit_section';
$route['delete_section'] = 'test_controller_r/delete_section';
$route['subdepartment'] = 'test_controller_r/subdepartment';
$route['save_sub_section'] = 'test_controller_r/save_sub_section';
$route['fetch_subsection'] = 'test_controller_r/fetch_subsection';
$route['edit_sub_section'] = 'test_controller_r/edit_sub_section';
$route['delete_sub_section'] = 'test_controller_r/delete_sub_section';
$route['fetch_question_data'] = 'test_controller_r/fetch_question_data';




/******************End Section form************************/

/****************** Start Question Form **************/
$route['question'] = 'test_controller_r/question';
$route['exchange_rate_import'] = 'test_controller_r/exchange_rate_import';
$route['email_question'] = 'test_controller_g/email_question';
$route['load_file_select'] = 'test_controller_g/load_file_select';
$route['save_email_content'] = 'test_controller_g/save_email_content';
$route['fetch_email'] = 'test_controller_g/fetch_email';
$route['edit_email'] = 'Test_controller_g/edit_email';
$route['delete_email'] = 'Test_controller_g/delete_email';
$route['begin_test/(:any)/(:any)'] = 'Test_controller_g/begin_test/$1/$2';



$route['view_email_question'] = 'test_controller_g/view_email_question';
$route['submit_email_test'] = 'test_controller_g/submit_email_test';




$route['save_question'] = 'test_controller_r/save_question';
$route['fetch_question'] = 'test_controller_r/fetch_question';
$route['edit_question'] = 'Test_controller_r/edit_question';
$route['delete_question'] = 'Test_controller_r/delete_question';
$route['delete_option'] = 'Test_controller_r/delete_option';
$route['save_import_questions'] = 'Test_controller_r/save_import_questions';
$route['save_ai_questions']='Test_controller_r/save_ai_questions';



/******************End Question form************************/


/******************start configuration Page *****************/
$route['test_configuration'] = 'test_controller_g/test_configuration';
$route['save_configuration'] = 'test_controller_g/save_configuration';
$route['fetch_test'] = 'test_controller_g/fetch_test';
$route['edit_test'] = 'test_controller_g/edit_test';
$route['delete_test'] = 'test_controller_g/delete_test';
/****************** End Configuration Page ******************/

/***************** Attemp test functionality *******************/
$route['attempt_test/(:any)'] = 'test_controller_g/attempt_test/$1';
$route['submit_test'] = 'test_controller_g/submit_test';
$route['review'] = 'test_controller_g/review';
$route['get_test_result'] = 'test_controller_g/get_test_result';

/***************** end attempt test ******************************/

/******************start Reference form *****************/

$route['reference'] = 'test_controller_r/reference';
$route['reference_master_modal'] = 'Test_controller_r/reference_master_modal';
$route['save_reference'] = 'test_controller_r/save_reference';
$route['fetch_reference'] = 'test_controller_r/fetch_reference';
$route['edit_reference'] = 'Test_controller_r/edit_reference';
$route['delete_reference'] = 'Test_controller_r/delete_reference';
$route['select_reference'] = 'test_controller_r/select_reference';

$route['passage_test'] = 'test_controller_pr/loadPassageFile';
$route['save_typing'] = 'test_controller_pr/saveTypingData';

/******************End Reference form************************/
$route['pdf/(:num)'] = 'test_controller_r/pdf/$1';

/****************** All Student Records **************/
$route['student_record'] = 'admin_controller_ats/student_record';
$route['save_student_record'] = 'admin_controller_ats/save_student_record';
$route['fetch_student_record'] = 'admin_controller_ats/fetch_student_record';
$route['edit_student_record'] = 'admin_controller_ats/edit_student_record';
$route['delete_student_record'] = 'admin_controller_ats/delete_student_record';

/******************End All Student Records************************/

/****************** Institute Records **************/
$route['institute_record'] = 'admin_controller_ats/institute_record';
$route['save_institute_record'] = 'admin_controller_ats/save_institute_record';
$route['fetch_institute_record'] = 'admin_controller_ats/fetch_institute_record';
$route['edit_institute_record'] = 'admin_controller_ats/edit_institute_record';
$route['delete_institute_record'] = 'admin_controller_ats/delete_institute_record';

/******************End Institute Records************************/

/****************** Coordinator Records ****************/
$route['coordinator'] = 'admin_controller_ats/coordinator';
$route['save_coordinator'] = 'admin_controller_ats/save_coordinator';
$route['fetch_coordinator'] = 'admin_controller_ats/fetch_coordinator';
$route['edit_coordinator'] = 'admin_controller_ats/edit_coordinator';
$route['delete_coordinator'] = 'admin_controller_ats/delete_coordinator';

/******************End Coordinator Records************************/

/******************** Exam Result Records ****************/
$route['exam_result'] = 'admin_controller_ats/result';
// $route['exam_result'] = 'admin_controller_ats/result';
// $route['result/(:any)'] = 'admin_controller_ats/result/$1';
$route['view_result/:num'] = 'admin_controller_ats/viewResult/$1';
$route['admin/view_result/(:num)'] = 'admin_controller_ats/view_result/$1';



$route['update_word_result'] = 'admin_controller_ats/update_word_result';
$route['update_excel_result'] = 'admin_controller_ats/update_excel_result';
/******************** Exam Result Records ****************/

$route['para'] = 'test_controller_g/para';
$route['save_paragraph_content'] = 'test_controller_g/save_paragraph_content';

/******************** Passage ****************/
$route['passage'] = 'admin_controller_ats/passage';
$route['save_passage'] = 'admin_controller_ats/save_passage';
$route['fetch_passage'] = 'admin_controller_ats/fetch_passage';
$route['edit_passage'] = 'admin_controller_ats/edit_passage';
$route['delete_passage'] = 'admin_controller_ats/delete_passage';
/******************** Passage ****************/

$route['negative_master'] = 'test_controller_r/negative_master';
$route['save_negative_master_form'] = 'test_controller_r/save_negative_master_form';
$route['fetch_negative'] = 'test_controller_r/fetch_negative';
$route['delete_negative_master'] = 'test_controller_r/delete_negative_master';
$route['edit_negative'] = 'test_controller_r/edit_negative';

$route['download_certificate/:num'] = 'admin_controller_ats/download_certificate/$1';

$route['user_test_res'] = 'login_controller/user_test_res';
$route['user_view_results/:num'] = 'login_controller/user_view_results/$1';

$route['view_result_modal'] = 'admin_controller_ats/view_result_modal';

$route['exam_report'] = 'admin_controller_ats/exam_report';
$route['view_report_modal'] = 'admin_controller_ats/view_report_modal';
$route['view_exam_result/:num'] = 'admin_controller_ats/view_exam_result/$1';
$route['percentage_exam_result'] = 'percent_result/percentage_exam_result';
$route['percentage_exam_result/(:any)'] = 'percent_result/percentage_exam_result/$1';

$route['get_correct_report'] = 'percent_result/get_answer_report';
$route['get_assets_chart_details'] = 'percent_result/get_assets_chart_details';
$route['graphically_score_tracking'] = 'percent_result/graphically_score_tracking';
$route['graphically_score_tracking/(:any)'] = 'percent_result/graphically_score_tracking/$1';

//Employee wise report
$route['result'] = 'percent_result/result';
$route['result/(:any)'] = 'percent_result/result/$1';
$route['result/(:any)/(:any)'] = 'percent_result/result/$1/$2';

$route['get_departments'] = 'percent_result/get_departments';
$route['admin/get_designations'] = 'percent_result/get_designations';
$route['get_location'] = 'percent_result/get_location';
$route['get_empname'] = 'percent_result/get_empname';

$route['export_test_report/(:any)'] = 'percent_result/export_test_report/$1';
$route['export_percentage_report/(:any)'] = 'percent_result/export_percentage_report/$1';
$route['question_wise_report/(:any)'] = 'percent_result/question_wise_report/$1';
$route['emp_wise_report'] = 'percent_result/emp_wise_report';
$route['fetch_empwise_report'] = 'percent_result/fetch_empwise_report';
$route['export_emp_wise_report/(:any)'] = 'percent_result/export_emp_wise_report/$1';

$route['overall_emp_report'] = 'percent_result/overall_emp_report';
$route['fetch_overall_emp_report'] = 'percent_result/fetch_overall_emp_report';



$route['exam_attendance_report'] = 'percent_result/exam_attendance_report';
$route['exam_attendance_report/(:any)'] = 'percent_result/exam_attendance_report/$1';
$route['export_attendance_report/(:any)'] = 'percent_result/export_attendance_report/$1';

// $route['register_intern'] = 'percent_result/register_intern';
// $route['chkinternlogin']='percent_result/chkinternlogin';
// $route['intern_login'] = 'percent_result/intern_login';
// $route['intern'] = 'percent_result/intern';
// $route['intern_user'] = 'percent_result/intern_load';
// $route['intern_logout'] = 'percent_result/intern_logout';
// $route['intern_registration'] = 'percent_result/intern_registration';

// $route['intern_begin_test/(:any)/(:any)/(:any)'] = 'percent_result/intern_begin_test/$1/$2/$3';
// $route['intern_attempt_test/(:any)'] = 'percent_result/intern_attempt_test/$1';
// $route['intern_aptitude_exam_login/(:any)'] = 'percent_result/intern_aptitude_exam_login/$1';
// $route['intern_test_res'] = 'percent_result/intern_test_res';
// $route['intern_view_results/:num'] = 'percent_result/intern_view_results/$1';
// $route['intern_download_certificate/:num'] = 'percent_result/intern_download_certificate/$1';

$route['submit_test_if_user_not_attempted'] = 'test_controller_g/submit_test_if_user_not_attempted';


