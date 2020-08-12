<?php 

require_once('classes/Csv.php');
require_once('classes/Json.php');
require_once('classes/Xls.php');
require_once('classes/Xlsx.php');
require_once('classes/Xml.php');

if (!empty($_POST['convert'])) {

    $file = (!empty($_FILES['file_to_convert']['name'])) ? $_FILES['file_to_convert']['name'] : '';
    $convert_to = $_POST['convert_options'];

    if (!empty($file) AND empty($convert_to)) {

    } elseif (empty($file) AND !empty($convert_to)) {
        
    } elseif (empty($file) AND empty($convert_to)) {

    }

    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    $file_tmp_path = $_FILES['file_to_convert']['tmp_name'];
    $data_array = [];
    $final_file = '';
    $class = '';
    switch ($file_extension) {
        case "json":
            $file_temp_data = file_get_contents($file_tmp_path);
            $data_array = json_decode($file_temp_data, true);
            $class = 'Json';
            break;     
        case "xml":
            $data_array = simplexml_load_file($file_tmp_path);
            $class = 'Xml';
            break;
        case "xls":
            $class = 'Xls';
            break;  
        case "xlsx":
            $class = 'Xlsx';
            break;
        case "csv":
            $class = 'Csv';
            break;    
    }

    $call = new $class();
    $function_name = $file_extension . '_2_' . $convert_to;
    $return_file = $call->$function_name($data_array);
 
}

?>