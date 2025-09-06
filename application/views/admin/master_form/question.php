<!DOCTYPE html>
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Online Test | Question</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
            type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css"
            rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
            rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
            type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
            type="text/css">
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME STYLES -->

        <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
        <link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components"
            rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css"
            href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css" />
        <link rel="stylesheet" type="text/css"
            href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css" />
        <link rel="stylesheet" type="text/css"
            href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css" />
        <link rel="stylesheet" type="text/css"
            href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css" />
        <link rel="stylesheet" type="text/css"
            href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/css/components.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/css/plugins.css">
        <link href="<?php echo base_url(); ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet"
            type="text/css" id="style_color">
        <link href="<?php echo base_url(); ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"
            rel="stylesheet" type="text/css" />
        <!-- END THEME STYLES -->

        <link rel="shortcut icon" href="favicon.ico">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
        /* Modal Styles */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            /* Black background with transparency */
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
        }

        .close {
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        /*input[type="file"] {
			display: block;
			margin-bottom: 5px;
		}*/

        .warning {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        button {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-submit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-cancel {
            background-color: #f44336;
            color: white;
        }

        .modal-header h3 {
            color: black !important;
        }

        label {
            color: black !important;
        }

        .fileinput-filename {
            color: black !important;
        }
        </style>
    </head>


    <body>
        <?php $this->load->view('admin/header'); ?>
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <div class="page-container">

            <div class="page-content page_div">
                <div class="container">

                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="#">Home</a><i class="fa fa-circle"></i>
                        </li>

                        <li class="active">
                            Question Form
                        </li>
                    </ul>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Question Form
                                    </div>
                                    <div class="actions">
                                        <a class="btn yellow btn-sm"
                                            href="<?php echo base_url('uploads/que_excel/question_temp.xlsx'); ?>"
                                            download>
                                            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                            Download Question Form Template
                                        </a>
                                        <button class="btn green add_exchange_rate" data-type="bond" rev="Question Form"
                                            data-url="exchange_rate_import" onclick="openImportModal()">
                                            <i class="fa fa-upload"></i> Question Form
                                        </button>

                                        <button class="btn green add_exchange_rate" data-type="bond" rev="Question Form"
                                            data-url="exchange_rate_import" onclick="openAIModal()">
                                            <i class="fa fa-upload"></i> Generate Questions by AI
                                        </button>


                                    </div>
                                    <div id="importModal" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Question Upload Excel</h3>
                                                <span class="close" onclick="closeModal()">&times;</span>
                                            </div>
                                            <form id="importForm" method="POST" enctype="multipart/form-data"
                                                action="save_import_questions">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    Test Name<span class="required"
                                                                        aria-required="true">*</span>
                                                                </label>
                                                                <input type="text" class="form-control" name="test_name"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="fileinput fileinput-new form-group" data-provides="fileinput">
                                                        <label for="exampleInputFile" class="control-label ">
                                                            Attach File <span class="required" aria-required="true">*</span>
                                                        </label>
                                                        <div class="">
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new">
                                                                    Select file</span>
                                                                <span class="fileinput-exists">
                                                                    Change</span>
                                                                <input type="file" name="que_imp_file" id="que_imp_file"
                                                                    accept=".xls,.xlsx" required />
                                                            </span>
                                                            <span class="fileinput-filename">
                                                            </span>
                                                            &nbsp;
                                                            <a href="javascript:void(0);" class="close fileinput-exists"
                                                                data-dismiss="fileinput">
                                                            </a>
                                                            <div id="que_imp_file_error"></div>
                                                        </div>
                                                    </div>
                                                    <p class="warning">
                                                        (Please upload file in .xlsx & .xls format only)
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="button-group">
                                            <button type="submit" class="btn-submit btn-sm">Submit</button>
                                            <button type="button" class="btn-cancel btn-sm" onclick="closeModal()">Cancel</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>

                                    <div id="AIModal" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Generate Questions By AI</h3>
                                                <span class="close" onclick="closeAIModal()">&times;</span>
                                            </div>
                                            <form id="AIForm" method="POST" enctype="multipart/form-data"
                                                action="save_ai_questions">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    Test Name<span class="required"
                                                                        aria-required="true">*</span>
                                                                </label>
                                                                <input type="text" class="form-control" name="test_name"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    Topic <span class="required" aria-required="true">*</span>
                                                                </label>
                                                                <input type="text" class="form-control" name="topic" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    Difficulty Level <span class="required" aria-required="true">*</span>
                                                                </label>
                                                                <select class="form-control" name="difficulty" required>
                                                                    <option value="">-- Select --</option>
                                                                    <option value="Easy">Easy</option>
                                                                    <option value="Medium">Medium</option>
                                                                    <option value="Hard">Hard</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                   
                                                </div>

                                                <div class="button-group">
                                                    <button type="submit" class="btn-submit btn-sm">Submit</button>
                                                    <button type="button" class="btn-cancel btn-sm" onclick="closeAIModal()">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                </div>
                <div class="portlet-body form">

                    <form action="save_question" data-tbdiv="#questionDetailsDiv" data-tburl="fetch_question"
                        id="question_form" class="horizontal-form" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Test Name<span class="required" aria-required="true">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="test_name"
                                            value="<?php echo (isset($single_question->test_name) && !empty($single_question->test_name)) ? $single_question->test_name : ''; ?>"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <?php /*<div class="row">
											<div class="col-md-4">

												<div class="form-group">
													<label class="control-label">
														Department Name

													</label>

													<div class="input-icon ">
														<select class="form-control select2me employee_report"
															id="dept_name" name="dept_name">
															<option value="0">All</option>
															<?php if (isset($dept_data) && !empty($dept_data)) {
																foreach ($dept_data as $key) { ?>
                            <option value="<?php echo $key->dept_master_id; ?>"
                                <?php echo (isset($single_question->dept_master_id) && !empty($single_question->dept_master_id) && ($single_question->dept_master_id==$key->dept_master_id))?'selected="selected"':''; ?>>
                                <?php echo $key->dept_master_name; ?>
                            </option>
                            <?php }
															} ?>
                            </select>
                        </div>
                        <!-- </div> -->
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">
                        Location
                    </label>

                    <div class="input-icon ">
                        <select class="form-control select2me employee_report" id="location" name="location">
                            <option value="0">All</option>
                            <?php if (isset($location_data) && !empty($location_data)) {
																foreach ($location_data as $key) { ?>
                            <option value="<?php echo $key->station_type_id; ?>"
                                <?php echo (isset($single_question->station_type_id) && !empty($single_question->station_type_id) && ($single_question->station_type_id==$key->station_type_id))?'selected="selected"':''; ?>>
                                <?php echo $key->station_type_name; ?>
                            </option>
                            <?php }
															} ?>
                        </select>
                    </div>
                    <!-- </div> -->
                </div>
            </div>


            <!-- <div class="col-md-3">
												<div class="form-group">
													<label class="control-label"> Reference <span
															class="required"
															aria-required="true">*</span></label>
													<select class="form-control select2me" tabindex="1"
														id="reference" name="reference">
														<option value="">Select</option>
														<?php foreach ($referenceData as $key) { ?>
															<option value="<?php echo $key->reference_id; ?>" <?php echo (isset($single_question->reference_id) && !empty($single_question->reference_id) && ($single_question->reference_id == $key->reference_id)) ? 'selected="selected"' : ''; ?>>
																<?php echo $key->reference_name; ?>
															</option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-md-1">
												<div>
													<label class="control-label"> &nbsp; </label>
												</div>
												<span style="cursor: pointer;" class="tooltips model_form"
													id="reference" rev="select_reference"
													rel="reference_master_modal" data-title="Reference Master"
													data-original-title="Edit" data-placement="top">
													<i style="color:red;" class="fa fa-edit"></i>
												</span>
											</div> -->
        </div>*/?>
        <div class="row">
            <div class="col-md-12 ">
                <div class="form-group ">
                    <label class="control-label"> Question<span class="required" aria-required="true">*</span></label>
                    <div>
                        <textarea class=" form-control" name="question" rows="6" data-error-container="#editor2_error"
                            required><?php echo (isset($single_question->question) && !empty($single_question->question)) ? $single_question->question : ''; ?></textarea>

                        <div id="editor2_error">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h3 class="form-section">Option Details</h3>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:center;" width="50%">
                                Option
                            </th>
                            <th style="text-align:center;" width="10%">
                                Answer
                            </th>

                            <th style="text-align:center;" width="10%">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="appendDynaRow">

                        <?php if (isset($optionData) && !empty($optionData)) {
															$i = 0;
															foreach ($optionData as $key) { $i++; ?>
                        <input type="hidden" value="<?php echo $i; ?>" name="list_count">
                        <tr>
                            <td>
                                <input type="hidden" value="<?php echo $key->option_id; ?>" name="option_id[]">
                                <input type="text" class="form-control" placeholder="Add Option" name="option[]"
                                    tabindex=""
                                    value="<?php echo (isset($key->option) && !empty($key->option)) ? htmlentities($key->option) : ''; ?>">
                            </td>
                            <td style="text-align:center;">
                                <div class="form-group">
                                    <div class="radio-list">
                                        <label><input type="radio" name="ans_option" value="<?php echo $i; ?>"
                                                <?php echo ($single_question->option_id == $key->option_id) ? 'checked="checked"' : ''; ?>></label>
                                    </div>
                                </div>
                            </td>

                            <td style="text-align: center; vertical-align: middle;" width="10%">
                                <div class="addDeleteButton">
                                    <span class="tooltips addDynaRow" data-placement="top" data-original-title="Add"
                                        style="cursor: pointer;">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="tooltips deleteRow" style="cursor: pointer;"
                                        data-original-title="Remove" rev="delete_option"
                                        rel="<?php echo (isset($key->option_id) && !empty($key->option_id)) ? $key->option_id : ''; ?>"
                                        data-placement="top">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <?php }
														} else { ?>
                        <tr>
                            <td style="text-align:center;">
                                <input type="text" class="form-control" placeholder="Add Option" name="option[]"
                                    tabindex="">
                            </td>
                            <td style="text-align:center;">
                                <div class="form-group">
                                    <div class="radio-list">
                                        <label><input type="radio" name="ans_option" value="1"
                                                checked="checked"></label>
                                    </div>
                                </div>
                            </td>

                            <td style="text-align: center; vertical-align: middle;" width="10%">
                                <div class="addDeleteButton">
                                    <span class="tooltips addDynaRowQue" data-placement="top" data-original-title="Add"
                                        style="cursor: pointer;">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="tooltips deleteParticularRow" style="cursor: pointer;"
                                        data-original-title="Remove" data-placement="top">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <div class="form-actions">
            <center>
                <button type="submit" class="btn green question_common_save"
                    rel="<?php echo (isset($single_question->question_id) && !empty($single_question->question_id)) ? $single_question->question_id : '' ?>">
                    <?php if (isset($single_question->question_id) && !empty($single_question->question_id)) {
													echo 'Update';
												} else {
													echo 'Submit';
												} ?>
                </button>
                <button type="button" class="btn red clearData">Clear</button>
            </center>
        </div>
        </form>
        <!-- END FORM-->
        </div>
        </div>
        </div>
        </div>

        <!-- END PAGE CONTENT INNER -->
        <div id="questionDetailsDiv">
            <?php $this->load->view('admin/master_form/question_table'); ?>
        </div>
        </div>
        </div>
        <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- END PAGE CONTAINER -->
        <?php $this->load->view('admin/footer'); ?>
        <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript">
        </script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"
            type="text/javascript"></script>
        <script
            src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript">
        </script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript">
        </script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/global/plugins/select2/select2.min.js">
        </script>
        <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js">
        </script>
        <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js">
        </script>
        <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js">
        </script>
        <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js">
        </script>

        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/ckeditor/ckeditor.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/ckeditor/adapters/jquery.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/plugins.js" type="text/javascript"></script>
        <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script>

        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>js/common.js"></script>

        <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
            //PluginPickers.init();
            TableAdvanced.init();
            Demo.init(); // init demo(theme settings page)
        });
        </script>
        <!-- <script>
		var s = document.createElement('script');
		s.setAttribute('src', './js/lang.js?lang=Marathi&key=421aa90e079fa326b6494f812ad13e79');
		s.setAttribute('id', 'qpd_script');
		document.head.appendChild(s);
	</script> -->


        <script>
        function openImportModal() {
            const modal = document.getElementById('importModal');
            modal.style.display = 'block';
        }

        function closeModal() {
            const modal = document.getElementById('importModal');
            modal.style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('importModal');
            if (event.target === modal) {
                closeModal();
            }
        }

        function openAIModal() {
            const modal = document.getElementById('AIModal');
            modal.style.display = 'block';
        }

        function closeAIModal() {
            const modal = document.getElementById('AIModal');
            modal.style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('AIModal');
            if (event.target === modal) {
                closeAIModal();
            }
        }
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->

</html>