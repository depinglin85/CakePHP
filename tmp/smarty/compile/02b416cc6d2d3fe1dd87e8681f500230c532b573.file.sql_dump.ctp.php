<?php /* Smarty version Smarty-3.0.8, created on 2012-07-13 15:51:50
         compiled from "C:\xampp\htdocs\Framework\application\modules\site\View\Elements\sql_dump.ctp" */ ?>
<?php /*%%SmartyHeaderCode:84584fffc5861ca129-21533960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02b416cc6d2d3fe1dd87e8681f500230c532b573' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework\\application\\modules\\site\\View\\Elements\\sql_dump.ctp',
      1 => 1342162206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84584fffc5861ca129-21533960',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (class_exists('ConnectionManager')&&Configure::read('debug')>=2){?>
    <?php $_smarty_tpl->tpl_vars['noLogs'] = new Smarty_variable(!isset($_smarty_tpl->getVariable('logs',null,true,false)->value), null, null);?>
    <?php if ($_smarty_tpl->getVariable('noLogs')->value){?>
        <?php $_smarty_tpl->tpl_vars['sources'] = new Smarty_variable(ConnectionManager::sourceList(), null, null);?>
        <?php $_smarty_tpl->tpl_vars['logs'] = new Smarty_variable(array(), null, null);?>
        <?php  $_smarty_tpl->tpl_vars['source'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sources')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['source']->key => $_smarty_tpl->tpl_vars['source']->value){
?>
            <?php $_smarty_tpl->tpl_vars['db'] = new Smarty_variable(ConnectionManager::getDataSource($_smarty_tpl->tpl_vars['source']->value), null, null);?>
            <?php if (method_exists($_smarty_tpl->getVariable('db')->value,'getLog')){?>
                <?php if (!isset($_smarty_tpl->tpl_vars['logs']) || !is_array($_smarty_tpl->tpl_vars['logs']->value)) $_smarty_tpl->createLocalArrayVariable('logs', null, null);
$_smarty_tpl->tpl_vars['logs']->value[$_smarty_tpl->tpl_vars['source']->value] = $_smarty_tpl->getVariable('db')->value->getLog();?>
            <?php }?>
        <?php }} ?>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('noLogs')->value||isset($_smarty_tpl->getVariable('_forced_from_dbo_',null,true,false)->value)){?>
        <?php  $_smarty_tpl->tpl_vars['logInfo'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['source'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('logs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['logInfo']->key => $_smarty_tpl->tpl_vars['logInfo']->value){
 $_smarty_tpl->tpl_vars['source']->value = $_smarty_tpl->tpl_vars['logInfo']->key;
?>
            <?php echo printf('<table class="cake-sql-log" id="cakeSqlLog_%s" summary="Cake SQL Log" cellspacing="0">',preg_replace('/[^A-Za-z0-9_]/','_',uniqid(time(),true)));?>

            <?php echo printf('<caption>(%s) %s %s took %s ms</caption>',$_smarty_tpl->tpl_vars['source']->value,$_smarty_tpl->tpl_vars['logInfo']->value['count'],$_smarty_tpl->getVariable('text')->value,$_smarty_tpl->tpl_vars['logInfo']->value['time']);?>

            <thead>
                <tr><th>Nr</th><th>Query</th><th>Error</th><th>Affected</th><th>Num. rows</th><th>Took (ms)</th></tr>
            </thead>
            <tbody>
            <?php if (!isset($_smarty_tpl->tpl_vars['er']) || !is_array($_smarty_tpl->tpl_vars['er']->value)) $_smarty_tpl->createLocalArrayVariable('er', null, null);
$_smarty_tpl->tpl_vars['er']->value['error'] = '';?>
            <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['logInfo']->value['log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+$_smarty_tpl->getVariable('er')->value, null, null);?>
                <?php if (!empty($_smarty_tpl->tpl_vars['i']->value['params'])&&is_array($_smarty_tpl->tpl_vars['i']->value['params'])){?>
                    <?php $_smarty_tpl->tpl_vars["bindParam"] = new Smarty_variable(null, null, null);?>
                    <?php $_smarty_tpl->tpl_vars["bindType"] = new Smarty_variable(null, null, null);?>
                    <?php if (preg_match('/.+ :.+/',$_smarty_tpl->tpl_vars['i']->value['query'])){?>
                        <?php $_smarty_tpl->tpl_vars["bindType"] = new Smarty_variable(true, null, null);?>
                        <?php  $_smarty_tpl->tpl_vars['bindVal'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['bindKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['bindVal']->key => $_smarty_tpl->tpl_vars['bindVal']->value){
 $_smarty_tpl->tpl_vars['bindKey']->value = $_smarty_tpl->tpl_vars['bindVal']->key;
?>
                            <?php if ($_smarty_tpl->getVariable('bindType')->value===true){?>
                                <?php $_smarty_tpl->tpl_vars["bindParam"] = new Smarty_variable((((($_smarty_tpl->getVariable('bindParam')->value).(h($_smarty_tpl->tpl_vars['bindKey']->value))).(" => ")).(h($_smarty_tpl->tpl_vars['bindVal']->value))).(", "), null, null);?>
                            <?php }else{ ?>
                                <?php $_smarty_tpl->tpl_vars["bindParam"] = new Smarty_variable((($_smarty_tpl->getVariable('bindParam')->value).(h($_smarty_tpl->tpl_vars['bindVal']->value))).(", "), null, null);?>
                            <?php }?>
                        <?php }} ?>
                        <?php if (!isset($_smarty_tpl->tpl_vars['i']) || !is_array($_smarty_tpl->tpl_vars['i']->value)) $_smarty_tpl->createLocalArrayVariable('i', null, null);
$_smarty_tpl->tpl_vars['i']->value['query'] = ((($_smarty_tpl->tpl_vars['i']->value['query']).(" , params[ ")).(rtrim($_smarty_tpl->getVariable('bindParam')->value,', '))).(" ]");?>
                    <?php }?>
                <?php }?>
                <?php echo (((("<tr><td>").(($_smarty_tpl->tpl_vars['k']->value+1))).("</td><td>")).(h($_smarty_tpl->tpl_vars['i']->value['query']))).("</td><td>".($_smarty_tpl->tpl_vars['i']->value['error'])."</td><td style = \"text-align: right\">".($_smarty_tpl->tpl_vars['i']->value['affected'])."</td><td style = \"text-align: right\">".($_smarty_tpl->tpl_vars['i']->value['numRows'])."</td><td style = \"text-align: right\">".($_smarty_tpl->tpl_vars['i']->value['took'])."</td></tr>\n");?>

            <?php }} ?>
            </tbody></table>
        <?php }} ?>
    <?php }else{ ?>
    <p>Encountered unexpected <?php echo $_smarty_tpl->getVariable('logs')->value;?>
 cannot generate SQL log</p>
    <?php }?>

<?php }?>
