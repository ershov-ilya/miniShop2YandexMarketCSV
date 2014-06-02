<?php
/* @var modX $modx */
$miniShop2YandexMarketCSV = $modx->getService('minishop2yandexmarketcsv','miniShop2YandexMarketCSV',$modx->getOption('minishop2yandexmarketcsv_core_path',null,$modx->getOption('core_path').'components/minishop2yandexmarketcsv/').'model/minishop2yandexmarketcsv/',$scriptProperties);
if (!($miniShop2YandexMarketCSV instanceof miniShop2YandexMarketCSV)) return '';


print '<pre>';
print_r($miniShop2YandexMarketCSV->getConfig());
print '</pre>';

/*
$tpl = $modx->getOption('tpl',$scriptProperties,'Item');
$sortBy = $modx->getOption('sortBy',$scriptProperties,'name');
$sortDir = $modx->getOption('sortDir',$scriptProperties,'ASC');
$limit = $modx->getOption('limit',$scriptProperties,5);
$outputSeparator = $modx->getOption('outputSeparator',$scriptProperties,"\n");

// build query
$c = $modx->newQuery('miniShop2YandexMarketCSVItem');
$c->sortby($sortBy,$sortDir);
$c->limit($limit);
$items = $modx->getCollection('miniShop2YandexMarketCSVItem',$c);

// iterate through items
$list = array();
/* @var miniShop2YandexMarketCSVItem $item */

/*
foreach ($items as $item) {
	$itemArray = $item->toArray();
	$list[] = $modx->getChunk($tpl,$itemArray);
}

// output
$output = implode($outputSeparator,$list);
$toPlaceholder = $modx->getOption('toPlaceholder',$scriptProperties,false);
if (!empty($toPlaceholder)) {
	// if using a placeholder, output nothing and set output to specified placeholder
	$modx->setPlaceholder($toPlaceholder,$output);
	return '';
}
/* by default just return output */
return $output;