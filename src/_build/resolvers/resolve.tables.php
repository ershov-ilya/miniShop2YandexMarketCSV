<?php

if ($object->xpdo) {
	/* @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			$modelPath = $modx->getOption('minishop2yandexmarketcsv_core_path',null,$modx->getOption('core_path').'components/minishop2yandexmarketcsv/').'model/';
			$modx->addPackage('minishop2yandexmarketcsv', $modelPath);

			$manager = $modx->getManager();
			$objects = array(
				'miniShop2YandexMarketCSVItem',
			);
			foreach ($objects as $tmp) {
				$manager->createObjectContainer($tmp);
			}
			break;

		case xPDOTransport::ACTION_UPGRADE:
			break;

		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;
