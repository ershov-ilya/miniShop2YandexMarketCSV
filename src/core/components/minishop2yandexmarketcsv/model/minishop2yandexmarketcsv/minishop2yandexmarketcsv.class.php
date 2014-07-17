<?php
/**
 * The base class for miniShop2YandexMarketCSV.
 */

class miniShop2YandexMarketCSV {
    /* @var modX $modx */
    public $modx;
    private $output;
    private $config;


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
            'context'	=>	'web',
            'fields'	=>	'id,pagetitle',

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

        $this->config['arrFields']=explode(';',$this->config['fields']);
    }

    function getConfig(){
        return $this->config;
    }

    function start($id=0, $depth=0){
        if(empty($depth)) $depth=$this->config['depth'];
        $depth=2;
        if(empty($id)) $parents=$this->config['parents'];
        $arrIDs=explode(',',$parents);

        foreach($arrIDs as $id)
        {
            // Проверка самого элемента
            $this->iterate($id);
            // Начинаем перебор
            $filter=array(
                'context' =>  $this->config['context'],
                'template' => $this->config['productTemplateID']
            );
            $array_ids = $this->modx->getChildIds($id,$depth,$filter);
            foreach($array_ids as $id)
            {
                $this->iterate($id);
            }
        }
    }

    function iterate($id){
        $resource = $this->modx->getObject('modResource', $id);
        // Фильтр по шаблону
        if($resource->get('template')!=$this->config['productTemplateID']) return 0;

        // ФОРМИРОВАНИЕ СТРОКИ
        $res= '';
        foreach($this->config['arrFields'] as $field)
        {
            switch($field)
            {
                case 'id':
                    $res.= $id;
                    break;
                case 'type':
                    $res.= $resource->get('pagetitle');
                    break;
                default:

            }
            $res.= ';';

        }

        //$res.=$resource->get('pagetitle').":$id:".$resource->get('template');

        // Возврат
        $this->put($res);
        return 0;
    }

    function put($str, $br=true){
        $this->output.=$str;
        if($br) $this->output.= $this->config['outputSeparator'];
    }

    function getOutput(){
        return $this->output;
    }

} // end of class miniShop2YandexMarketCSV