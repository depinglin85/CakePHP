<?php
App::uses('Controller', 'Controller');
class BaseController extends Controller
{
    public $viewClass = 'Smarty';
    protected $_cssArray = array();
    protected $_metaArray = array();
    protected $_jsArray = array();
    
    
    
    protected function _appendCss($css)
    {
        if (is_array($css)){
            $this->cssArray = array_merge($this->cssArray, $css);
        } else {
            if (!in_array($css, $this->cssArray)){
                $this->cssArray[] = $css;
            }
        }
        $this->cssArray = array_unique($this->cssArray);
    }
    
    protected function _appendJs($js){
        if (is_array($js)){
            $this->jsArray = array_merge($this->jsArray, $js);
        } else {
            if (!in_array($js, $this->jsArray)){
                $this->jsArray[] = $js;
            }
        }
        $this->jsArray = array_unique($this->jsArray);
    }
    
    protected function _appendMeta($meta){
        if (is_array($meta)) {
            $this->metaArray = array_merge($this->metaArray, $meta);
        } else {
            if (!in_array($meta, $this->metaArray)) {
                $this->metaArray[] = $meta;
            }
        }
        $this->metaArray = array_unique($this->metaArray);
    }
    
    public function beforeRender() {
        $this->set("css", $this->cssArray);
        $this->set("js", $this->jsArray);
        $this->set("meta", $this->metaArray);
    }
    
}