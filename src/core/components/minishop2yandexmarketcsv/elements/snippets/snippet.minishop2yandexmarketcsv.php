<?php
define('DEBUG',1);
/* @var modX $modx */
$Y = $modx->getService('minishop2yandexmarketcsv','miniShop2YandexMarketCSV',$modx->getOption('minishop2yandexmarketcsv_core_path',null,$modx->getOption('core_path').'components/minishop2yandexmarketcsv/').'model/minishop2yandexmarketcsv/',$scriptProperties);
if (!($Y instanceof miniShop2YandexMarketCSV)) return '';

$fields = $modx->getOption('fields',$scriptProperties,'id');
$Y->put($fields);

$arrFields=explode(';', $fields);
$countFields=count($arrFields);

$parents = $modx->getOption('parents',$scriptProperties,'0');



/*
print '<pre>';
print_r($miniShop2YandexMarketCSV->getConfig());
print '</pre>';
/**/

// Debug info
if(DEBUG){
    $Y->put("Debug info:");
    $Y->put("fields count: $countFields");
    $Y->put("parents: $parents");
}
return $Y->getOutput();