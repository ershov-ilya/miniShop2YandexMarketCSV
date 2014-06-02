<?php
/**
 * The base class for miniShop2YandexMarketCSV.
 */

class miniShop2YandexMarketCSV {
	/* @var modX $modx */
	public $modx;
    private $output;


	/**
	 * @param modX $modx
	 * @param array $config
	 */
	function __construct(modX &$modx, array $config = array()) {
		$this->modx =& $modx;
        $this->output='';

		$corePath = $this->modx->getOption('minishop2yandexmarketcsv_core_path', $config, $this->modx->getOption('core_path') . 'components/minishop2yandexmarketcsv/');
		$assetsUrl = $this->modx->getOption('minishop2yandexmarketcsv_assets_url', $config, $this->modx->getOption('assets_url') . 'components/minishop2yandexmarketcsv/');
		$connectorUrl = $assetsUrl . 'connector.php';

		$this->config = array_merge(array(
			'assetsUrl' => $assetsUrl,
			'cssUrl' => $assetsUrl . 'css/',
			'jsUrl' => $assetsUrl . 'js/',
			'imagesUrl' => $assetsUrl . 'images/',
			'connectorUrl' => $connectorUrl,

			'corePath' => $corePath,
			'modelPath' => $corePath . 'model/',
			'chunksPath' => $corePath . 'elements/chunks/',
			'templatesPath' => $corePath . 'elements/templates/',
			'chunkSuffix' => '.chunk.tpl',
			'snippetsPath' => $corePath . 'elements/snippets/',
			'processorsPath' => $corePath . 'processors/'
		), $config);

		$this->modx->addPackage('minishop2yandexmarketcsv', $this->config['modelPath']);
		$this->modx->lexicon->load('minishop2yandexmarketcsv:default');
	}

    function getConfig(){
        return $this->config;
    }

    function put($str, $br=true){
        $this->output.=$str;
        if($br) $this->output.= $this->config['outputSeparator'];
    }

    function getOutput(){
        return $this->output;
    }

}