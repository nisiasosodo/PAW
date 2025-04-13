<?php
/* Smarty version 5.4.2, created on 2025-04-13 18:04:19
  from 'file:messages.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67fbe083a60570_66393166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ca7d0136928cfb331a078f6e88f49b4a4a8c7b3' => 
    array (
      0 => 'messages.tpl',
      1 => 1744560257,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67fbe083a60570_66393166 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\calc_kred_6\\app\\views\\templates';
if ($_smarty_tpl->getValue('msgs')->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
        <ol class="err" style="margin: 20px; margin-left: 0px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #ff6666; width:100%; opacity: 0.8;">
	<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getErrors(), 'err');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('err')->value) {
$foreach0DoElse = false;
?>
	<li><?php echo $_smarty_tpl->getValue('err');?>
</li>
	<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
	</ol>
<?php }
if ($_smarty_tpl->getValue('msgs')->isInfo()) {?>
	<h4 style="margin-bottom: -5px;">Informacje: </h4>
	<ol class="inf" style="margin: 20px; margin-left: 0px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #F9F; width:100%; opacity: 0.8;">
	<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getInfos(), 'inf');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('inf')->value) {
$foreach1DoElse = false;
?>
	<li><?php echo $_smarty_tpl->getValue('inf');?>
</li>
	<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
	</ol>
<?php }
}
}
