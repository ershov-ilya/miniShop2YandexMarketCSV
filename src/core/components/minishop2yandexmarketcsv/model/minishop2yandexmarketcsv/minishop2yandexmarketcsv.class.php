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
            'assetsUrl' 	=> $assetsUrl,
            'cssUrl' 		=> $assetsUrl . 'css/',
            'jsUrl'			=> $assetsUrl . 'js/',
            'imagesUrl' 	=> $assetsUrl . 'images/',
            'connectorUrl' 	=> $connectorUrl,
            'context'		=>	'web',
            'fields'		=>	'id,pagetitle',
            'currencyId'	=>	'RUR',
            'delivery'		=>	'true',
            'local_delivery_cost'	=>	300,

            'corePath' 		=> $corePath,
            'modelPath'	 	=> $corePath . 'model/',
            'chunksPath' 	=> $corePath . 'elements/chunks/',
            'templatesPath' => $corePath . 'elements/templates/',
            'chunkSuffix' 	=> '.chunk.tpl',
            'snippetsPath' 	=> $corePath . 'elements/snippets/',
            'processorsPath' => $corePath . 'processors/'
        ), $config);

        $this->modx->addPackage('minishop2yandexmarketcsv', $this->config['modelPath']);
        $this->modx->lexicon->load('minishop2yandexmarketcsv:default');

        // Подготовка списка полей
        $this->config['arrFields']=explode(';',$this->config['fields']);

        // Подготовка массива производителей
        $q = $modx->newQuery('msVendor');
        $q->innerJoin('msProductData', 'msProductData', '`msProductData`.`vendor` = `msVendor`.`id`');
        $q->innerJoin('msProduct', 'msProduct', array(
            '`msProductData`.`id` = `msProduct`.`id`',
            'msProduct.deleted' => 0,
            'msProduct.published' => 1
        ));
        $q->groupby('msVendor.id');
        $q->sortby('name','ASC');
        $q->select(array('msVendor.id', 'name'));

        if ($q->prepare() && $q->stmt->execute()) $arrVendors = $q->stmt->fetchAll(PDO::FETCH_KEY_PAIR);
        $this->config['vendor'] = $arrVendors;
    }

    function getConfig(){
        return $this->config;
    }

    function start($id=0){
        if(empty($id)) $parents=$this->config['parents'];
        $arrIDs=explode(',',$parents);
        $filter=array(
            'context' =>  $this->config['context'],
            'template' => $this->config['productTemplateID']
        );


        foreach($arrIDs as $id)
        {
            // Запуск рекурсии
            $this->iterateResource($id, $filter);
        }
    }

    function iterateResource($id, $filter=array(), $category=''){
        $product = $this->modx->getObject($this->config['class'], $id);
        if(is_object($product))
        {
            // Фильтр по шаблону
            if($product->get('template')!=$this->config['productTemplateID']) return 0;
            // Фильтр по yml статусу (надо ли?)
            //$yml_status = $product->get('yml_status');

            // ФОРМИРОВАНИЕ СТРОКИ
            $res= '';
            foreach($this->config['arrFields'] as $field)
            {
                switch($field)
                {
                    case 'id':
                        $res.= $id;
                        break;
                    case 'price':
                        $res.= $product->get('price');
                        break;
                    case 'category':
                        $res.= $category;
                        break;
                    case 'currencyId':
                        $res.= $this->config['currencyId'];
                        break;
                    case 'available':
                        $res.=($product->get('quantity')?'true':'false');
                        break;
                    case 'type':
                        $res.='vendor.model';
                        break;
                    case 'model':
                        $res.= $this->sanitize($product->get('pagetitle'));
                        break;
                    case 'url':
                        $res.=$this->modx->makeUrl($id, $this->config['context'], '', 'full');
                        break;
                    case 'description':
                        $res.=$this->sanitize($product->get('description'));
                        break;
                    case 'vendor':
                        $vendorID=$product->get('vendor');
                        $res.= $this->config['vendor'][$vendorID];
                        break;
                    case 'local_delivery_cost':
                        $res.=$this->config['local_delivery_cost'];
                        break;
                    case 'delivery':
                        $res.= $this->config['delivery'];
                        break;
                    case 'picture':
                        $res.= $product->get('image');
                        break;
                    default:

                }
                $res.= ';';
            }
            //Убираем лишнюю точку с запятой
            $res=preg_replace('/;$/','',$res);
            //$res.=$resource->get('pagetitle').":$id:".$resource->get('template');

            // Запись
            $this->put($res);
        }
        else
        {
            $resource = $this->modx->getObject('modResource', $id);
            $category=$resource->get('pagetitle');
            //$this->iterateResource($id,$category);
            $array_ids = $this->modx->getChildIds($id,1,$filter);
            foreach($array_ids as $id)
            {
                $this->iterateResource($id,$filter,$category);
            }
        }
        return 1;
    }

    function put($str, $br=true){
        $this->output.=$str;
        if($br) $this->output.= $this->config['outputSeparator'];
    }

    function getOutput(){
        return $this->output;
    }

    function sanitize($str){
        $res=preg_replace('/;/',',',$str);
        $res=preg_replace('/[\r\n]/','',$res);
        return $res;
    }

} // end of class miniShop2YandexMarketCSV