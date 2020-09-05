<?php

$url = 'http://localhost/aulasYT/api_rest/api/v2.0';

$class = 'Stock';
$method = 'show';

$MontarUrl = $url.'/'.$class.'/'.$method;

$return = file_get_contents($MontarUrl);

var_dump(json_encode($return, 1));