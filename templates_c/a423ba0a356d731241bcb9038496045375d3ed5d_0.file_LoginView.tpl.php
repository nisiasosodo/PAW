<?php
/* Smarty version 5.4.2, created on 2025-04-13 17:13:40
  from 'file:LoginView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67fbd4a486a7e6_89734934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a423ba0a356d731241bcb9038496045375d3ed5d' => 
    array (
      0 => 'LoginView.tpl',
      1 => 1744557219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_67fbd4a486a7e6_89734934 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\calc_kred_6\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_26384150667fbd4a4867921_24576744', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_26384150667fbd4a4867921_24576744 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\calc_kred_6\\app\\views';
?>

    

<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Strona logowania</h2>
      <h4 class="animation a2">Kalkulator kredytowy</h4>
    </div>
    <div class="form">
        <form action="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
login" method="post">
      
            <input id="id_login" type="text" name="login" class="form-field animation a3" placeholder="Login"/>
            <input id="id_pass" type="password" name="pass" class="form-field animation a4" placeholder="Hasło"/>
            <button type="submit" class="animation a6">Zaloguj</button> <br>
        </form>
    </div> 
<?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

</div>
<div class="right"></div> 

<?php
}
}
/* {/block 'content'} */
}
