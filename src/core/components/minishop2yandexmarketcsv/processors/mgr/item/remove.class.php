<?php
/**
 * Remove an Item
 */
class miniShop2YandexMarketCSVItemRemoveProcessor extends modObjectRemoveProcessor {
	public $checkRemovePermission = true;
	public $objectType = 'miniShop2YandexMarketCSVItem';
	public $classKey = 'miniShop2YandexMarketCSVItem';
	public $languageTopics = array('minishop2yandexmarketcsv');

}

return 'miniShop2YandexMarketCSVItemRemoveProcessor';