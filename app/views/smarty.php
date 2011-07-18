<?php
App::import('Vendor', 'Smarty', array('file' =>'smarty'.DS.'libs'.DS.'Smarty.class.php'));

class SmartyView extends View{
	function __construct(&$controller){
		parent::__construct($controller);
		$this->Smarty = &new Smarty();
		$this->ext = '.tpl';
		$this->Smarty->plugins_dir[] = VIEWS.'smarty_plugins'.DS;
		$this->Smarty->compile_dir = TMP.'smarty'.DS.'compile'.DS;
		$this->Smarty->cache_dir = TMP.'smarty'.DS.'cache'.DS;
		$this->Smarty->template_dir = VIEWS.DS;
		$this->Smarty->cache_id = false;
		$this->Smarty->config_dir = 'config';
	}
	function _render($___viewFn, $___dataForView, $__playSafe = TRUE, $loadHelpers = TRUE){
		if ($this->helpers != FALSE && $loadHelpers === TRUE){
			$loadedHelpers = array();
			$loadedHelpers = $this->_loadHelpers($loadedHelpers, $this->helpers);
			//var_dump($loadedHelpers);
			foreach (array_keys($loadedHelpers) as $helper){
				$replace = strtolower(substr($helper, 0, 1));
				$comelBackedHelper = preg_replace('/\\w/', $replace, $helper, 1);
				${$comelBackedHelper} = &$loadedHelpers[$helper];
				if (isset(${$comelBackedHelper}->helpers) && is_array(${$comelBackedHelper}->helpers)){
					foreach (${$comelBackedHelper}->helpers as $subHelper) {
						${$comelBackedHelper}->{$subHelper} = & $loadedHelpers[$subHelper];
					}
				}
				$this->loaded[$comelBackedHelper] = ${$comelBackedHelper};
				$this->Smarty->assignByRef($comelBackedHelper, ${$comelBackedHelper});
			}
		}
		$this->register_functions();
		foreach ($___dataForView as $data => $value){
			if (!is_object($data)){
				$this->Smarty->assign($data, $value);
			}
		}
		$this->Smarty->assignByRef('view', $this);
		return $this->Smarty->fetch($___viewFn);
	}
	
	function _getLayoutFileName() { 
        if (isset($this->webservices) && !is_null($this->webservices)) { 
            $type = strtolower($this->webservices) . DS; 
        } else { 
            $type = null; 
        } 

        if (isset($this->plugin) && !is_null($this->plugin)) { 
            if (file_exists(APP . 'plugins' . DS . $this->plugin . DS . 'views' . DS . 'layouts' . DS . $this->layout . $this->ext)) { 
                $layoutFileName = APP . 'plugins' . DS . $this->plugin . DS . 'views' . DS . 'layouts' . DS . $this->layout . $this->ext; 
                return $layoutFileName; 
            } 
        } 
        $paths = App::path('views');
        foreach($paths as $path) { 
            if (file_exists($path . 'layouts' . DS . $this->subDir . $type . $this->layout . $this->ext)) { 
                $layoutFileName = $path . 'layouts' . DS . $this->subDir . $type . $this->layout . $this->ext; 
                return $layoutFileName; 
            } 
        } 

        // added for .ctp viewPath fallback 
        foreach($paths as $path) { 
            if (file_exists($path . 'layouts' . DS  . $type . $this->layout . '.ctp')) { 
                $layoutFileName = $path . 'layouts' . DS . $type . $this->layout . '.ctp'; 
                return $layoutFileName; 
            } 
        } 

        if($layoutFileName = fileExistsInPath(LIBS . 'view' . DS . 'templates' . DS . 'layouts' . DS . $type . $this->layout . '.ctp')) { 
        } else { 
            $layoutFileName = LAYOUTS . $type . $this->layout.$this->ext; 
        } 
        return $layoutFileName; 
    } 
    
	function _getViewFileName($name = null) { 
        $subDir = null; 

        if (isset($this->webservices) && !is_null($this->webservices)) { 
            $subDir = strtolower($this->webservices) . DS; 
        } 
        if (!is_null($this->subDir)) { 
            $subDir = $this->subDir . DS; 
        } 

        if ($name === null) { 
            $name = $this->action; 
        } 

        if (strpos($name, '/') === false && strpos($name, '..') === false) { 
            $name = $this->viewPath . DS . $subDir . Inflector::underscore($name); 
        } elseif (strpos($name, '/') !== false) { 
            if ($name{0} === '/') { 
                if (is_file($name)) { 
                    return $name; 
                } 
                $name = trim($name, '/'); 
            } else { 
                $name = $this->viewPath . DS . $subDir . $name; 
            } 
            if (DS !== '/') { 
                $name = implode(DS, explode('/', $name)); 
            } 
        } elseif (strpos($name, '..') !== false) { 
            $name = explode('/', $name); 
            $i = array_search('..', $name); 
            unset($name[$i - 1]); 
            unset($name[$i]); 
            $name = '..' . DS . implode(DS, $name); 
        } 

        $paths = $this->_paths($this->plugin); 
        foreach ($paths as $path) { 
            if (file_exists($path . $name . $this->ext)) { 
                return $path . $name . $this->ext; 
            } elseif (file_exists($path . $name . '.ctp')) { 
                return $path . $name . '.ctp'; 
            } elseif (file_exists($path . $name . '.thtml')) { 
                return $path . $name . '.thtml'; 
            } 
        } 

        return $this->_missingView($paths[0] . $name . $this->ext, 'missingView'); 
    }
    
    function register_functions() { 
        foreach(array_keys($this->loaded) as $helper) { 
            if (method_exists($this->loaded[$helper], '_register_smarty_functions')) { 
                $this->loaded[$helper]->_register_smarty_functions(&$this->Smarty); 
            } 
        } 
    } 
}

?>