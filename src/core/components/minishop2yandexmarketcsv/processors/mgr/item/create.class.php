<?php
/**
 * Create an Item
 */
class miniShop2YandexMarketCSVItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'miniShop2YandexMarketCSVItem';
	public $classKey = 'miniShop2YandexMarketCSVItem';
	public $languageTopics = array('minishop2yandexmarketcsv');
	public $permission = 'new_document';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$alreadyExists = $this->modx->getObject('miniShop2YandexMarketCSVItem', array(
			'name' => $this->getProperty('name'),
		));
		if ($alreadyExists) {
			$this->modx->error->addField('name', $this->modx->lexicon('minishop2yandexmarketcsv_item_err_ae'));
		}

		return !$this->hasErrors();
	}

}

return 'miniShop2YandexMarketCSVItemCreateProcessor';