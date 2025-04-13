<?php
/* Smarty version 5.4.2, created on 2025-04-13 18:02:16
  from 'file:CalcView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67fbe00852fad1_23302441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97c818a7c75f3082d61ce09c610ec0ec8f660fbc' => 
    array (
      0 => 'CalcView.tpl',
      1 => 1744560133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_67fbe00852fad1_23302441 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\calc_kred_6\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_71614010967fbe008528039_82310931', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_71614010967fbe008528039_82310931 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\calc_kred_6\\app\\views';
?>

<div class="container">
  <div class="left">
     <div class="animation a2">
         <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout" style="margin: 20px; margin-left: 0px; margin-right: 0px; padding: 10px; border-radius: 20px; background-color: #cccccc; color:white; opacity:70%">Wyloguj</a>
         <p style="color: #999999; float:right; font-size:15px; text-align:right;">
            Użytkownik: <?php echo $_smarty_tpl->getValue('user')->login;?>
 <br> 
            Rola: <?php echo $_smarty_tpl->getValue('user')->role;?>
</p>
        </div> 
    <div class="header">
      <h2 class="animation a1"><?php echo $_smarty_tpl->getValue('page_header');?>
</h2>
      <h4 class="animation a2"><?php echo $_smarty_tpl->getValue('page_description');?>
</h4>
    </div>
    <div class="form">
        <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
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
<?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
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
