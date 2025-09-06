<div class="row" style="float:right; margin-bottom: 10px;">
    <div class="col-md-12">
        <button id="generate_excel" onclick="saveAsExcel()" class="btn red btn-danger"> Export To Excel</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover masterTable" id="export_result">
            <thead>
                <tr>
                    <th style="text-align:center;">
                        Employee Name/Questions
                    </th>
                    <?php $i=1; if(isset($test_report_data) && !empty($test_report_data)) { 
                        foreach ($test_report_data as $key) { ?>
                            <th style="text-align:center;">
                                <?php echo $i++; ?>
                            </th>
                        <?php } 
                    } ?>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($user_test_data) && !empty($user_test_data)) {
                    foreach ($user_test_data as $row) { 
                        $emp_name = $row['key'];
                        $user_ans = $row['user_ans'];?>
                        <tr class="odd gradeX">
                            <td style="text-align:center;">
                                <?php echo (isset($emp_name->fullname) && !empty($emp_name->fullname))?$emp_name->fullname:'';?>
                            </td>
                            <?php if (!empty($user_ans)) { 
                                foreach ($user_ans as $key) { ?>
                                    <td style="text-align:center;">
                                        <?php if (isset($key->option_id) && !empty($key->option_id)) {
                                            if ($key->option_id == $key->que_ans) { ?>
                                                <span class="label label-success">Right</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Wrong</span>
                                            <?php }
                                        } else { ?>
                                            <span class="label label-info">NA</span>
                                        <?php } ?>
                                    </td>
                                <?php }
                             } ?>
                        </tr>
                    <?php } 
                } ?>                                               
            </tbody>
        </table>
    </div>
</div>

<script>
    function saveAsExcel() {
        $("#export_result").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Aptitude Test Marks",
            filename: "aptitude_test_result_report", //do not include extension
            fileext: ".xls", // file extension
        });
    }
</script>