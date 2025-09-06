<div class="row" style="float:right; margin-bottom: 10px;">
    <div class="col-md-12">
        <button id="generate_excel" onclick="saveAsExcel()" class="btn red btn-danger"> Export To Excel</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if(isset($user_result) && !empty($user_result))
        {?>
            <table class="table table-striped table-bordered table-hover masterTable" id="export_marks">
                <thead>
                    <tr>
                        <th style="text-align:center;">
                            Sr. No.
                        </th>
                        <th style="text-align:center;">
                            Employee Name
                        </th>
                        <th style="text-align:center;">
                            Department
                        </th>
                        <th style="text-align:center;">
                        Designation
                        </th>
                        <th style="text-align:center;">Employee Joining Date </th>
						<th style="text-align:center;">Location</th>
                        <th style="text-align:center;">
                            Total Questions
                        </th>
                        <th style="text-align:center;">
                            Total Marks
                        </th>
                        <th style="text-align:center;">
                            Negative Marks
                        </th>
                        <th style="text-align:center;">
                            Correct Answer
                        </th>
                        <th style="text-align:center;">
                            Wrong Answer
                        </th>
                        <th style="text-align:center;">
                            Marks Obtained
                        </th>
                        <th style="text-align:center;">
                            Result
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;$flag=0;
                    foreach ($user_result as $key) 
                    {?>
                        <tr class="odd gradeX">
                            <td style="text-align:center;">
                                <?php echo $i++;?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->fullname) && !empty($key->fullname))?$key->fullname:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->dept_master_name) && !empty($key->dept_master_name))?$key->dept_master_name:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->title) && !empty($key->title))?$key->title:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->emp_joining_date) && !empty($key->emp_joining_date))?$key->emp_joining_date:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->station_type_name) && !empty($key->station_type_name))?$key->station_type_name:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->question_count) && !empty($key->question_count))?$key->question_count:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->total_mark) && !empty($key->total_mark))?$key->total_mark:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->per_mark) && !empty($key->per_mark))?$key->per_mark:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->correct_count) && !empty($key->correct_count))?$key->correct_count:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php echo (isset($key->incorrect_count) && !empty($key->incorrect_count))?$key->incorrect_count:'';?>
                            </td>
                            <td style="text-align:center;">
                                <?php 
                                    $per_que_mark = $key->total_mark / $key->question_count;
                                    $wrong_ans_que = $key->incorrect_count * $key->per_mark;
                                    $mark_obtained = $key->correct_count * $per_que_mark;
                                    $tot_mark = $mark_obtained - $wrong_ans_que;
                                    echo $tot_mark; 
                                ?>
                            </td>
                            <td style="text-align:center;"> 
                                <?php 
                                $totalMarks = $key->total_mark;
                                $obtainedMarks = $tot_mark;
                                $percentage = ($obtainedMarks / $totalMarks) * 100;
                                $percent = round($percentage, 2);
                                if($percent < 35){ ?> <span class="label label-danger"><strong>FAIL</strong></span> <?php $flag=1;} else { ?> <span class="label label-success"><strong>PASS</strong></span> <?php } ?>
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
                            </td>*/?>
                        </tr>
                    <?php }?>                                               
                </tbody>
            </table>
        <?php }
        else {?>
            <center><h4>No Records Found</h4></center>
        <?php }?>
    </div>
</div>

<script>
    function saveAsExcel() {
        $("#export_marks").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Aptitude Test Marks",
            filename: "aptitude_test_marks_report", //do not include extension
            fileext: ".xls", // file extension
        });
    }
</script>