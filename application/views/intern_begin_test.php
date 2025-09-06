<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-
"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Online Test | Instruction </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
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
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
        rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css" />
    <link id="style_color" href="<?php echo base_url(); ?>assets/admin/layout4/css/themes/light.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <style>
        /* Disable scrolling */
        body {
            overflow: hidden;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        #startButton {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ccc;
            border: none;
            cursor: not-allowed;
        }

        #startButton.enabled {
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }




        @media (max-width: 768px) {

            /* Make the timing info stack vertically on small screens */
            .portlet-title p {
                display: flex;
                flex-direction: column;
                align-items: center;
                font-size: 13px;
                margin: 15px 0;
            }

            /* Ensure the end time appears below start time */
            #exam-end-time {
                margin-top: 10px !important;
                margin-left: 0 !important;
                display: block;
                text-align: center;
            }

            .portlet-title p {
                font-size: 13px;
                margin: 10px 0;
                text-align: center;
                display: block;
            }

            /* Center and reposition Start Exam button */
            .actions {
                display: flex;
                justify-content: center;
                margin-top: -18px !important;
                margin-left: 66px;
                width: 75%;
            }

            #startButton {
                margin: 0 !important;
                width: 80%;
                max-width: 300px;
                font-size: 14px;
                padding: 10px 20px !important;
            }

            .portlet-title {
                height: auto !important;
                display: flex;
                flex-direction: column;
                gap: 10px;
            }


            .caption {
                margin-bottom: 10px;
                text-align: center;
            }

            .portlet {
                height: auto !important;
                margin: 0 auto;
            }
        }
    </style>
</head>


<body class="page-header-fixed  page-sidebar-closed">
    <?php $this->load->view('header'); ?>
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="portlet light" style="height: 570px;">
                        <div class="portlet-title" style="height: 20px;">
                            <div class="caption" style="margin-bottom: 10px;">
                                <span class="caption-subject font-green-sharp bold uppercase">Aptitude Test</span>
                            </div>
                            <p style="font-size:11pt; margin-top: 10px;" class="mob">
                                <span style="margin-left: 15px;">Exam starts on :</span>
                                <span>
                                    <?php
                                    $examStartTime = (isset($test_data->test_datetime) && !empty($test_data->test_datetime)) ? date('d-m-Y H:i', strtotime($test_data->test_datetime)) : '00:00:00';
                                    echo '<strong>' . $examStartTime . '</strong>';
                                    $examTimeInMinutes = (isset($test_data->test_time) && !empty($test_data->test_time)) ? $test_data->test_time : '';
                                    ?>
                                </span>



                                <span id="exam-end-time" style="margin-left: 368px;"></span>
                            </p>

                            <div class="actions">
                                <a type="button" class="btn blue " id="startButton"
                                    href="<?php echo base_url(); ?>intern_attempt_test/<?php echo (!empty($test_data->test_configuration_id)) ? $test_data->test_configuration_id : '' ?>"
                                    rel="<?php echo (!empty($test_data->test_configuration_id)) ? $test_data->test_configuration_id : ''; ?>"
                                    style="margin-left: 450px; font-weight: bold; height: 35px; padding: 4px 20px !important; margin-top: -74px;"
                                    disabled>
                                    Start Exam
                                </a>
                            </div>
                        </div>
                        <?php if (!empty($examEndTime) && !empty($currentTimeFormatted) && $currentTimeFormatted >= $examEndTime) {
                            echo '<p>The exam has ended. Currently no active exam available.</p><br> <p>Please try after sometime for next exam.</p>';
                        } else { ?>
                            <div class="portlet-body" style="height:500px;">
                                <div class="row" id="exam">
                                    <div class="col-md-12" style="margin-top: -40px;">
                                        <h4><b><u>Instructions:</u></b></h4>

                                        <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">1. Total number of
                                            questions :
                                            <?php echo (isset($test_data->question_count) && !empty($test_data->question_count)) ? $test_data->question_count : '0'; ?>.
                                        </p>
                                        <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">2. Total number of marks :
                                            <?php echo (isset($test_data->total_mark) && !empty($test_data->total_mark)) ? $test_data->total_mark : '0'; ?>.
                                        </p>
                                        <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">3. Time alloted :
                                            <?php echo (isset($test_data->test_time) && !empty($test_data->test_time)) ? $test_data->test_time : '0'; ?>
                                            minutes.
                                        </p>
                                        <?php
                                        $single_que_mark = 0;
                                        if (isset($test_data->total_mark) && !empty($test_data->total_mark) && isset($test_data->question_count) && !empty($test_data->question_count)) {
                                            $single_que_mark = $test_data->total_mark / $test_data->question_count;
                                        }
                                        ?>
                                        <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">4. Each question carry
                                            <?php echo (!empty($single_que_mark)) ? $single_que_mark : '0'; ?> marks.
                                        </p>

                                        <?php if (isset($test_data->negative_marking) && !empty($test_data->negative_marking)) { ?>
                                            <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">5. Each question wrong
                                                answer deduct
                                                <?php echo (isset($test_data->per_mark) && !empty($test_data->per_mark)) ? $test_data->per_mark : '' ?>
                                                negative marks.
                                            </p>
                                            <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">6. DO NOT refresh the
                                                page.</p>
                                        <?php } else { ?>
                                            <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">5. DO NOT refresh the
                                                page.</p>
                                        <?php } ?>

                                        <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;"><u><b>Note That:</b></u>
                                        </p>
                                        <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">If you switch windows
                                            three times, the exam will be submitted automatically.</p>
                                        <p style="font-size:11pt; margin: 5px 0; padding: 5px 0;">After submitting your
                                            exam, wait a few minutes for it to be submitted automatically.</p>

                                        <!-- Question Marked for Review -->
                                        <div style="margin-bottom: 10px;">
                                            <div style="display: flex; align-items: center;">
                                                <p style="margin: 0;">Question marked for review</p>
                                                <div
                                                    style="width: 15px; height: 15px;  display: inline-block; text-align: center; line-height: 30px; font-size: 18px; font-weight: bold; color: #fff; background-color: #3e85c3; margin-right: 10px; position: relative; margin-left:10px;">
                                                    <span style="position: relative; top: -1px;"></span>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Question Answered -->
                                        <div style="margin-bottom: 10px;">
                                            <div style="display: flex; align-items: center;">
                                                <p style="margin: 0;">Question answered</p>
                                                <div
                                                    style="width: 15px; height: 15px;  display: inline-block; text-align: center; line-height: 30px; font-size: 18px; font-weight: bold; color: #fff; background-color: green; margin-right: 10px; position: relative; margin-left:10px;">
                                                    <span style="position: relative; top: -1px;"></span>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Cleared / Not Attempted -->
                                        <div>
                                            <div style="display: flex; align-items: center;">
                                                <p style="margin: 0;">Cleared / Not attempted</p>
                                                <div
                                                    style="width: 15px; height: 15px;  display: inline-block; text-align: center; line-height: 30px; font-size: 18px; font-weight: bold; color: #333; background-color: #fff; border: 2px solid #ccc; margin-right: 10px; position: relative; margin-left:10px;">
                                                    <span style="position: relative; top: -1px;"></span>
                                                </div>

                                            </div>
                                        </div>

                                        <p style="font-size:18px; margin: 5px 0; padding: 5px 0; text-align:center;">All the
                                            best👍</p>
                                    </div>

                                </div>
                            </div>
                            <!-- <div class="portlet-footer" id="examBtn">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a type="button" class="btn blue " id="startButton"
                                                href="<?php //echo base_url(); ?>attempt_test/<?php //echo(!empty($test_data->test_configuration_id))?$test_data->test_configuration_id:'' ?>"
                                                rel="<?php //echo (!empty($test_data->test_configuration_id))?$test_data->test_configuration_id:''; ?>"
                                                style="margin-left: 450px; font-weight: bold;"
                                                disabled>Start Exam</a>
                                        </div>
                                    </div>
                                </div> -->
                        <?php } ?>
                    </div>
                    <!-- END ALERTS PORTLET-->
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
    </div>

    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php $this->load->view('footer'); ?>
    <!-- END FOOTER -->
    </div>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript">
    </script>

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
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript">
    </script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js"
        type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/holder.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/custom_g.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/disable_all.js"></script> -->

    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {
            // initiate layout and plugins
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
            UIGeneral.init();

            let examStartTime = '<?php echo date('Y-m-d\TH:i:s', strtotime($test_data->test_datetime)); ?>'; // Example start time
            let examDurationMinutes = <?php echo $test_data->test_time; ?>; // Exam duration in minutes
            let lateMinutes = 0; // Allowable late time in minutes

            calculateExamTimers(examStartTime, examDurationMinutes, lateMinutes);

            calculateExamEndTime(examStartTime, examDurationMinutes);
        });

        /**
         * Function to calculate and manage exam timers
         * @param {string} examStartTime - Exam start time in ISO format (e.g., "2024-12-28T10:00:00").
         * @param {number} examDurationMinutes - Duration of the exam in minutes.
         * @param {number} lateMinutes - Allowable late time in minutes.
         */
        function calculateExamTimers(examStartTime, examDurationMinutes, lateMinutes) {
            // Parse Exam Start Time
            let startTime = new Date(examStartTime).getTime();

            // Calculate Exam End Time
            let examEndTime = startTime + examDurationMinutes * 60 * 1000;

            // Initialize Timers
            let timerInterval = setInterval(() => {
                let currentTime = new Date().getTime();
                let lateTime = Math.max(currentTime - startTime, 0); // Late time in ms
                let remainingTime = examEndTime - currentTime; // Remaining time in ms
                let remExamStartTime = startTime - currentTime;

                // Exam Remaining Timer
                if (remainingTime > 0) {
                    let hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                    let formattedTexts = minutes.toString().padStart(2, "0") + ":" +
                        seconds.toString().padStart(2, "0")

                    $("#remaining-timer").text(`Remaining Exam Time : ${formattedTexts} min`);
                } else {
                    $("#remaining-timer").text("");
                }

                // Late Timer
                if (lateTime > 0 && lateTime < lateMinutes * 60 * 1000) {
                    let hours = Math.floor((lateTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let minutes = Math.floor((lateTime % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((lateTime % (1000 * 60)) / 1000);

                    $("#late-timer").text(`Late Time: ${minutes}m ${seconds}s`);
                } else {
                    $("#late-timer").text("");
                }

                // Exam Ended
                if (remainingTime <= 0) {
                    clearInterval(timerInterval);
                    $("#message").text("Exam is over. Please wait for the next exam.").show();
                }

                // Exam Start Button Timer
                if (remExamStartTime > 0) {
                    let hours = Math.floor((remExamStartTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let minutes = Math.floor((remExamStartTime % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((remExamStartTime % (1000 * 60)) / 1000);

                    let formattedTexts = hours.toString().padStart(2, "0") + ":" + minutes.toString().padStart(2, "0") + ":" +
                        seconds.toString().padStart(2, "0")

                    $("#startButton").text(`Exam Starts In: ${formattedTexts}`);
                } else {
                    $("#startButton")
                        .text("Start Exam")
                        .removeAttr("disabled")
                        .addClass("enabled");
                    clearInterval(timerInterval); // Stop the timer
                }
            }, 1000);
        }

        /**
         * Function to calculate the exam end time using start time and duration
         * @param {string} startTime - Exam start time in ISO format (e.g., "2024-12-28T10:00:00").
         * @param {number} examDurationMinutes - Duration of the exam in minutes.
         */
        function calculateExamEndTime(startTime, examDurationMinutes) {
            // Parse the Exam Start Time into a Date object
            let startDate = new Date(startTime);

            // Calculate Exam End Time
            let endDate = new Date(startDate.getTime() + examDurationMinutes * 60 * 1000);

            // Format the date to a readable string
            let formattedEndTime = formatDate(endDate);

            // Display the start and end times on the page
            //$("#exam-start-time").text(startDate.toLocaleString());
            $("#exam-end-time").html(`Exam ends on : <strong>${formattedEndTime}</strong>`);

            return formattedEndTime; // Return end time if needed for other operations
        }

        /**
         * Function to format date to 'd-m-Y H:i:s'
         * @param {Date} date - The date object.
         * @returns {string} - Formatted date string in 'd-m-Y H:i:s' format.
         */
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0'); // Get day and pad with zero
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Get month and pad with zero (months are 0-indexed)
            const year = date.getFullYear(); // Get year
            const hours = String(date.getHours()).padStart(2, '0'); // Get hours and pad with zero
            const minutes = String(date.getMinutes()).padStart(2, '0'); // Get minutes and pad with zero

            // Return the formatted string in 'd-m-Y H:i:s' format
            return `${day}-${month}-${year} ${hours}:${minutes}`;
        }
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>