<?php 

if (!empty($_POST['convert'])) {

    $file = (!empty($_FILES['file_to_convert']['name'])) ? $_FILES['file_to_convert']['name'] : '';
    $convert_to = $_POST['convert_options'];

    if (!empty($file) AND empty($convert_to)) {

    } elseif (empty($file) AND !empty($convert_to)) {
        
    } elseif (empty($file) AND empty($convert_to)) {

    }

    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    $file_temp_data = file_get_contents($_FILES['file_to_convert']['tmp_name']);
    $file_temp_data = str_replace('&quot;', '"', $file_temp_data);

    $data_array = [];
    switch ($file_extension) {
        case "txt":
            echo 1;
            break;
        case "json":
            $data_array = json_decode(utf8_encode($file_temp_data), true);
            if (json_last_error()) {
                
            }
            break;     
        case "xml":
            echo 3;
            break;
        case "xls":
            echo 4;
            break;  
        case "xlsx":
            echo 5;
            break;
        case "csv":
            echo 6;
            break;    
    }
    print_r($data_array); exit;

    echo $file_extension; exit;


}
?>