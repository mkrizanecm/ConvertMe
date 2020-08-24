<?php 

require_once('classes/Converter.php');

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
            $data_array = file_get_contents($file_tmp_path);
            break;
        case "csv":
            $file = fopen($file_tmp_path, 'r');
            while (($line = fgetcsv($file)) !== FALSE) {
                $line_array = explode(';', $line[0]);
                $data_array[] = $line_array;
            }
            break;    
    }

    $converter = new Converter();
    $return_data = $converter->convert($data_array, $file_extension, $convert_to);

    header('Content-disposition: attachment; filename=file.json');
    header('Content-type: application/json');
    echo $return_data;
}

?>