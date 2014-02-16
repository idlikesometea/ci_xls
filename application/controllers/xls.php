<?php 

class Xls extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_xls');
		$this->load->library('excel');
		// $this->load->library('PHPExcel/iofactory');
	}

	function index(){
		$data['datos'] = $this->model_xls->get_all();
		$this->load->view('xls', $data);
	}

/*	function export_xls(){
		$datos = $this->model_xls->get_all();
		$array[0]['id'] = 'ID';
		$array[0]['clics'] = 'Clics';
		$array[0]['impresiones'] = 'Impresiones';
		$array[0]['visitas'] = 'Visitas';
		$cont = 1;
		foreach ($datos as $key) {
			$array[$cont]['id']=$key->id; 
 			$array[$cont]['clics']=$key->clics;
			$array[$cont]['impresiones']=$key->impresiones;
			$array[$cont]['visitas']=$key->visitas;
			$cont++;
		}
 		$this->excel->setActiveSheetIndex(0); //activate worksheet number 1
		$this->excel->getActiveSheet()->setTitle('XLS Report'); //name the worksheet
		$this->excel->getActiveSheet()
    		->fromArray(
        		$array, // The data to set
        		NULL ,   // Array values with this value will not be set
        		'B2'    // Top left coordinate of the worksheet range where we want to set these values (default is A1)
    		);

		$filename='report.xlsx'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}*/

	function export_xls_chart(){
	$datos = $this->model_xls->get_all();
	$array[0]['cat'] = 'Lapso';
	$array[0]['clics'] = 'Clics';
	$array[0]['impresiones'] = 'Impresiones';
	$array[0]['visitas'] = 'Visitas';
	$cont = 1;
	foreach ($datos as $key) {
		$array[$cont]['cat']=$cont; 
		$array[$cont]['clics']=$key->clics;
		$array[$cont]['impresiones']=$key->impresiones;
		$array[$cont]['visitas']=$key->visitas;
		$cont++;
	}
	$workbook = new PHPExcel();
	$sheet = $workbook->getActiveSheet();
	$sheet->fromArray(
		$array,
		NULL
	);
	$labels = array(
    	new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$1', null, 1),
    	new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$C$1', null, 1),
    	new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$D$1', null, 1)
	);
	$categories = array(
		new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$2:$A$5', null, 4)

	);
	$values = array(
		new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$2:$B$5', null, 4),
		new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$C$2:$C$5', null, 4)
	);
	$series = new PHPExcel_Chart_DataSeries(
		PHPExcel_Chart_DataSeries::TYPE_BARCHART,       // plotType
		PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,  // plotGrouping
		array(0,1),                                    	// plotOrder
		$labels,                                       	// plotLabel
		$categories,                                    // plotCategory
		$values                                         // plotValues
	);
	$values2 = array(
		null, null,
		new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$5', null, 4)
	);
	$series2 = new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_LINECHART, 		// plotType
        PHPExcel_Chart_DataSeries::GROUPING_STANDARD, 	// plotGrouping
        array(2), 										// plotOrder
        $labels, 										// plotLabel
        $categories, 									// plotCategory
        $values2, 										// plotValues
        true,
        PHPExcel_Chart_DataSeries::STYLE_FILLED
	);
	$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
	$layout = new PHPExcel_Chart_Layout();
	$xTitle = new PHPExcel_Chart_Title('Título eje x');
	$yTitle = new PHPExcel_Chart_Title('Título eje y');
	$title = new PHPExcel_Chart_Title('Reporte XLS');
	$plotarea = new PHPExcel_Chart_PlotArea($layout, array($series, $series2));
	$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, null, false);
	$chart = new PHPExcel_Chart(
		'Reporte',                                      // name
		$title,                                         // title
		$legend,                                        // legend
		$plotarea,                                      // plotArea
		true,                                           // plotVisibleOnly
		0,                                              // displayBlanksAs
		$xTitle,                                        // xAxisLabel
		$yTitle                                         // yAxisLabel
	);
	$chart->setTopLeftPosition('A7');
	$chart->setBottomRightPosition('H20');
	$sheet->addChart($chart);
	$writer = PHPExcel_IOFactory::createWriter($workbook, 'Excel2007');
	$writer->setIncludeCharts(TRUE);
	$filename='report.xlsx'; //save our workbook as this file name
	header('Content-Type: application/vnd.ms-excel'); //mime type
	header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
	header('Cache-Control: max-age=0'); //no cache
	$writer->save('php://output');
	}

}