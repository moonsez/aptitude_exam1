<div class="row">
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Test Configuration List
				</div>
			</div>
            <div class="portlet-body">
                <div class="tabbable-custom ">
                    <ul class="nav nav-tabs " style="margin-top: 10px;">
                        <li class="active">
                            <a href="#tab_today_exam" data-toggle="tab">
                                Today's Exam </a>
                        </li>
                        <li>
                            <a href="#tab_future_exam" data-toggle="tab">
                                Upcoming Exams </a>
                        </li>

                        <li>
                            <a href="#tab_completed_exam" data-toggle="tab">
                                Completed Exams </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_today_exam">
                            <?php if (isset($section) && !empty($section)) {
                                $i = 0; ?>
                                <table class="table table-striped table-bordered table-hover masterTable">

                                    <thead>
                                    <tr>
                                        <th> Sr. No </th>
                                        <th>Department </th>
                                        <th>Location</th>
                                        <th>Test Name</th>
                                        <th>Question Count</th>
                                        <th>Negative Marking</th>
                                        <th>Total Marks.</th>
                                        <th>Exam Time</th>
                                        <th>Exam Start Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i = 1;
                                    foreach ($section as $key) { ?>
                                        <tr class="odd gradeX">
                                            <td style="text-align:center;">
                                                <?php echo $i++; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->department_names) && !empty($key->department_names)) ? $key->department_names : 'All'; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->station_type_name) && !empty($key->station_type_name)) ? $key->station_type_name : 'All'; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->test_name) && !empty($key->test_name)) ? $key->test_name : 'All'; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->question_count) && !empty($key->question_count)) ? $key->question_count : ''; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->per_mark) && !empty($key->per_mark)) ? $key->per_mark : ''; ?>
                                            </td>

                                            <td>
                                                <?php echo (isset($key->total_mark) && !empty($key->total_mark)) ? $key->total_mark : ''; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->test_time) && !empty($key->test_time)) ? $key->test_time : ''; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->test_datetime) && !empty($key->test_datetime)) ? $key->test_datetime : ''; ?>
                                            </td>


                                            <td style="text-align:center;">
															<span style="cursor: pointer;" class="tooltips editRecord"
                                                                  rev="edit_test"
                                                                  rel="<?php echo (isset($key->test_configuration_id) && !empty($key->test_configuration_id)) ? $key->test_configuration_id : ''; ?>"
                                                                  data-original-title="Edit" data-placement="top">
																<i class="fa fa-edit"></i>
															</span>
                                                <span style="cursor: pointer;" class="tooltips deleteRecord"
                                                      data-tbdiv="#testDetailsDiv" data-tburl="fetch_test"
                                                      rev="delete_test"
                                                      rel="<?php echo (isset($key->test_configuration_id) && !empty($key->test_configuration_id)) ? $key->test_configuration_id : ''; ?>"
                                                      data-original-title="Delete" data-placement="top">
																<i class="fa fa-trash-o"></i>
															</span>
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

                        <!-- This tab is for showing Upcoming exams -->
                        <div class="tab-pane " id="tab_future_exam">
                            <div id="main_dashboard">

                                <?php if (isset($upcoming_exams) && !empty($upcoming_exams)) {
                                    $i = 0; ?>
                                    <table class="table table-striped table-bordered table-hover masterTable">

                                        <thead>
                                        <tr>
                                            <th> Sr. No </th>
                                            <th>Department </th>
                                            <th>Location</th>
                                            <th>Test Name</th>
                                            <th>Question Count</th>
                                            <th>Negative Marking</th>
                                            <th>Total Marks.</th>
                                            <th>Exam Time</th>
                                            <th>Exam Start Date & Time</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i = 1;
                                        foreach ($upcoming_exams as $key) { ?>
                                            <tr class="odd gradeX">
                                                <td style="text-align:center;">
                                                    <?php echo $i++; ?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($key->dept_master_name) && !empty($key->dept_master_name)) ? $key->dept_master_name : 'All'; ?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($key->station_type_name) && !empty($key->station_type_name)) ? $key->station_type_name : 'All'; ?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($key->test_name) && !empty($key->test_name)) ? $key->test_name : 'All'; ?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($key->question_count) && !empty($key->question_count)) ? $key->question_count : ''; ?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($key->per_mark) && !empty($key->per_mark)) ? $key->per_mark : ''; ?>
                                                </td>

                                                <td>
                                                    <?php echo (isset($key->total_mark) && !empty($key->total_mark)) ? $key->total_mark : ''; ?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($key->test_time) && !empty($key->test_time)) ? $key->test_time : ''; ?>
                                                </td>
                                                <td>
                                                    <?php echo (isset($key->test_datetime) && !empty($key->test_datetime)) ? $key->test_datetime : ''; ?>
                                                </td>


                                                <td style="text-align:center;">
																<span style="cursor: pointer;" class="tooltips editRecord"
                                                                      rev="edit_test"
                                                                      rel="<?php echo (isset($key->test_configuration_id) && !empty($key->test_configuration_id)) ? $key->test_configuration_id : ''; ?>"
                                                                      data-original-title="Edit" data-placement="top">
																	<i class="fa fa-edit"></i>
																</span>
                                                    <span style="cursor: pointer;" class="tooltips deleteRecord"
                                                          data-tbdiv="#testDetailsDiv" data-tburl="fetch_test"
                                                          rev="delete_test"
                                                          rel="<?php echo (isset($key->test_configuration_id) && !empty($key->test_configuration_id)) ? $key->test_configuration_id : ''; ?>"
                                                          data-original-title="Delete" data-placement="top">
																	<i class="fa fa-trash-o"></i>
																</span>
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


                        <!-- This tab is for showing completed exams -->
                        <div class="tab-pane " id="tab_completed_exam">
                            <?php if (isset($completed_exams) && !empty($completed_exams)) {
                                $i = 0; ?>
                                <table class="table table-striped table-bordered table-hover masterTable">

                                    <thead>
                                    <tr>
                                        <th> Sr. No </th>
                                        <th>Department </th>
                                        <th>Location</th>
                                        <th>Test Name</th>
                                        <th>Question Count</th>
                                        <th>Negative Marking</th>
                                        <th>Total Marks.</th>
                                        <th>Exam Time</th>
                                        <th>Exam Start Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i = 1;
                                    foreach ($completed_exams as $key) { ?>
                                        <tr class="odd gradeX">
                                            <td style="text-align:center;">
                                                <?php echo $i++; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->dept_master_name) && !empty($key->dept_master_name)) ? $key->dept_master_name : 'All'; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->station_type_name) && !empty($key->station_type_name)) ? $key->station_type_name : 'All'; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->test_name) && !empty($key->test_name)) ? $key->test_name : 'All'; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->question_count) && !empty($key->question_count)) ? $key->question_count : ''; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->per_mark) && !empty($key->per_mark)) ? $key->per_mark : ''; ?>
                                            </td>

                                            <td>
                                                <?php echo (isset($key->total_mark) && !empty($key->total_mark)) ? $key->total_mark : ''; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->test_time) && !empty($key->test_time)) ? $key->test_time : ''; ?>
                                            </td>
                                            <td>
                                                <?php echo (isset($key->test_datetime) && !empty($key->test_datetime)) ? $key->test_datetime : ''; ?>
                                            </td>


                                            <td style="text-align:center;">
															<span style="cursor: pointer;" class="tooltips editRecord"
                                                                  rev="edit_test"
                                                                  rel="<?php echo (isset($key->test_configuration_id) && !empty($key->test_configuration_id)) ? $key->test_configuration_id : ''; ?>"
                                                                  data-original-title="Edit" data-placement="top">
																<i class="fa fa-edit"></i>
															</span>
                                                <span style="cursor: pointer;" class="tooltips deleteRecord"
                                                      data-tbdiv="#testDetailsDiv" data-tburl="fetch_test"
                                                      rev="delete_test"
                                                      rel="<?php echo (isset($key->test_configuration_id) && !empty($key->test_configuration_id)) ? $key->test_configuration_id : ''; ?>"
                                                      data-original-title="Delete" data-placement="top">
																<i class="fa fa-trash-o"></i>
															</span>
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