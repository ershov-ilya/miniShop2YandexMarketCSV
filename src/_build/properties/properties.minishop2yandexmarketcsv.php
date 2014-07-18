<?php

$properties = array();

$tmp = array(
    'fields' => array(
        'type' => 'textfield',
        'value' => 'id;type;available;url;price;currencyId;category;picture;delivery;local_delivery_cost;vendor;model;description',
    ),
    'tpl' => array(
        'type' => 'textfield',
        'value' => 'tpl.miniShop2YandexMarketCSV.item',
    ),
    'context' => array(
        'type' => 'textfield',
        'value' => 'web',
    ),
    'class' => array(
        'type' => 'textfield',
        'value' => 'msProduct',
    ),
    'currencyId' => array(
        'type' => 'textfield',
        'value' => 'RUR',
    ),
    'delivery' => array(
        'type' => 'combo-boolean',
        'value' => true,
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
    'local_delivery_cost' => array(
        'type' => 'numberfield',
        'value' => 300,
    ),
	'outputSeparator' => array(
		'type' => 'textfield',
		'value' => "\n",
	),
    'toPlaceholder' => array(
        'type' => 'combo-boolean',
        'value' => false,
    )
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