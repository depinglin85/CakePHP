<?php /* Smarty version Smarty-3.0.8, created on 2012-07-13 11:05:26
         compiled from "C:\xampp\htdocs\Framework\lib\Cake\View\Errors\missing_controller.ctp" */ ?>
<?php /*%%SmartyHeaderCode:194424fff82665819a2-22002462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f2c4bdca0c132cc77c18a255c7bff8293d2ed0c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework\\lib\\Cake\\View\\Errors\\missing_controller.ctp',
      1 => 1335692018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194424fff82665819a2-22002462',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
&lt;?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$pluginDot = empty($plugin) ? null : $plugin . '.';
?&gt;
<h2>&lt;?php echo __d('cake_dev', 'Missing Controller'); ?&gt;</h2>
<p class="error">
	<strong>&lt;?php echo __d('cake_dev', 'Error'); ?&gt;: </strong>
	&lt;?php echo __d('cake_dev', '%s could not be found.', '<em>' . $pluginDot . $class . '</em>'); ?&gt;
</p>
<p class="error">
	<strong>&lt;?php echo __d('cake_dev', 'Error'); ?&gt;: </strong>
	&lt;?php echo __d('cake_dev', 'Create the class %s below in file: %s', '<em>' . $class . '</em>', (empty($plugin) ? APP_DIR . DS : CakePlugin::path($plugin)) . 'Controller' . DS . $class . '.php'); ?&gt;
</p>
<pre>
&lt;?php
class &lt;?php echo $class . ' extends ' . $plugin; ?&gt;AppController {

}
</pre>
<p class="notice">
	<strong>&lt;?php echo __d('cake_dev', 'Notice'); ?&gt;: </strong>
	&lt;?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_controller.ctp'); ?&gt;
</p>

&lt;?php echo $this->element('exception_stack_trace'); ?&gt;
