<?php

/**
 * Class miniShop2YandexMarketCSVMainController
 */
abstract class miniShop2YandexMarketCSVMainController extends modExtraManagerController {
	/** @var miniShop2YandexMarketCSV $miniShop2YandexMarketCSV */
	public $miniShop2YandexMarketCSV;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('minishop2yandexmarketcsv_core_path', null, $this->modx->getOption('core_path') . 'components/minishop2yandexmarketcsv/');
		require_once $corePath . 'model/minishop2yandexmarketcsv/minishop2yandexmarketcsv.class.php';

		$this->miniShop2YandexMarketCSV = new miniShop2YandexMarketCSV($this->modx);

		$this->addCss($this->miniShop2YandexMarketCSV->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->miniShop2YandexMarketCSV->config['jsUrl'] . 'mgr/minishop2yandexmarketcsv.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			miniShop2YandexMarketCSV.config = ' . $this->modx->toJSON($this->miniShop2YandexMarketCSV->config) . ';
			miniShop2YandexMarketCSV.config.connector_url = "' . $this->miniShop2YandexMarketCSV->config['connectorUrl'] . '";
		});
		</script>');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('minishop2yandexmarketcsv:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends miniShop2YandexMarketCSVMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}