<?php 

require_once('opensource/Xml2json.php');

class Converter {

    public static function convert($data, $from_format, $to_format) {
        $return_format = [];
        if ($from_format == 'csv') {
            if ($to_format == 'json'){
                foreach ($data AS $key => $d) {
                    if ($key == 0) {
                        continue;
                    }
                    $return_format[] = array_combine($data[0], $d);
                }
                $return_format = json_encode($return_format);
            } elseif ($to_format == 'xml') {

            }
        } elseif ($from_format == 'json') {
            if ($to_format == 'xml'){

            } elseif ($to_format == 'csv') {
                
            }
        } elseif ($from_format == 'xml') {
            if ($to_format == 'json'){

            } elseif ($to_format == 'csv') {
                
            }
        }

        return $return_format;
    }
}
?>