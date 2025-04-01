<?php
/* Smarty version 5.4.2, created on 2025-04-01 09:49:47
  from 'file:CalcView.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67eb9a9b174800_97986671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2051d5864f6628e8bda3bb5fd13275d6d651ac93' => 
    array (
      0 => 'CalcView.html',
      1 => 1743492914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67eb9a9b174800_97986671 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_06_uproszczony\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_159641985367eb9a9b1588d1_48754714', 'content');
}
/* {block 'content'} */
class Block_159641985367eb9a9b1588d1_48754714 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_06_uproszczony\\app\\views';
?>


<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head> 
    <meta charset="utf-8" />
    <title><?php echo $_smarty_tpl->getValue('page_title');?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/style.css">
</head>
<body>

<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1"><?php echo $_smarty_tpl->getValue('page_header');?>
</h2>
      <h4 class="animation a2"><?php echo $_smarty_tpl->getValue('page_description');?>
</h4>
    </div>
    <div class="form">
        <form action="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
calcCompute" method="post">
      
            <input id="id_kwota" type="text" name="kwota" class="form-field animation a3" placeholder="Kwota kredytu" value="<?php echo $_smarty_tpl->getValue('form')->kwota;?>
">
            <input id="id_lata" type="text" name="lata" class="form-field animation a4" placeholder="Liczba lat" value="<?php echo $_smarty_tpl->getValue('form')->lata;?>
">
            <input id="id_proc" type="text" name="proc" class="form-field animation a5" placeholder="Oprocentowanie" value="<?php echo $_smarty_tpl->getValue('form')->proc;?>
"><br>
              <button type="submit" class="animation a6">Oblicz</button> <br>
        </form>
    </div> 

<div class="messages">

<?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err" style="margin: 20px; margin-left: 0px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #F9F; width:100%; opacity: 0.8;">
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
<?php }?>
</div>

<?php if (!empty($_smarty_tpl->getValue('result')->result) && $_smarty_tpl->getValue('result')->result != null) {?>
	<h4 style="margin-bottom: -10px;">Miesięczna rata kredytu: </h4>
	<p style="margin: 20px; margin-left: 0px; margin-right: 0px; padding: 10px; border-radius: 5px; background-color: #cc99cc; width:100%; opacity: 1; color: white;">
	<?php echo $_smarty_tpl->getValue('result')->result;?>
 zł
	</p>
<?php }?>



<?php if (empty($_smarty_tpl->getValue('result'))) {?>
<div class="right"></div>   
<?php }?>       
</div>
<?php if (!empty($_smarty_tpl->getValue('result'))) {?>
<div class="right"></div>   
<?php }?> 
</div>
    
   

<?php
}
}
/* {/block 'content'} */
}
