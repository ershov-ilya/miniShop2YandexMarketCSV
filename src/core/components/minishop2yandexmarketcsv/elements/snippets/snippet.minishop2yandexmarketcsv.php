<?php
define('DEBUG',0);
$modx->setLogLevel(DEBUG ? modX::LOG_LEVEL_INFO : modX::LOG_LEVEL_ERROR);
$modx->setLogTarget('ECHO'); //XPDO_CLI_MODE ? 'ECHO' : 'HTML'

/* @var modX $modx */
$Y = $modx->getService('minishop2yandexmarketcsv','miniShop2YandexMarketCSV',$modx->getOption('minishop2yandexmarketcsv_core_path',null,$modx->getOption('core_path').'components/minishop2yandexmarketcsv/').'model/minishop2yandexmarketcsv/',$scriptProperties);
if (!($Y instanceof miniShop2YandexMarketCSV)) return '';

$fields = $modx->getOption('fields',$scriptProperties,'id');
$Y->put($fields);

// Debug info
$arrFields=explode(';', $fields);
$countFields=count($arrFields);
$parents = $modx->getOption('parents',$scriptProperties,'0');

// Start process
$Y->start();
return $Y->getOutput();
/**/