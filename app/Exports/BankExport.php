<?php

require_once 'PHPExcel/IOFactory.php';

// Load the existing Excel file
$objPHPExcel = PHPExcel_IOFactory::load('path/to/your/excel/file.xlsx');

// Access the desired worksheet
$worksheet = $objPHPExcel->getActiveSheet();

// Modify the worksheet data
$worksheet->setCellValue('A1', 'Updated value');

// Save the updated Excel file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('path/to/updated/excel/file.xlsx');
