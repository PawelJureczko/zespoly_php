<?php
/* Smarty version 3.1.33, created on 2020-01-24 20:16:54
  from 'C:\xampp\htdocs\zespoly\app\views\UserProfilebyAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e2b42a6413a06_49008699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '720ac0afb233f98758a9ddc2aa8166d88647c528' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zespoly\\app\\views\\UserProfilebyAdmin.tpl',
      1 => 1579893408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2b42a6413a06_49008699 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7351682745e2b42a640f3d8_96885559', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_7351682745e2b42a640f3d8_96885559 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_7351682745e2b42a640f3d8_96885559',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSaveChangesByAdmin" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wypelnij formularz edycji:</legend>
			<div class="pure-control-group">
            <label for="name">imie</label>
            <input id ="name" name ="name" placeholder="imie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
        </div>
        <div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id ="surname" name ="surname" placeholder="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->surname;?>
">
        </div>
        <div class="pure-control-group">
            <label for="email">adres email</label>
            <input id ="email" name ="email" placeholder="e-mail" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
">
        </div>
		<div class="pure-control-group">
            <label for="phone">numer telefonu</label>
            <input id ="phone" name ="phone" placeholder="numer telefonu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->phone;?>
">
        </div>
        <div class="pure-control-group">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
changePassword">Zmień hasło</a>
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow">Powrót</a>
		</div>
	</fieldset>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
}
