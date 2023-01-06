<?php

    include __DIR__ . '/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load(__DIR__ . '/CATEGORIES.xlsx');
    $writer = IOFactory::createWriter($spreadsheet, 'Html');

    $message = $writer->save('php://output');

    $response = array(
        'excelobj' => $message
    );
    echo $message;



?>