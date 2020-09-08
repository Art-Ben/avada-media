<?php
// Template name: Fullwidth Template
$json = api_connect();
$secureCode = json_decode($json)->{'api_string_translator'};
//echo $secureCode;

//var_dump(json_decode(api_connect()));
