<?php
define('DEBUG',1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/* @var modX $modx */
$Y = $modx->getService('minishop2yandexmarketcsv','miniShop2YandexMarketCSV',$modx->getOption('minishop2yandexmarketcsv_core_path',null,$modx->getOption('core_path').'components/minishop2yandexmarketcsv/').'model/minishop2yandexmarketcsv/',$scriptProperties);
if (!($Y instanceof miniShop2YandexMarketCSV)) return '';

$fields = $modx->getOption('fields',$scriptProperties,'id');
$Y->put($fields);

// Debug info
$arrFields=explode(';', $fields);
$countFields=count($arrFields);
$parents = $modx->getOption('parents',$scriptProperties,'0');
if(DEBUG){
    $Y->put("Debug info:");
    $Y->put("fields count: $countFields");
    $Y->put("parents: $parents");
    $Y->put("class: ".$modx->getOption('class',$scriptProperties,'0'));
}

// Start process
$Y->start();
return $Y->getOutput();