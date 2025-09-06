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
    <style type="text/css">
        .custom-modal .modal-dialog {
            width: 90%;
        }
    </style>
</head>
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
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="#">Home</a><i class="fa fa-circle"></i>
                    </li>
                    <!-- <li>
                    <a href="passport_form.html">Passport Form</a>
                    <i class="fa fa-circle"></i>
                </li> -->
                    <li class="active">
                        Employee Record Form
                    </li>
                </ul>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="row form">
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Employee Result List
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <?php if (isset($studentRecord) && !empty($studentRecord)) { ?>
                                        <table class="table table-striped table-bordered table-hover masterTable">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">
                                                        Sr. No.
                                                    </th>
                                                    <th style="text-align:center;">
                                                        Date
                                                    </th>
                                                    <th style="text-align:center;">
                                                        Test Name
                                                    </th>
                                                    <!-- <th style="text-align:center;">
                                                Result
                                            </th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($studentRecord as $key) { ?>
                                                    <tr class="odd gradeX">
                                                        <td style="text-align:center;">
                                                            <?php echo $i++; ?>
                                                        </td>
                                                        <td style="text-align:center;">
                                                            <?php echo (isset($key->test_datetime) && !empty($key->test_datetime)) ? $key->test_datetime : ''; ?>
                                                        </td>
                                                        <td style="text-align:center;">
                                                            <a href="javascript:;" class="btn btn-sm blue view_result1 tooltips"
                                                                data-original-title="View Test Result" data-placement="top"
                                                                rev="view_result_modal"
                                                                rel="<?php echo (isset($key->test_configuration_id) && !empty($key->test_configuration_id)) ? $key->test_configuration_id : ''; ?>"
                                                                data-title="<?php echo (isset($key->test_name) && !empty($key->test_name)) ? $key->test_name : ''; ?>">
                                                                <?php echo (isset($key->test_name) && !empty($key->test_name)) ? $key->test_name : ''; ?>
                                                            </a>
                                                        </td>
                                                        <?php /*<td style="text-align:center;">									
                                                          <span style="cursor: pointer;" class="tooltips" data-original-title="View Result" data-placement="top">
                                                              <a  href= "<?php echo base_url();?>view_result/<?php echo (isset($key->user_test_id) && !empty($key->user_test_id))?$key->user_test_id:'';?>";>
                                                                  <i class="fa fa-search-plus"></i>
                                                              </a>
                                                          </span>	
                                                          <span style="cursor: pointer;" class="tooltips" data-original-title="Download Certificate" data-placement="top">
                                                              <a  href= "<?php echo base_url();?>download_certificate/<?php echo (isset($key->user_test_id) && !empty($key->user_test_id))?$key->user_test_id:'';?>";>
                                                                  <i class="fa fa-download"></i>
                                                              </a>
                                                          </span>
                                                      </td>*/ ?>
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
                <div id="fullPageLoader"
                    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.8); z-index:9999; text-align:center;">
                    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
                        <i class="fa fa-spinner fa-spin fa-3x text-primary"></i><br>
                        <span style="font-size:18px;">Loading...</span>
                    </div>
                </div>

            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- END PAGE CONTAINER -->
    <?php $this->load->view('admin/footer'); ?>

    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
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
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>

    <script src="<?php echo base_url(); ?>/js/jquery.table2excel.min.js"></script>

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
    <script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
        type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"
        type="text/javascript"></script>
    <script type="text/javascript"
        src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url(); ?>js/common.js"></script>


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

        $(document).on('click', '.view_result1', function () {
            var id = $(this).attr('rel');
            var title = $(this).data('title');
            var type = $(this).data('type');
            var tit = '<strong>' + title + ' Exam Results' + '</strong>';

            $('#fullPageLoader').fadeIn();

            var ajaxUrl = type ? "view_report_modal" : "view_result_modal";
            if (type) {
                $.ajax({
                    url: completeURL(ajaxUrl),
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function (data) {
                        loadingDialog.modal('hide');
                        var dialog = bootbox.dialog({
                            message: data.view,
                            title: tit,
                            size: "large",
                            buttons:
                            {
                                danger: {
                                    label: "Cancel",
                                    className: "btn-danger",
                                    callback: function () {
                                        // Example.show("uh oh, look out!");
                                    }
                                }
                            }
                        });
                    },
                    complete: function () {
                        $('#fullPageLoader').fadeOut();
                        $('.dataTable').each(function () {
                            $(this).dataTable().fnDestroy();
                        });

                        if ($(".masterTable").length > 0) {
                            $('.masterTable').dataTable({
                                "order": [
                                    [0, 'asc']
                                ],

                                "lengthMenu": [
                                    [10, 15, 20, 100, 500, 1000, -1],
                                    [10, 15, 20, 100, 500, 1000, "All"] // change per page values here
                                ],
                                // set the initial value
                                "pageLength": 10,
                            });

                            var tableWrapper = $('.dataTables_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

                            tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
                        }

                        $('select').select2();
                    }
                });
            } else {

                // $.ajax({
                //     url:completeURL("view_result_modal"),
                //     type:'POST',
                //     data:{id:id},
                //     dataType:'json',
                //     success: function(data)
                //     {
                //         var dialog = bootbox.dialog({
                //             message: data.view,
                //             title: tit,
                //             size: "large",
                //             buttons:
                //             {
                //                 danger: {
                //                     label: "Cancel",
                //                     className: "btn-danger",
                //                     callback: function() {
                //                         // Example.show("uh oh, look out!");
                //                     }
                //                 }
                //             }
                //         });
                //     },
                //     complete:function()
                //     {
                //         $('.dataTable').each(function () {
                //             $(this).dataTable().fnDestroy();
                //         });

                //         if($(".masterTable").length > 0)
                //         {
                //             $('.masterTable').dataTable({
                //                 "order": [
                //                     [0, 'asc']
                //                 ],

                //                 "lengthMenu": [
                //                     [10, 15, 20,100,500,1000, -1],
                //                     [10, 15, 20,100,500,1000, "All"] // change per page values here
                //                 ],
                //                 // set the initial value
                //                 "pageLength": 10,
                //             });

                //             var tableWrapper = $('.dataTables_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

                //             tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
                //         }

                //         $('select').select2();
                //     }
                // });

                $.ajax({
                    url: completeURL("view_result_modal"),
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function (data) {
                        if (data && data.redirect_url) {
                            window.location.href = completeURL(data.redirect_url);
                        } else {
                            alert("Redirect link not found!");
                        }
                    }
                });

            }
        });
    </script>




    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>