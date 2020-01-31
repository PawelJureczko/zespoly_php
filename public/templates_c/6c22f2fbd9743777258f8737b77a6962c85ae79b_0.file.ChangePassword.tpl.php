<?php
/* Smarty version 3.1.33, created on 2020-01-31 23:09:33
  from 'C:\xampp\htdocs\zespoly\app\views\ChangePassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e34a59db0dab3_43079876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c22f2fbd9743777258f8737b77a6962c85ae79b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\ChangePassword.tpl',
      1 => 1580508566,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e34a59db0dab3_43079876 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11421624905e34a59db09918_80599265', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_11421624905e34a59db09918_80599265 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_11421624905e34a59db09918_80599265',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
savePassword" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Zmiana hasła:</legend>
		<div class="pure-control-group">
            <label for="currentpassword">Obecne haslo:</label>
            <input id="currentpassword" type="password" placeholder="Wpisz obecne haslo" name="currentpassword" value="">
        </div>
        <div class="pure-control-group">
            <label for="newpassword">Nowe haslo:</label>
            <input id="newpassword" type="password" placeholder="Wpisz nowe haslo" name="newpassword" value="">
        </div>
		<div class="pure-control-group">
            <label for="newpasswordrepeated">Powtorz nowe haslo</label>
            <input id="newpasswordrepeated" type="password" placeholder="Powtorz nowe haslo" name="newpasswordrepeated" value="">
        </div>
		<div class="pure-controls">
			<input type="submit" class="btn btn-success" value="Zapisz"/>
			<a class="btn btn-link btn btn-outline-dark" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userProfile">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>
</div>

<?php
}
}
/* {/block 'top'} */
}
