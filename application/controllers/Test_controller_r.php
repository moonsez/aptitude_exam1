<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test_controller_r extends CI_Controller {


	public function __construct()
    { 
        parent::__construct();
        $this->load->model('master_model');   
        $this->load->model('test_model_r');   
        $this->load->library('imageupload');
        $this->load->library('upload');
        $this->load->library('report_creation');
        
    }

    public function lang_change()
    {
        $lang=$this->input->post('lang');
        $this->session->set_userdata("language",$lang); 
        $this->json->jsonReturn(array(
                'valid'=>TRUE
        ));
    }
    
    public function pdf($user_id)
    {
        //$user_id=$this->session->userdata("user_id");
        
        $data['user_details'] = $this->master_model->selectDetailsWhr('tbl_userinfo','user_id',$user_id);
        $data['testData']=$this->test_model_r->selectans($user_id);

        $pdfname = 'Moonsez_Certificate';
        $html=$this->load->view('certificate',$data,TRUE);
        //$this->report_creation->create_pdf($html,$pdfname); 
        $this->report_creation->pdf_create($html, $pdfname, TRUE, 'landscape');      
    }

    public function section()
    {
        $data['sectionData']=$this->master_model->selectDetailsByDESC('tbl_section','section_name');
      	$this->load->view('admin/master_form/section',$data); 
    }
    public function subdepartment()
    {
        $data['sectionData']=$this->master_model->selectDetailsByDESC('tbl_section','section_name');
        $data['subsectionData']=$this->master_model->selectSubsectionDetails('tbl_subsection','sub_section_name');
        
        $this->load->view('admin/master_form/subdepartment',$data); 
    }
    public function save_section() 
    {       
        $section_id=$this->input->post('id');
       
       
        $section_name=$this->input->post('section_name');
        $section_desc=$this->input->post('section_desc');

        
        $section_data=array('section_name'=>$section_name,
                            'section_desc'=>$section_desc);

      
        if(isset($section_id) && !empty($section_id) && ($section_id>0))
        {
            $result = $this->master_model->updateDetails('tbl_section','section_id', $section_id, $section_data);
           
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Section Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While Updating Section Details !</div>'
                ));
            }
        }
        else
        {
            $result=$this->master_model->addData('tbl_section',$section_data);
           
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Section Details Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While Saving Section Details !</div>'
                ));
            }
        }
    }  
    public function save_sub_section() 
    {       
        //$section_id=$this->input->post('id');    
        $sub_section_id=$this->input->post('id');  
        //echo $sub_section_id;
        //exit();
        $section_name=$this->input->post('section');
        $sub_section_name=$this->input->post('sub_section_name');

        
        $section_data=array('section_id'=>$section_name,
                            'sub_section_name'=>$sub_section_name);

       
        if(isset($sub_section_id) && !empty($sub_section_id) && ($sub_section_id>0))
        {
            $result = $this->master_model->updateDetails('tbl_subsection','sub_section_id', $sub_section_id, $section_data);
           
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Section Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While Updating Section Details !</div>'
                ));
            }
        }
        else
        {
            $result=$this->master_model->addData('tbl_subsection',$section_data);
           
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Section Details Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While Saving Section Details !</div>'
                ));
            }
        }
    }   

    public function fetch_section()
    {
        $data['sectionData']=$this->master_model->selectDetailsByDESC('tbl_section','section_name');
        //echo $this->db->last_query();
        //exit();
        $this->load->view('admin/master_form/section_table',$data);
    }
        public function fetch_subsection()
    {
        $data['subsectionData']=$this->master_model->selectSubsectionDetails('tbl_subsection','sub_section_name');
        //echo $this->db->last_query();
        //exit();
      
        $this->load->view('admin/master_form/subdepartment_table',$data);
    }
    
    public function edit_section()
    {
        $section_id=$this->input->post('id');
        
        $data['single_section'] = $this->master_model->selectDetailsWhr('tbl_section','section_id',$section_id);
        $data['sectionData']=$this->master_model->selectDetailsByDESC('tbl_section','section_name');
        $this->load->view('admin/master_form/section',$data);
    }
    public function edit_sub_section()
    {
        $sub_section_id=$this->input->post('id');

        $data['sub_section'] = $this->master_model->selectDetailsWhr('tbl_subsection','sub_section_id',$sub_section_id);
        //print_r($data['sub_section']);
        //exit();

         //echo $this->db->last_query();
         //exit();
        $data['sectionData']=$this->master_model->selectDetailsByDESC('tbl_section','section_name');
        
        $this->load->view('admin/master_form/subdepartment',$data);
    }

    public function delete_section()
    {
        $section_id=$this->input->post('id');

        $data=array('display'=>'N');

        $result=$this->master_model->updateDetails('tbl_section','section_id',$section_id,$data);

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove section Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing section Details !</div>'
            ));
        }
    }    
    public function delete_sub_section()
    {
        $sub_section_id=$this->input->post('id');

        $data=array('display'=>'N');

        $result=$this->master_model->updateDetails('tbl_subsection','sub_section_id',$sub_section_id,$data);

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove section Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing section Details !</div>'
            ));
        }
    }   
    
    
    public function question()
    {
        $data['dept_data'] = $this->master_model->fetchDataFromTable('tbl_department_master','dept_master_name');
        $data['location_data'] = $this->master_model->fetchDataFromTable('tbl_station_type', 'station_type_id');
      
        $data['referenceData']=$this->master_model->selectDetailsByDESC('tbl_reference','reference_name');
        $data['questionData']=$this->test_model_r->selectQuestion();
        
        $this->load->view('admin/master_form/question',$data);             
    }
   

   
    public function save_question() 
    {       
        $question_id=$this->input->post('id');    
       
        $question=$this->input->post('question');
        $question_mar=$this->input->post('question_mar');
        $depData=$this->input->post('dept_name');
        //print_r($depData);die;
        $locationData=$this->input->post('location');
        
        $reference=$this->input->post('reference');
        $option=$this->input->post('option');
        $ans_option=$this->input->post('ans_option');
        $option_image=$this->input->post('option_image');
        $test_name=$this->input->post('test_name');

        $optioncount=count($option);
        $imagecount=count($option_image);
       
        
        if(isset($option) && !empty($option) || isset($option_image) && !empty($option_image))
        {   
            $files = $_FILES;
            
            for($i=0;$i<$optioncount;$i++)
            {
                $upload_img_name='option_image_'.($i+1);
               
                if(isset($files[$upload_img_name]['name']))
                {
                    $_FILES['userfile']['name']= $files[$upload_img_name]['name'];
                    $_FILES['userfile']['type']= $files[$upload_img_name]['type'];
                    $_FILES['userfile']['tmp_name']= $files[$upload_img_name]['tmp_name'];
                    $_FILES['userfile']['error']= $files[$upload_img_name]['error'];
                    $_FILES['userfile']['size']= $files[$upload_img_name]['size'];

                    $config = array();
                    $config['upload_path'] = './uploads/test/';
                    $config['fieldname'] = $upload_img_name;
                    $config['allowed_types'] = '*';

                    $config['encrypt_name']= TRUE;
                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload();
                    $data = $this->upload->data();
                   
                    $option_image_logo=$data['file_name'];
                }
                else
                {
                    $hidden_option_image1='hidden_option_image_'.($i+1);
                    $option_image_logo=$this->input->post($hidden_option_image1);
                }            

                $option_data[]=array('question_id'=>'',
                                    'option'=>$option[$i],
                                    'option_image'=>$option_image_logo);
            }
        }

        if(isset($_FILES['question_image']['name']))
        {
            $logo=$_FILES['question_image']['name'];
            $logoImg = array('upload_path' =>'./uploads/test/',
                       'fieldname' => 'question_image',
                       'encrypt_name' => TRUE,             
                       'overwrite' => FALSE);
            $logo_img = $this->imageupload->image_upload($logoImg);
            if(isset($logo_img) && !empty($logo_img))
            {
                $logoData = $this->upload->data();          
                $question_image_logo = $logoData['file_name'];
                
            }
        }
        else
        {
            $question_image_logo=$this->input->post('hidden_question_image');
        }

        $question_data=array('question'=>$question,
                            'question_mar'=>$question_mar,
                            'test_name'=>$test_name,                           
                            'option_id'=>'');

                           //print_r($question_data);die;

        

        if(isset($question_id) && !empty($question_id) && ($question_id>0))
        {
            $option_id=$this->input->post('option_id');

            $que_data = $this->test_model_r->check_que_already_exist_update($question,$question_id);

            if (!empty($que_data)) {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> This Question Is Already Exists!</div>'
                ));
            } else {
                $result = $this->test_model_r->update_question($question_data,$option_data,$option_id,$question_id,$ans_option);
           
                if($result)
                {
                    $this->json->jsonReturn(array(
                        'valid'=>TRUE,
                        'msg'=>'<strong>Well Done!</strong> Question Details Updated Successfully!'
                    ));
                }
                else
                { 
                    $this->json->jsonReturn(array(
                        'valid'=>FALSE,
                        'msg'=>'<strong>Error!</strong> While Updating Question Details !'
                    ));
                }
            }
        }
        else
        {
            $que_data = $this->test_model_r->check_que_already_exist($question);

            if (!empty($que_data)) {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> This Question Is Already Exists!</div>'
                ));
            } else {
                $result=$this->test_model_r->insert_question($question_data,$option_data,$ans_option);
           
                if($result)
                {
                    $this->json->jsonReturn(array(
                        'valid'=>TRUE,
                        'msg'=>'<strong>Well Done!</strong> Question Details Saved Successfully!</div>',
                        'question_id'=>$result
                    ));
                }
                else
                {
                    $this->json->jsonReturn(array(
                        'valid'=>FALSE,
                        'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While Saving Question Details !'
                    ));
                }
            }
        }   
    }


    public function save_import_questions()
    {
        $this->load->library('excel');
        $dept_name = $this->input->post('dept_name');
        $location = $this->input->post('location');
        $reference=$this->input->post('reference'); 
        $test_name=$this->input->post('test_name'); 
        
        $data = array();
        $file_name = "";
        $file_org_name = "";
        if (isset($_FILES['que_imp_file']['name'])) {
            $logo = $_FILES['que_imp_file']['name'];
            $logoImg = array('upload_path' => './uploads/uploads/que_excel/',
                'fieldname' => 'que_imp_file',
                'encrypt_name' => TRUE,
                'overwrite' => FALSE
            );

            $logo_img = $this->imageupload->image_upload($logoImg);
            if (isset($logo_img) && !empty($logo_img)) {
                $logoData = $this->upload->data();
                $file_name = $logoData['file_name'];
                $file_org_name = $logoData['orig_name'];
            }
        }

         
        if (isset($file_name) && !empty($file_name)) {
            $data = $this->excel->read_excel_data('./uploads/uploads/que_excel/' . $file_name);
           
        }
        
        $question_data = [];
        $option_data = [];
        $finalArray = [];
        if (isset($data) && !empty($data)) {
            foreach ($data as $key => $value) {
                $que_name = trim($value[0][1]);
                $qur_mar = trim($value[0][2]);
                $option1 = trim($value[0][3]);
                $option2 = trim($value[0][4]);
                $option3 = trim($value[0][5]);
                $option4 = trim($value[0][6]);
                $explanation = isset($value[0][7]) ? trim($value[0][7]) : '';

                if (!empty($que_name) && isset($qur_mar)) {
                    if (!in_array($que_name, $finalArray)) {
                        $finalArray[$key] = $que_name;
                        $quest_data = $this->test_model_r->check_que_already_exist(trim($que_name));
                        
                        if (empty($quest_data)) {
                            $question_data[] = array('question'=>trim($que_name),
                                'question_mar'=>$qur_mar,
                                'test_name'=>$test_name,                         
                                'option_id'=>'',
                                'explanation' => $explanation 
                            );

                            if (isset($option1) && isset($option2) && isset($option3) && isset($option4)) {
                                $option_data[] = array($option1,$option2,$option3,$option4);
                            }
                        }
                    }
                }
            }
            
            // echo '<pre>';
            // print_r($finalArray);
            // print_r($question_data);
            // print_r($option_data);die;
            if (!empty($question_data) && !empty($option_data)) {
                if ($this->test_model_r->insert_excel_question($question_data,$option_data)) {
                    $this->session->set_flashdata('success', 'Question data imported successfully!');
                    redirect(base_url().'question');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong!');
                    redirect(base_url().'question');
                }
            } else {
                $this->session->set_flashdata('error', 'No new question data to uploads!');
                redirect(base_url().'question');
            }
        }
    }


   

    private function set_upload_options()
    {   
   
        $config = array();
        $config['upload_path'] = './uploads/test/';
        $config['fieldname'] = 'option_image';
        $config['allowed_types'] = '*';
        
        $config['encrypt_name']     = TRUE;

        return $config;
    }   

    public function fetch_question()
    {
       // $data['sectionData']=$this->master_model->selectDetailsByDESC('tbl_section','section_name');
        $data['questionData']=$this->test_model_r->selectQuestion();
        $this->load->view('admin/master_form/question_table',$data);
    }   

    public function edit_question()
    {
        $question_id=$this->input->post('id');
        $data['location_data'] = $this->master_model->fetchDataFromTable('tbl_station_type', 'station_type_id');
        $data['dept_data'] = $this->master_model->fetchDataFromTable('tbl_department_master','dept_master_name');
       
        $data['referenceData']=$this->master_model->selectDetailsByDESC('tbl_reference','reference_name');
        $data['questionData']=$this->test_model_r->selectQuestion();
 
       
        $data['optionData'] = $this->master_model->selectAllWhr('tbl_option','question_id',$question_id);
        $data['single_question'] = $this->master_model->selectDetailsWhr('tbl_question','question_id',$question_id);
    
        $this->load->view('admin/master_form/question',$data);
    }

    public function delete_question()
    {
        $question_id=$this->input->post('id');

        $data=array('display'=>'N');

        $result=$this->master_model->updateDetails('tbl_question','question_id',$question_id,$data);

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Question Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Question Details !</div>'
            ));
        }
    }

    public function delete_option()
    {
        $option_id=$this->input->post('id');

        $data=array('display'=>'N');

        $result=$this->master_model->updateDetails('tbl_option','option_id',$option_id,$data);

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Option Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Option Details !</div>'
            ));
        }
    }

    public function reference_master_modal()
    {
        $view=$this->load->view('admin/master_form/reference','',TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view ));
    }

    public function reference()
    {
        $data['referenceData']=$this->master_model->selectDetailsByDESC('tbl_reference','reference_id');

        $this->load->view('admin/master_form/reference_master',$data);            
    }

    public function negative_master()
    {
        $data['negativeData']=$this->master_model->selectDetailsByDESC('tbl_negative_master','negative_id');

        $this->load->view('admin/master_form/negative_mark_master',$data);            
    }



    function save_negative_master_form()
	{
		
		$negative_id = $this->input->post('negative_id');
		$question_name = $this->input->post('question_name');
		$per_mark = $this->input->post('per_mark');
		
		$data = array('question_name'=>$question_name,'per_mark'=>$per_mark);

		
		if(isset($negative_id) && !empty($negative_id))
		{
			$result = $this->master_model->updateDetails('tbl_negative_master','negative_id',$negative_id,$data);
			
			if($result)
			{
				$this->json->jsonReturn(array('valid'=>TRUE,'msg'=>'<div class="boot-success">Negative Marking Updated successfully.</div>'));
			}
			else
			{
				$this->json->jsonReturn(array('valid'=>TRUE,'msg'=>'<div class="boot-success"> error while Negative Marking Updating.</div>'));
			}
		}
		else
		{
			$result = $this->master_model->addData('tbl_negative_master',$data);
			if($result)
			{
				$this->json->jsonReturn(array('valid'=>TRUE,'msg'=>'<div class="boot-success">Negative Marking Inserted successfully.</div>'));
			}
			else
			{
				$this->json->jsonReturn(array('valid'=>TRUE,'msg'=>'<div class="boot-success"> error while Negative Marking Inserted.</div>'));
			}
		}
		
	}

    public function save_reference() 
    {       
        $reference_id=$this->input->post('id');    
        $reference_name=$this->input->post('reference_name');
        $reference_desc=$this->input->post('reference_desc'); 
        if(isset($_FILES['reference_image']['name']))
        {
         $logo=$_FILES['reference_image']['name'];
         $logoImg = array('upload_path' =>'./uploads/test/','fieldname' => 'reference_image',
                    'encrypt_name' => TRUE,             
                       'overwrite' => FALSE);
            $logo_img = $this->imageupload->image_upload($logoImg);
            if(isset($logo_img) && !empty($logo_img))
            {
                $logoData = $this->upload->data();          
                $reference_image_logo = $logoData['file_name'];
               
            }
        }
        else
        {
         $reference_image_logo=$this->input->post('hidden_reference_image');
        }

        $reference_data=array('reference_name'=>$reference_name,
                            'reference_desc'=>$reference_desc,
                            'reference_image'=>$reference_image_logo);        

        if(isset($reference_id) && !empty($reference_id) && ($reference_id>0))
        {
            $result = $this->master_model->updateDetails('tbl_reference','reference_id', $reference_id, $reference_data);
           
            if($result)
            
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Reference Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While Updating Reference Details !</div>'
                ));
            }
        }
        else
        {
            $result=$this->master_model->addData('tbl_reference',$reference_data);
           
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Reference Details Saved Successfully!</div>'
                ));
            }
            else
            {
            $this->json->jsonReturn(array('valid'=>FALSE,
             'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While Saving Reference Details !</div>'
                ));
            }
        }  
    }

    public function fetch_reference()
    {
        $data['referenceData']=$this->master_model->selectDetailsByDESC('tbl_reference','reference_id');
        $this->load->view('admin/master_form/reference_table',$data);
    }


    public function fetch_negative()
    {
        $data['negativeData']=$this->master_model->selectDetailsByDESC('tbl_negative_master','negative_id');
        $this->load->view('admin/master_form/negative_table',$data);
    }

    public function edit_reference()
    {
        $reference_id=$this->input->post('id');
       
        $data['referenceData']=$this->master_model->selectDetailsByDESC('tbl_reference','reference_name');
        $data['single_reference'] = $this->master_model->selectDetailsWhr('tbl_reference','reference_id',$reference_id);
        $this->load->view('admin/master_form/reference_master',$data);
    }

    public function delete_reference()
    {
        $reference_id=$this->input->post('id');

        $data=array('display'=>'N');

        $result=$this->master_model->updateDetails('tbl_reference','reference_id',$reference_id,$data);

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Reference Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Reference Details !</div>'
            ));
        }
    }


    public function delete_negative_master()
    {
        $negative_id=$this->input->post('id');

        $data=array('display'=>'N');

        $result=$this->master_model->updateDetails('tbl_negative_master','negative_id',$negative_id,$data);

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Negative Marking Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Negative Marking Details !</div>'
            ));
        }
    }


    public function edit_negative()
    {
        $negative_id=$this->input->post('id');
       
        $data['negativeData']=$this->master_model->selectDetailsByDESC('tbl_negative_master','question_name');
        $data['single_reference'] = $this->master_model->selectDetailsWhr('tbl_negative_master','negative_id',$negative_id);
        $this->load->view('admin/master_form/negative_mark_master',$data);
    }    
    
}