
<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Selected Test Summary
                </div>
            </div>
            <div class="portlet-body ">
                <div class="tabbable-custom ">
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover masterTable">
                            <thead>
                                <tr>
                                    <td><strong>Selected Tests</strong></td>
                                    <th><strong>Total Marks</strong></th>
                                    <th><strong>Average Marks</strong></th>
                                    <th><strong>Average Percentage</strong></th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <ul id="selected-tests" style="padding-left: 16px; margin: 0;"></ul>
                                    </td>
                                    <td><span id="total-marks">0</span></td>
                                    <td><span id="average-marks">0</span></td>
                                    <td><span id="average-percentage">0</span>%</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Test Report
                </div>
            </div>
            <div class="actions">
                <div class="col-md-12">
                    <!-- <button id="generate_excel" onclick="saveAsExcel()" class="btn red btn-danger"
                        style="margin-top: -38px; margin-left: 88%; float: left;"> Export To
                        Excel</button> -->

                        <button onclick="exportTableToExcel()" class="btn red btn-danger"
                        style="margin-top: -38px; margin-left: 88%; float: left;">Export to Excel</button>
                </div>
            </div>



            <div class="portlet-body ">
                <div class="tabbable-custom ">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover masterTable" id="empwise_result">

                            <thead>
                                <tr>
                                    <th class="noExl" style="text-align:center;">
                                        <input type="checkbox" id="select-all"> <br>Select All
                                    </th>

                                    <th style="text-align:center;">
                                        Sr. No.
                                    </th>
                                    <th style="text-align:center;">
                                        Test Name
                                    </th>
                                    <th style="text-align: center;">Test<br> Date Time</th>
                                    <th style="text-align:center;">
                                        Total <br>Questions
                                    </th>
                                    <th style="text-align:center;">
                                        Correct<br> Questions
                                    </th>
                                    <th style="text-align:center;">
                                        Wrong <br>Questions
                                    </th>
                                    <th style="text-align:center;">N/A <br>Questions</th>
                                    <th style="text-align:center;">
                                        Obtained <br> Marks
                                    </th>
                                    <th style="text-align:center;">
                                        % Mark
                                    </th>
                                    <th style="text-align:center;">
                                        Result
                                    </th>
                                    <th style="text-align:center;">Rank</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (isset($report_data) && !empty($report_data)) {
                                    $i = 1;
                                    $flag = 0;
                                    $first_row = $report_data[0];
                                    echo "<p>Overall score of  <strong>" . $first_row->fullname . "</strong>, is <strong>" . $first_row->overall_marks . "</strong> and attempted" . "<strong> $first_row->total_exams_attempted </strong> exams" . "</p>";
                                    foreach ($report_data as $key) { ?>


                                        <tr class="odd gradeX">
                                            <td style="text-align:center;" class="noExl">
                                                <input type="checkbox" class="test-checkbox"
                                                    data-marks="<?php echo isset($key->marks_obtained) ? $key->marks_obtained : 0; ?>"
                                                    data-percentage="<?php echo isset($key->percentage) ? $key->percentage : 0; ?>"
                                                    data-name="<?php echo isset($key->test_name) ? htmlspecialchars($key->test_name) : ''; ?>">
                                            </td>
                                            <td style="text-align:center;"><?php echo $i++; ?></td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->test_name) ? $key->test_name : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->test_datetime) ? date('d-m-Y H:i:s', strtotime($key->test_datetime)) : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->question_count) ? $key->question_count : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->correct_count) ? $key->correct_count : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->incorrect_count) ? $key->incorrect_count : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->not_attempted) ? $key->not_attempted : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->marks_obtained) ? $key->marks_obtained : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->percentage) ? $key->percentage : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php echo isset($key->result) ? $key->result : ''; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php
                                                if (isset($key->rank)) {
                                                    echo 'Rank ' . $key->rank;
                                                    if ($key->rank == 1)
                                                        echo '';
                                                    elseif ($key->rank == 2)
                                                        echo '';
                                                    elseif ($key->rank == 3)
                                                        echo '';
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
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
        

        <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>

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
            // function saveAsExcel() {
            //     $("#empwise_result").table2excel({
            //         // exclude CSS class
            //         exclude: ".noExl",
            //         name: "Aptitude Test Marks",
            //         filename: "aptitude_test_result_report", //do not include extension
            //         fileext: ".xls", // file extension
            //     });
            // }

            function exportTableToExcel() {
                var table = document.getElementById('empwise_result');
                // Force raw text export so Excel doesn't reformat it
                var ws = XLSX.utils.table_to_sheet(table, { raw: true });
                var wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "aptitude_test_result_report");
                XLSX.writeFile(wb, "aptitude_test_result_report.xlsx");
            }



        </script>