<?php 

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
    switch ($file_extension) {
        case "json":
            $file_temp_data = file_get_contents($file_tmp_path);
            $data_array = json_decode($file_temp_data, true);
            break;     
        case "xml":
            $data_array = simplexml_load_file($file_tmp_path);
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

    foreach ($data_array AS $key => $data) {
        var_dump($key, $data);
    }
 exit;
    
}
?>