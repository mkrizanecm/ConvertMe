<?php 

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
                $max_key = max(array_keys($data));
                $return_format[0] = '<?xml version="1.0" encoding="utf-8"?>';
                $return_format[0] .= '<parent>';
                foreach($data AS $key => $d) {   
                    if ($key == 0) {
                        continue;
                    }
                    $return_format[0] .= '<child>';
                    for ($i = 0; $i < $max_key; $i++) {
                        $child_node = strtolower(str_replace(' ', '_', $data[0][$i]));
                        $return_format[0] .= "<{$child_node}>" . $d[$i] . "</{$child_node}>";
                    }
                    $return_format[0] .= '</child>';
                } 
                $return_format[0] .= '</parent>';
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