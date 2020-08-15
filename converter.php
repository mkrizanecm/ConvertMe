<?php 

require_once('classes/Converter.php');
require_once('opensource/SimpleXLSX.php');

if (!empty($_POST['convert'])) {

    $file = (!empty($_FILES['file_to_convert']['name'])) ? $_FILES['file_to_convert']['name'] : '';
    $convert_to = $_POST['convert_options'];

    if (!empty($file) AND empty($convert_to)) {

    } elseif (empty($file) AND !empty($convert_to)) {
        
    } elseif (empty($file) AND empty($convert_to)) {

    }

    $file_extension = pathinfo($file, PATHINFO_EXTENSION);

    if ($file_extension == $convert_to) {
        // Return same extension error
    }

    $file_tmp_path = $_FILES['file_to_convert']['tmp_name'];
    $data_array = [];
    $final_file = '';
    switch ($file_extension) {
        case "json":
            $file_temp_data = file_get_contents($file_tmp_path);
            $data_array = json_decode($file_temp_data, true);
            break;     
        case "xml":
            $data_array = simplexml_load_file($file_tmp_path);
            break;
        case "xls":
            break;  
        case "xlsx":
            $data_array = ($xlsx = SimpleXLSX::parse($file_tmp_path)) ? $xlsx->rows() : $data_array;
            break;
        case "csv":
            break;    
    }

    $converter = new Converter();
    $function_name = 'to_' . $convert_to;
    $return_file = $converter->$function_name($data_array);
 
}

?>