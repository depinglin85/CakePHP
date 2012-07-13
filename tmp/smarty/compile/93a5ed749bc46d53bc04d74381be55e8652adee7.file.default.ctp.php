<?php /* Smarty version Smarty-3.0.8, created on 2012-07-13 15:49:25
         compiled from "C:\xampp\htdocs\Framework\application\modules\site\View\Layouts\default.ctp" */ ?>
<?php /*%%SmartyHeaderCode:76674fffc4f5144bb6-86757645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93a5ed749bc46d53bc04d74381be55e8652adee7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework\\application\\modules\\site\\View\\Layouts\\default.ctp',
      1 => 1342162087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76674fffc4f5144bb6-86757645',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <?php echo $_smarty_tpl->getVariable('this')->value->Html->charset();?>

    <title><?php echo $_smarty_tpl->getVariable('title_for_layout')->value;?>
</title>
    <?php echo $_smarty_tpl->getVariable('this')->value->Html->meta('icon');?>

    <?php echo $_smarty_tpl->getVariable('this')->value->Html->meta($_smarty_tpl->getVariable('meta')->value);?>

    <?php echo $_smarty_tpl->getVariable('this')->value->Html->css($_smarty_tpl->getVariable('css')->value);?>

    <?php echo $_smarty_tpl->getVariable('this')->value->Html->script($_smarty_tpl->getVariable('js')->value);?>

</head>
<body>
<?php echo $_smarty_tpl->getVariable('this')->value->fetch('content');?>

<?php echo $_smarty_tpl->getVariable('this')->value->element('sql_dump');?>

</body>
</html>