

<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Overall Test Report
                </div>
            </div>
            <div class="actions">
                <div class="col-md-12">
                    <button id="generate_excel" onclick="saveAsExcel()" class="btn red btn-danger"
                        style="margin-top: -38px; margin-left: 88%; float: left;"> Export To
                        Excel</button>
                </div>
            </div>


            <div class="portlet-body ">
                <div class="tabbable-custom ">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover masterTable" id="empwise_result">

                            <thead>
                                <tr>
                                   
                                    
                                <th style="text-align: center;">
                                        Average <br>Start Time
                                    </th>
                                    <th style="text-align: center;">
                                        Average <br>Submitted Time
                                    </th>
                                    <th style="text-align: center;">
                                        Average <br>Response Time
                                    </th>
                                    <th style="text-align: center;">
                                        Total Questions
                                    </th>
                                    <th style="text-align:center;">
                                        Total <br> Correct Answers
                                    </th>
                                    <th style="text-align:center;">Total <br> Wrong Answers</th>
                                    <th style="text-align:center;">
                                        Total <br> N/A Answers
                                    </th>
                                    <th style="text-align:center;">
                                        Total Marks
                                    </th>
                                    <th style="text-align:center;">
                                        Average Marks
                                    </th>
                                    
                                  
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (isset($report_data) && !empty($report_data)) {
                                    $i = 1;
                                    $flag = 0;
                                    $first_row = $report_data[0];
                                    echo "<p> <strong>". $first_row->fullname .    "</strong> haveattempted" . "<strong> $first_row->total_exams_attempted </strong> exams" . "</p>";
                                    foreach ($report_data as $key) { ?>


                                        <tr class="odd gradeX">
                                        <td style="text-align: center;">
                                                <?php echo isset($key->avg_start_time)? $key->avg_start_time:'';?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo isset($key->avg_submitted_time)? $key->avg_submitted_time:'';?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->avg_response_time)? $key->avg_response_time:'';?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->total_question) ? $key->total_question : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->total_correct) ? $key->total_correct : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->total_incorrect) ? $key->total_incorrect : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->total_na) ? $key->total_na : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->overall_marks) ? $key->overall_marks : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->average_marks) ? $key->average_marks : ''; ?>
                                            </td>
                                           
                                            
                                           

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                    <?php ?>
                </div>
            </div>
        </div>



        <script>
            $(document).ready(function () {
                function updateSummary() {
                    let totalMarks = 0;
                    let totalPercentage = 0;
                    let count = 0;
                    let testNames = [];

                    $('.test-checkbox:checked').each(function () {
                        let marks = parseFloat($(this).data('marks'));
                        let percentage = parseFloat($(this).data('percentage'));
                        let name = $(this).data('name');

                        totalMarks += marks;
                        totalPercentage += percentage;
                        testNames.push(name);
                        count++;
                    });

                    let avgPercentage = count > 0 ? (totalPercentage / count).toFixed(2) : 0;
                    let avgMarks = count > 0 ? (totalMarks / count).toFixed(2) : 0;

                    $('#total-marks').text(totalMarks.toFixed(2));
                    $('#average-marks').text(avgMarks);
                    $('#average-percentage').text(avgPercentage);

                    let testListHtml = '';
                    testNames.forEach(name => {
                        testListHtml += '<li>' + name + '</li>';
                    });
                    $('#selected-tests').html(testListHtml);
                }

                // When individual checkbox changes
                $('.test-checkbox').change(function () {
                    updateSummary();

                    // If all checkboxes are checked, check the "Select All"
                    if ($('.test-checkbox').length === $('.test-checkbox:checked').length) {
                        $('#select-all').prop('checked', true);
                    } else {
                        $('#select-all').prop('checked', false);
                    }
                });

                // When "Select All" checkbox changes
                $('#select-all').change(function () {
                    $('.test-checkbox').prop('checked', this.checked);
                    updateSummary();
                });
            });
        </script>


        <script>
            function saveAsExcel() {
                $("#empwise_result").table2excel({
                    // exclude CSS class
                    exclude: ".noExl",
                    name: "Aptitude Test Marks",
                    filename: "aptitude_test_result_report", //do not include extension
                    fileext: ".xls", // file extension
                });
            }
        </script>