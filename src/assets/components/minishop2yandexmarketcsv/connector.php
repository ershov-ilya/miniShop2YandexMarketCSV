<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('minishop2yandexmarketcsv_core_path', null, $modx->getOption('core_path') . 'components/minishop2yandexmarketcsv/');
require_once $corePath . 'model/minishop2yandexmarketcsv/minishop2yandexmarketcsv.class.php';
$modx->minishop2yandexmarketcsv = new miniShop2YandexMarketCSV($modx);

$modx->lexicon->load('minishop2yandexmarketcsv:default');

/* handle request */
$path = $modx->getOption('processorsPath', $modx->minishop2yandexmarketcsv->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));