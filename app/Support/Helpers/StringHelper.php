<?php
if ( !function_exists('number_only') ) {
    /*
     * Método que remove todos os caracteres deixando apenas number
     * @param string $str
     */
    function number_only(string $str)
    {
        return preg_replace('/[^0-9]+/', '', $str);
    }
}


if ( !function_exists('str_only') ) {

    /*
     * Método que remove todos os caracteres deixando apenas string
     * @param string $str
     * @return string
     */
    function str_only(string $str)
    {
        return preg_replace('/[^A-Za-z![:space:]]/','', $str);
    }
}



if ( !function_exists('json_parse') ) {

    /**
     * converte uma colecao de dados para json
     *
     * @param $collection
     * @return mixed
     */
    function json_parse($collection)
    {
        return json_decode(json_encode($collection), FALSE);
    }
}