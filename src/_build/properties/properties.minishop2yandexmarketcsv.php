<?php

$properties = array();

$tmp = array(
    'tpl' => array(
        'type' => 'textfield',
        'value' => 'tpl.miniShop2YandexMarketCSV.item',
    ),
    'class' => array(
        'type' => 'textfield',
        'value' => 'msProduct',
    ),
    'depth' => array(
        'type' => 'numberfield',
        'value' => '10',
    ),
    'productTemplateID' => array(
        'type' => 'numberfield',
        'value' => '1',
    ),
    'categoryTemplateID' => array(
        'type' => 'numberfield',
        'value' => '0',
    ),
    'parents' => array(
        'type' => 'textfield',
        'value' => '0',
    ),
	'sortBy' => array(
		'type' => 'textfield',
		'value' => 'name',
	),
	'sortDir' => array(
		'type' => 'list',
		'options' => array(
			array('text' => 'ASC', 'value' => 'ASC'),
			array('text' => 'DESC', 'value' => 'DESC'),
		),
		'value' => 'ASC'
	),
	'limit' => array(
		'type' => 'numberfield',
		'value' => 1000,
	),
	'outputSeparator' => array(
		'type' => 'textfield',
		'value' => "\n",
	),
	'toPlaceholder' => array(
		'type' => 'combo-boolean',
		'value' => false,
	),
);

foreach ($tmp as $k => $v) {
	$properties[] = array_merge(
		array(
			'name' => $k,
			'desc' => PKG_NAME_LOWER . '_prop_' . $k,
			'lexicon' => PKG_NAME_LOWER . ':properties',
		), $v
	);
}

return $properties;