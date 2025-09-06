<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH . "/third_party/PHPExcel.php";

class Excel extends PHPExcel
{
    public function __construct()
    {
        ini_set('memory_limit', '25600M');
        parent::__construct();
        $CI =& get_instance();
        $CI->load->library("session");
    }


    public function read_excel_data($inputFileName)
    {
        $data = array();
        // Read your Excel workbook
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        //  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        //  Loop through each row of the worksheet in turn
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray(
                'A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE
            );
            // print_r($rowData);
            $data[] = $rowData;
        }
        return $data;
    }

    function generate_test_report($data)
    {
        $CI =& get_instance();
        $current_date = date('d/m/Y');
    
        // Load the PHPExcel library
        PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());
    
        // Set document properties
        $CI->excel->getProperties()->setCreator("Moonveda Infotech Pvt. Ltd")
            ->setLastModifiedBy("Moonveda Infotech Pvt. Ltd")
            ->setTitle("Aptitude Test Result Report")
            ->setSubject("Aptitude Test Result Report")
            ->setDescription("System Generated File.")
            ->setKeywords("office 2007")
            ->setCategory("Confidential");
    
        // Create style for borders
        $allborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
        );
    
        // Define the header style
        $headerStyle = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),  // Black font color
                'name' => 'Bookman Old',  // Set the font family to Bookman Old
            ),
            'fill' => array(
                'fillType' => PHPExcel_Style_Fill::FILL_NONE,  // No background color for headers
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
    
        // Set active sheet and title
        $CI->excel->setActiveSheetIndex(0);
        $CI->excel->getActiveSheet()->setTitle('Aptitude Test Result ');
    
        // Display Test Name (centered)
        $test_name = $data['user_result'][0]->test_name; // Assuming the first record has the test name
        $CI->excel->getActiveSheet()->mergeCells('A2:O2');  // Merge cells to center the title
        $CI->excel->getActiveSheet()->setCellValue('A2', 'Aptitude Test Report of ' . $test_name . ' Exam');
        $CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(14)->setName('Bookman Old');
        $CI->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $CI->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    
        // Set column headers with styles
        $headers = ['Sr. No.', 'Full Name', 'Department', 'Designation', 'Education', 'Employee Joining Date', 'Location', 'Total Question', 'Total Marks', 'Negative Marks', 'Correct Answer', 'Wrong Answer', 'Marks Obtained', 'Not Attempted', 'Result'];
        $col = 'A';
        $rowIndex = 4;  // Starting from the 4th row
        foreach ($headers as $header) {
            $CI->excel->getActiveSheet()->setCellValue($col . $rowIndex, $header);
            $CI->excel->getActiveSheet()->getStyle($col . $rowIndex)->applyFromArray($headerStyle);  // Apply header style
            $CI->excel->getActiveSheet()->getColumnDimension($col)->setWidth(20);
            $col++;
        }
    
        // Fill data in rows
        if (!empty($data['user_result'])) {
            $i = 5; // Start filling data from row 5
            $sr = 1;
            foreach ($data['user_result'] as $key) {
                // Fill in existing columns
                $CI->excel->getActiveSheet()->setCellValue('A' . $i, $sr++);
                $CI->excel->getActiveSheet()->setCellValue('B' . $i, $key->fullname);
                $CI->excel->getActiveSheet()->setCellValue('C' . $i, $key->dept_master_name);
                $CI->excel->getActiveSheet()->setCellValue('D' . $i, $key->title);
                $CI->excel->getActiveSheet()->setCellValue('E' . $i, $key->latest_education);
                $CI->excel->getActiveSheet()->setCellValue('F' . $i, $key->emp_joining_date);
                $CI->excel->getActiveSheet()->setCellValue('G' . $i, $key->station_type_name);
                $CI->excel->getActiveSheet()->setCellValue('H' . $i, $key->question_count);
                $CI->excel->getActiveSheet()->setCellValue('I' . $i, $key->total_mark);
                $CI->excel->getActiveSheet()->setCellValue('J' . $i, $key->per_mark);
                $CI->excel->getActiveSheet()->setCellValue('K' . $i, $key->correct_count);
                $CI->excel->getActiveSheet()->setCellValue('L' . $i, $key->incorrect_count);
    
                // Calculating `tot_marks`, `not_attempted`, and Pass/Fail result
                $per_que_mark = $key->total_mark / $key->question_count;
                $wrong_ans_que = $key->incorrect_count * $key->per_mark;
                $mark_obtained = $key->correct_count * $per_que_mark;
                $tot_mark = $mark_obtained - $wrong_ans_que;
    
                // Setting `tot_marks`
                $CI->excel->getActiveSheet()->setCellValue('M' . $i, $tot_mark);
    
                // Calculating `not_attempted`
                $correct = isset($key->correct_count) ? $key->correct_count : 0;
                $incorrect = isset($key->incorrect_count) ? $key->incorrect_count : 0;
                $total_q = isset($key->question_count) ? $key->question_count : 0;
                $not_attempted = $total_q - ($correct + $incorrect);
                $CI->excel->getActiveSheet()->setCellValue('N' . $i, $not_attempted >= 0 ? $not_attempted : 0);
    
                // Calculating percentage and setting Pass/Fail result
                $percentage = ($tot_mark / $key->total_mark) * 100;
                $percent = round($percentage, 2);
                if ($percent < 35) {
                    $CI->excel->getActiveSheet()->setCellValue('O' . $i, 'FAIL');
                } else {
                    $CI->excel->getActiveSheet()->setCellValue('O' . $i, 'PASS');
                }
    
                $i++;
            }
        }
    
        // Apply border style to all cells with data
        $CI->excel->getActiveSheet()->getStyle('A4:O' . ($i - 1))->applyFromArray($allborders);
    
        // Set the font family for all cells in the sheet
        $CI->excel->getActiveSheet()->getStyle('A1:O' . ($i - 1))->getFont()->setName('Bookman Old');
    
        // Generate the Excel file and output it to the browser
        $filename = 'aptitude_report-' . $current_date . '.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
    
        $objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');
        ob_end_clean();  // Clean any previous output
        $objWriter->save('php://output');
    }
    

    function generate_percentage_report($data)
    {
        $CI =& get_instance();
        $current_date = date('d-m-Y');
    
        PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());
    
        $CI->excel->getProperties()->setCreator("Moonveda Infotech Pvt. Ltd")
            ->setLastModifiedBy("Moonveda Infotech Pvt. Ltd")
            ->setTitle("Aptitude Test Result Report")
            ->setSubject("Aptitude Test Result Report")
            ->setDescription("System Generated File.")
            ->setKeywords("office 2007")
            ->setCategory("Confidential");
    
        $allborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
        );
    
        $headerStyle = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'name' => 'Bookman Old',
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true,
            ),
        );
    
        $CI->excel->setActiveSheetIndex(0);
        $CI->excel->getActiveSheet()->setTitle('Aptitude Test Result');
    
        // Get test name safely
        $test_name = '';
        if (!empty($data['test_report_percent'][0]->test_name)) {
            $test_name = $data['test_report_percent'][0]->test_name;
        }
    
        $CI->excel->getActiveSheet()->mergeCells('A2:G2');
        $CI->excel->getActiveSheet()->setCellValue('A2', 'Correct/Wrong (%) Report of "' . $test_name . '" Exam');
    
        $CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(14)->setName('Bookman Old');
        $CI->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $CI->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    
        // Headers
        $headers = array('Sr. No.', 'Question', 'Correct Answers (%)', 'Wrong Answers (%)', 'N/A (%)', 'List of Options', 'Correct Answer');
        $col = 'A';
        $rowIndex = 4;
    
        foreach ($headers as $header) {
            $CI->excel->getActiveSheet()->setCellValue($col . $rowIndex, $header);
            $CI->excel->getActiveSheet()->getStyle($col . $rowIndex)->applyFromArray($headerStyle);
    
            if ($header == 'Sr. No.') {
                $CI->excel->getActiveSheet()->getColumnDimension($col)->setWidth(8);
            } elseif ($header == 'Question') {
                $CI->excel->getActiveSheet()->getColumnDimension($col)->setWidth(40);
            } else {
                $CI->excel->getActiveSheet()->getColumnDimension($col)->setWidth(20);
            }
    
            $col++;
        }
    
        if (!empty($data['test_report_percent'])) {
            $i = 5;
            $sr = 1;
            foreach ($data['test_report_percent'] as $key) {
                $CI->excel->getActiveSheet()->setCellValue('A' . $i, $sr);
                $CI->excel->getActiveSheet()->setCellValue('B' . $i, $key->question);
    
                $total_users = ($key->total_users > 0) ? $key->total_users : 1;
                $correct_pct = round(($key->correct_count * 100) / $total_users, 2);
                $wrong_pct = round(($key->wrong_count * 100) / $total_users, 2);
                $na_pct = round(($key->na_count * 100) / $total_users, 2);
    
                $CI->excel->getActiveSheet()->setCellValue('C' . $i, $correct_pct . '%');
                $CI->excel->getActiveSheet()->setCellValue('D' . $i, $wrong_pct . '%');
                $CI->excel->getActiveSheet()->setCellValue('E' . $i, $na_pct . '%');
    
                $options_list = '';
                if (!empty($key->options_data)) {
                    $count = 1;
                    foreach ($key->options_data as $option_obj) {
                        $options_list .= $count . ') ' . $option_obj->option . "\n";
                        $count++;
                    }
                }
                $CI->excel->getActiveSheet()->setCellValueExplicit('F' . $i, $options_list, PHPExcel_Cell_DataType::TYPE_STRING);
                $CI->excel->getActiveSheet()->setCellValueExplicit('G' . $i, $key->question_mar, PHPExcel_Cell_DataType::TYPE_STRING);

    
                // Enable wrapping
                $CI->excel->getActiveSheet()->getStyle('B' . $i)->getAlignment()->setWrapText(true);
                $CI->excel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setWrapText(true);
                $CI->excel->getActiveSheet()->getStyle('G' . $i)->getAlignment()->setWrapText(true);
    
                $sr++;
                $i++;
            }
        }
    
        // Apply borders to full data range
        $CI->excel->getActiveSheet()->getStyle('A4:G' . ($i - 1))->applyFromArray($allborders);
        $CI->excel->getActiveSheet()->getStyle('A1:G' . ($i - 1))->getFont()->setName('Bookman Old');
    
        // Clean and safe filename
        $safe_test_name = preg_replace('/[^A-Za-z0-9]/', '_', $test_name);
        $filename = strtolower($safe_test_name) . '_report_' . $current_date . '.xls';
    
        // Output headers
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
    
        ob_end_clean();
        $objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');
        $objWriter->save('php://output');
    }
    


   function generate_attendance_report($data)
{
    $CI =& get_instance();
    $current_date = date('d-m-Y');

    PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());

    $CI->excel->getProperties()->setCreator("Moonveda Infotech Pvt. Ltd")
        ->setLastModifiedBy("Moonveda Infotech Pvt. Ltd")
        ->setTitle("Aptitude Test Result Report")
        ->setSubject("Aptitude Test Result Report")
        ->setDescription("System Generated File.")
        ->setKeywords("office 2007")
        ->setCategory("Confidential");

    $allborders = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
        ),
    );

    $headerStyle = array(
        'font' => array(
            'bold' => true,
            'color' => array('rgb' => '000000'),
            'name' => 'Bookman Old',
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap' => true,
        ),
    );

    $CI->excel->setActiveSheetIndex(0);
    $CI->excel->getActiveSheet()->setTitle('Aptitude Test Result');

    $test_name = !empty($data['report_data'][0]->test_name) ? $data['report_data'][0]->test_name : '';

    $CI->excel->getActiveSheet()->mergeCells('A2:E2');
    $CI->excel->getActiveSheet()->setCellValue('A2', 'Report of Employees Who Did Not Attend the"' . $test_name . '" Exam');
    $CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(14)->setName('Bookman Old');
    $CI->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $CI->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

    // Headers
    $headers = array('Sr. No.', 'Employee Name', 'Test Name', 'Department', 'Location');
    $col = 'A';
    $rowIndex = 4;

    foreach ($headers as $header) {
        $CI->excel->getActiveSheet()->setCellValue($col . $rowIndex, $header);
        $CI->excel->getActiveSheet()->getStyle($col . $rowIndex)->applyFromArray($headerStyle);
        $CI->excel->getActiveSheet()->getColumnDimension($col)->setWidth(20);
        $col++;
    }

    if (!empty($data['report_data'])) {
        $i = 5;
        $sr = 1;
        foreach ($data['report_data'] as $key) {
            $CI->excel->getActiveSheet()->setCellValue('A' . $i, $sr);
            $CI->excel->getActiveSheet()->setCellValue('B' . $i, $key->Employee_Name);
            $CI->excel->getActiveSheet()->setCellValue('C' . $i, $key->test_name);
            $CI->excel->getActiveSheet()->setCellValue('D' . $i, $key->dept_master_name);
            $CI->excel->getActiveSheet()->setCellValue('E' . $i, $key->station_type_name);

            // Wrap text if needed
            $CI->excel->getActiveSheet()->getStyle('B' . $i)->getAlignment()->setWrapText(true);
            $CI->excel->getActiveSheet()->getStyle('C' . $i)->getAlignment()->setWrapText(true);
            $CI->excel->getActiveSheet()->getStyle('D' . $i)->getAlignment()->setWrapText(true);
            $CI->excel->getActiveSheet()->getStyle('E' . $i)->getAlignment()->setWrapText(true);

            $sr++;
            $i++;
        }

        // Apply borders
        $CI->excel->getActiveSheet()->getStyle('A4:E' . ($i - 1))->applyFromArray($allborders);
        $CI->excel->getActiveSheet()->getStyle('A1:E' . ($i - 1))->getFont()->setName('Bookman Old');
    }

    $safe_test_name = preg_replace('/[^A-Za-z0-9]/', '_', $test_name);
    $filename = strtolower($safe_test_name) . '_report_' . $current_date . '.xls';

    // Output
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: cache, must-revalidate');
    header('Pragma: public');

    ob_end_clean(); // clear any previous output
    $objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');
    $objWriter->save('php://output');
}



}