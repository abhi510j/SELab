<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Excel_import extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('excel_import_model');
        $this->load->library('excel');
    }

    function index(){
        $this->load->helper('url');
        $this->load->view('first_page');
    }

    function fetch(){
        $data = $this->excel_import_model->select();
        $output = '
        <h3 align = "center"> Total Data - '.$data->num_rows().'</h3>
        <table class="table table-striped table-bordered">
        <tr>
        <th>Serial Number</th>
        <th>Name</th>
        <th>Admission Number</th>
        <th>Status</th>
        </tr> 
        ';
        foreach($data->result() as $row){
            $output .= '
            <tr>
            <td>'.$row->SerialNumber.'</td>
            <td>'.$row->Name.'</td>
            <td>'.$row->AdmissionNumber.'</td>
            <td>'.$row->Status.'</td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }

    function import(){
        if(isset($_FILES["file"]["name"])){
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet){
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row = 2; $row<$highestRow; $row++){
                    $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $serial_number = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $admission_number = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $status = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                    $data[] = array(
                        'SerialNumber' => $serial_number,
                        'Name' => $name,
                        'AdmissionNumber' => $admission_number,
                        'Status' => $status
                    );
                }
            }
            $this->Excel_import_model->insert($data);
            echo 'Data Imported successfully';
        }
    }
}

?>