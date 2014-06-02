<?php
/*
$tpl = $modx->getOption('tpl',$scriptProperties,'Item');
$sortBy = $modx->getOption('sortBy',$scriptProperties,'name');
$sortDir = $modx->getOption('sortDir',$scriptProperties,'ASC');
$limit = $modx->getOption('limit',$scriptProperties,5);

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
