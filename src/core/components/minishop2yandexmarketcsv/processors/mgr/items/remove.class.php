<?php
/**
 * Remove an Items
 */
class miniShop2YandexMarketCSVItemsRemoveProcessor extends modProcessor {
    public $checkRemovePermission = true;
	public $objectType = 'miniShop2YandexMarketCSVItem';
	public $classKey = 'miniShop2YandexMarketCSVItem';
	public $languageTopics = array('minishop2yandexmarketcsv');

	public function process() {

        foreach (explode(',',$this->getProperty('items')) as $id) {
            $item = $this->modx->getObject($this->classKey, $id);
            $item->remove();
        }
        
        return $this->success();

	}

}

return 'miniShop2YandexMarketCSVItemsRemoveProcessor';