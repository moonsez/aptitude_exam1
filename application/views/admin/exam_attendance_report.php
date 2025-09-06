<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8">
    <title>Online Test | Exam Result Record</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
        rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
    <link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components"
        rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css"
        id="style_color">
    <link href="<?php echo base_url(); ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/css/plugins.css">
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico">
</head>
<style>
    a {
        display: none;
    }
</style>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->

<body>
    <?php $this->load->view('admin/header'); ?>
    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-container">
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page_div">
            <div class="container">
                <!-- BEGIN PAGE BREADCRUMB -->
                <!-- <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="#">Home</a><i class="fa fa-circle"></i>
                    </li>
<li>
                    <a href="passport_form.html">Passport Form</a>
                    <i class="fa fa-circle"></i>
                </li> -->
                    <!-- <li class="active">
                        Exam Attendance Report
                    </li> 
                </ul> -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            
                            <div class="input-icon ">
                            <label class="control-label">
                                Select Test<span class="required" aria-required="true"></span>
                            </label>
                                <select class="form-control select2me " id="test_name" name="test_name" required
                                    style="width: 30%; border: none !important; border-radius: 0% !important;"
                                    onchange="filterExam()">
                                    <option value="">Select Test</option>
                                    <?php if (!empty($exam_list)) {
                                        foreach ($exam_list as $key) { ?>
                                            <option value="<?php echo $key->test_configuration_id; ?>"
                                                <?= (!empty($selected_test_id) && $selected_test_id == $key->test_configuration_id) ? 'selected' : ''; ?>>
                                                <?php echo $key->test_name; ?>
                                            </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form">
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-list"></i> Exam Not-attended Report
                                    </div>
                                </div>
                                <div class="actions">
                                    <button id="generate_excel" onclick="exportToExcel()" class="btn red btn-danger" style="margin-top: -38px; margin-left: 88%; float: left;">
                                        Export To Excel
                                    </button>
                                </div>

                                <div class="portlet-body">
                                    <?php if (!empty($report_data)) { ?>
                                        <table class="table table-striped table-bordered table-hover masterTable"
                                            id="attendance_result">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">Sr. No.</th>
                                                    <th style="text-align:center;">Employee Name</th>
                                                    <th style="text-align:center;">Test Name</th>
                                                    <th style="text-align:center;">Department</th>
                                                    <th style="text-align:center;">Location</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($report_data as $key) { ?>

                                                    <tr class="odd gradeX">
                                                        <td style="text-align:center;"><?php echo $i++; ?></td>
                                                        <td><?php echo !empty($key->Employee_Name) ? $key->Employee_Name : '-'; ?>
                                                        </td>
                                                        <td><?php echo !empty($key->test_name) ? $key->test_name : '-'; ?></td>
                                                        <td><?php echo !empty($key->dept_master_name) ? $key->dept_master_name : '-'; ?>
                                                        </td>
                                                        <td><?php echo !empty($key->station_type_name) ? $key->station_type_name : '-'; ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    <?php } else { ?>
                                        <center>
                                            <h4>No Records Found</h4>
                                        </center>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END PAGE CONTENT -->
            </div>
            <div id="employee-modal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%);
             background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px #333;">
                <h3>Employees with Correct Answers</h3>
                <ul id="employee-list"></ul>
                <button onclick="closeEmployeeModal()">Close</button>
            </div>
            <div id="loader"
                style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px); z-index: 9998;">
                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
                    <img src="<?php echo base_url(); ?>assets/global/img/loader_1.gif" />

                </div>
            </div>
            <?php $this->load->view('admin/footer'); ?>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js"
                type="text/javascript"></script>
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
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js"
                type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js"
                type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js"
                type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js"
                type="text/javascript"></script>
            <script type="text/javascript"
                src="<?php echo base_url() ?>assets/global/plugins/select2/select2.min.js"></script>
            <script type="text/javascript"
                src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript"
                src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
            <script type="text/javascript"
                src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
            <script type="text/javascript"
                src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
            <script type="text/javascript"
                src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script type="text/javascript"
                src="<?php echo base_url(); ?>assets/global/plugins/ckeditor/ckeditor.js"></script>
            <script type="text/javascript"
                src="<?php echo base_url(); ?>assets/global/plugins/ckeditor/adapters/jquery.js"></script>
            <script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/layout.js"
                type="text/javascript"></script>
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
            <script type="text/javascript"
                src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script>

            <!-- END PAGE LEVEL SCRIPTS -->
            <script src="<?php echo base_url(); ?>js/common.js"></script>
            <script src="<?php echo base_url(); ?>js/custom_g.js"></script>
            <script src="<?php echo base_url(); ?>/js/jquery.table2excel.min.js"></script>


            <!-- END JAVASCRIPTS -->
</body>
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        //PluginPickers.init();
        TableAdvanced.init();
        Demo.init(); // init demo(theme settings page)
    });
</script>
<script>
    function filterExam() {
        var test_id = document.getElementById("test_name").value;
        if (test_id) {
            document.getElementById("loader").style.display = "block"; // Optional loader
            var baseUrl = "<?php echo base_url('percent_result/exam_attendance_report'); ?>";
            window.location.href = baseUrl + "/" + test_id;
        }
    }

</script>
<script>
    function exportToExcel() {
        var selected_test_id = <?php echo $selected_test_id; ?>;
        window.location.href = "<?php echo base_url('export_attendance_report'); ?>/" + selected_test_id;
        
       
    }
</script>

</html>