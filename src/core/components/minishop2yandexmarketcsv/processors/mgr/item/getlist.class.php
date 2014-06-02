<?php
/**
 * Get a list of Items
 */
class miniShop2YandexMarketCSVItemGetListProcessor extends modObjectGetListProcessor {
	public $objectType = 'miniShop2YandexMarketCSVItem';
	public $classKey = 'miniShop2YandexMarketCSVItem';
	public $defaultSortField = 'id';
	public $defaultSortDirection = 'DESC';
	public $renderers = '';


	/**
	 * @param xPDOQuery $c
	 *
	 * @return xPDOQuery
	 */
	public function prepareQueryBeforeCount(xPDOQuery $c) {
		return $c;
	}


	/**
	 * @param xPDOObject $object
	 *
	 * @return array
	 */
	public function prepareRow(xPDOObject $object) {
		$array = $object->toArray();

		return $array;
	}

}

return 'miniShop2YandexMarketCSVItemGetListProcessor';