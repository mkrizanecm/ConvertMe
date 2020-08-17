<?php 

require_once('opensource/Xml2json.php');

class Converter {

    public static function convert($data, $from_format, $to_format) {
        $return_file = '';

        if ($from_format == 'json' AND in_array($to_format, ['xls', 'xlsx', 'csv'])) {

        } elseif ($from_format == 'json' AND $to_format == 'xml') {

        } elseif ($from_format == 'xml' AND in_array($to_format, ['xls', 'xlsx', 'csv'])) {

        } elseif ($from_format == 'xml' AND $to_format == 'json') {
           $xml_2_json = new Xml2json();
           $return_file = $xml_2_json->transformXmlStringToJson($data);
        } else {
            if ($to_format == 'json') {

            } elseif ($to_format == 'xml') {

            } else {

            }
        }
    }
}
?>