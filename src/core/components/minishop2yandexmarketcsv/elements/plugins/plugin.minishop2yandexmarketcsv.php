<?php

switch ($modx->event->name) {

	case 'OnManagerPageInit':
		$cssFile = MODX_ASSETS_URL.'components/minishop2yandexmarketcsv/css/mgr/main.css';
		$modx->regClientCSS($cssFile);
		break;

}