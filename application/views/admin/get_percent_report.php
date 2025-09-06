<div class="portlet-body">
<div class="actions">
                                    <button id="generate_excel" onclick="saveAsExcel()" class="btn red btn-danger"
                                        style="margin-top: -53px; margin-left: 86%;">
                                        Export To Excel</button>
                                </div>
    <?php if (!empty($employees)) { ?>
        <table class="table table-striped table-bordered table-hover masterTable" id="percentage_report">
            <thead>
                <tr>
                    <th style="text-align:center;">Sr. No.</th>
                    <th style="text-align:center;">Employee Name</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($employees as $key) { ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $i++; ?></td>
                        <td><?php echo !empty($key->emp) ? $key->emp : '-'; ?></td>
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

<script>
		jQuery(document).ready(function () {
			Metronic.init(); // init metronic core componets
			Layout.init(); // init layout
			//PluginPickers.init();
			TableAdvanced.init();
			Demo.init(); // init demo(theme settings page)
		});

		function saveAsExcel() {
			$("#percentage_report").table2excel({
				// exclude CSS class
				exclude: ".noExl",
				name: "Aptitude Test Marks",
				filename: "aptitude_test_result_in_percentage", //do not include extension
				fileext: ".xls", // file extension
			});
		}
	</script>

