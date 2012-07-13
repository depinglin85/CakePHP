<?php
//App::import('Vendor', 'Smarty', array('file' => 'smarty'.DS.'libs'.DS.'Smarty.class.php'));
class SmartyView extends View {
    function __construct($controller) {
        parent::__construct($controller);
        if (is_object($controller)) {
            foreach ($this->_passedVars as $var){
                $this->{$var} = $controller->{$var};
            }
        }
        if (!App::import('Vendor', 'Smarty', array('file' => 'smarty'.DS.'libs'.DS.'Smarty.class.php'))){
            die('error Loading Smarty Class');
        }
        $this->Smarty = new Smarty();
        $this->ext = '.tpl';
        $plugins_dir = VENDORS . DS . 'smarty' . DS . 'plugins';
        $compile_dir = TMP.'smarty'.DS.'compile'.DS;
        $cache_dir = TMP.'smarty'.DS.'cache'.DS;
        $config_dir = 'config';
        
        $this->Smarty->setPluginsDir($plugins_dir);
        $this->Smarty->setCompileDir($compile_dir);
        $this->Smarty->setCacheDir($cache_dir);
        $this->Smarty->caching = Configure::read('enable_smarty_cache');
        $this->Smarty->setConfigDir($config_dir);
        $this->Smarty->php_handling = true;
        $this->viewVars['params'] = $this->_passedVars;
        $this->Helpers = new HelperCollection($this);
    }
    
    protected function _render($___viewFn, $___dataForView = array()){
        $trace = debug_backtrace();
        $caller = array_shift($trace);
        if ($caller === "element"){
            parent::_render($___viewFn, $___dataForView);
        }
        if (empty($___dataForView)){
            $___dataForView = $this->viewVars;
        }
        extract($___dataForView, EXTR_SKIP);
        foreach ($___dataForView as $data => $value) {
            if (!is_object($data)){
                $this->Smarty->assign($data, $value);
            }
        }
        $this->Smarty->assignByRef('this', $this);
        return $this->Smarty->fetch($___viewFn);
    }
    
    public function loadHelpers(){
        $helpers = HelperCollection::normalizeObjectArray($this->helpers);
        foreach ($helpers as $name => $properties) {
            list($plugin, $class) = pluginSplit($properties['class']);
            $this->{$class} = $this->Helpers->load($properties['class'], $properties['settings']);
            $this->Smarty->assign($name, $this->{$class});
        }
        $this->_helpersLoaded = true;
    }
    
}