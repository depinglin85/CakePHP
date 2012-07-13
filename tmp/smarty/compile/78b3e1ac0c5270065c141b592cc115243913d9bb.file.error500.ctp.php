<?php /* Smarty version Smarty-3.0.8, created on 2012-07-13 11:05:23
         compiled from "C:\xampp\htdocs\Framework\application\modules\site\View\Errors\error500.ctp" */ ?>
<?php /*%%SmartyHeaderCode:202344fff8263800fb8-29662085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78b3e1ac0c5270065c141b592cc115243913d9bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework\\application\\modules\\site\\View\\Errors\\error500.ctp',
      1 => 1335692018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202344fff8263800fb8-29662085',
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
?&gt;
<h2>&lt;?php echo $name; ?&gt;</h2>
<p class="error">
	<strong>&lt;?php echo __d('cake', 'Error'); ?&gt;: </strong>
	&lt;?php echo __d('cake', 'An Internal Error Has Occurred.'); ?&gt;
</p>
&lt;?php
if (Configure::read('debug') > 0 ):
	echo $this->element('exception_stack_trace');
endif;
?&gt;
